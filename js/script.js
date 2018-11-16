$(function(){
   
    $('#quantity').on('change', function(){
        var selectedOption = $('#quantity :selected').val();
        var old_url      = window.location.href; 
        var new_url = old_url.substring(0, old_url.indexOf('?'));
        var temp="?quantity="+selectedOption;
        $(location).attr('href',new_url+temp);
    });
    //when add to cart is clicked
    $('#add-to-cart').on('click',function(){
        $(this).siblings('.info').fadeIn(700).fadeOut(1000);
        var price = $(this).siblings('p').children('.price').html();
        var product = $(this).siblings('.product').html();
        var maxQty = $('#maxQty').val();
        var productId = $('#productId').val();
        var productBrand = $('#productBrand').val();
        var productCategory = $('#productCategory').val();

        $.post('cart/data.php?q=addtocart',
               {
                    price:price,
                    product:product,
                    qty:1,
                    maxQty:maxQty,
                    productId:productId,
                    productBrand:productBrand,
                    productCategory:productCategory
               }
        );
    });
    
    //remove product from cart
    $('.removeproduct').on('click',function(){
        $(this).parent().parent().fadeOut(300);
        var id = $(this).siblings('.proID').val();
        $.post('cart/data.php?q=removefromcart',
               {
                    proID:id
               }
        );

    });    
    //set time
    setInterval(function() {
        $.get("cart/data.php?q=countcart",function(data){
            $('.badge').html(data);
        });
        
        $.get("cart/data.php?q=countorder",function(data){
            $('.order-admin-badge').html(data);
        });
        
        $.get("cart/data.php?q=countproducts",function(data){
            $('.products-admin-badge').html(data);
        });
        
        $.get("cart/data.php?q=countcategory",function(data){
            $('.category-admin-badge').html(data);
        });
        
    }, 15000);
    
    //confirmation
    $('.confirm').on('click',function(){
        var confirmation = confirm("Are you sure?");
        if(!confirmation){
            return false;   
        }
    });
    
    //login
    $('#login').on('click',function(){
        var username = $('#username').val(); 
        var password = $('#password').val(); 
        
        $.post('cart/data.php?q=verify',
               {
                   username:username,
                   password:password
               },
               function(data){
                    if(data == 1){                        
                        $('.error').removeClass().addClass('alert alert-success').html('<i class="fa fa-unlock"></i> Logging in...'); 
                        setInterval(function(){
                            window.location = 'admin.php';
                        },1000);
                    }else{
                        $('.error').addClass('alert alert-danger').html('Username/Password is Incorrect!');
                        $('#username').val('');
                        $('#password').val(''); 
                    }
               });
    });

    $('.brand').on('change', function () {
        var brand = $(this).val();
        var category = $('#categoryKey').val();
        var minPrice = $('#minPrice').val();
        var maxPrice = $('#maxPrice').val();
        filterSearch(brand, category , minPrice , maxPrice);
    });

    function filterSearch(brand, category , minPrice , maxPrice) {
        $.ajax({
            url : 'filterProduct.php',
            type : 'GET',
            data : {
                'brand' : brand,
                'category': category,
                'minPrice': minPrice,
                'maxPrice': maxPrice
            },
            success : function(data) {
                console.log(data);
                if (data != 'error') {
                    $('#allProducts').empty();
                    $('#allProducts').html(data);
                }
            },
            error : function(request,error)
            {
                console.log("Request: "+JSON.stringify(request));
            }
        });
    }


    $("#ex2").slider();
    $("#ex2").on("slide", function(slideEvt) {
        var minPrice = slideEvt.value[0];
        var maxPrice = slideEvt.value[1];

        $('#minPrice').val(minPrice);
        $('#maxPrice').val(maxPrice);

        var brand = null;
        if ($('input[name=brand]:checked').length > 0) {
            brand = $('input[name=brand]:checked').val();
        }
        console.log(brand);


        var category = $('#categoryKey').val();

        filterSearch(brand, category , minPrice , maxPrice);
    });

});