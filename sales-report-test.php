



<!-- 
<head>
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
 -->


<?php include('include/admin/header.php');?>
<?php
function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}

include('db.php');
$result = mysql_query("SELECT * FROM products");
$products = array();
$orders = array();
$index = 0;
while($row = mysql_fetch_array($result))
    {
       $products[$index]["name"] = $row["Product"];
       $index++;
    }
$dateQuery = "";    
if (isset($_GET["fromDate"])) {
    $fromDate = date("Y-m-d", strtotime($_GET["fromDate"]));
    $toDate = date("Y-m-d", strtotime($_GET["toDate"]));

    $dateQuery  = " STR_TO_DATE(`dateDelivered`, '%m/%d/%y') >= '$fromDate' AND STR_TO_DATE(`dateDelivered`, '%m/%d/%y') <= '$toDate'";
}else
{
    $dateQuery = "1";
}
$result = mysql_query("SELECT * FROM `order` WHERE ".$dateQuery);
$index = 0;
while($row = mysql_fetch_array($result))
    {
       $pieces = explode(",", $row["item"]);
       foreach ($pieces as $key => $value) {
        $nameAndQty = [];
        $ord = trim($value);
        $nameAndQty = explode(' ', $ord, 2);
        if(isset($nameAndQty[1])){
            $orders[$index]["name"] = $nameAndQty[1];
            $orders[$index]["quantity"] = substr($nameAndQty[0], 1, -1);
            $orders[$index]["status"] = $row["status"];
            $orders[$index]["cName"] = $row["name"];
        }
        $index++;
       }
    }

//    echo '<pre>';
//    print_r($orders);
//    die();
$orderedProducts = array();
if (count($orders) > 0) {
    foreach ($orders as $ordersKey => $value) {
        $key = search($orders, 'name', $value['name']); 

        $totalQty = 0;
        foreach ($key as $v) {
            $orderedProducts[$ordersKey]['name'] =  $v['name'];
            $orderedProducts[$ordersKey]['quantity'] =  $v['quantity'];
            $orderedProducts[$ordersKey]['status'] =  $v['status'];
            $orderedProducts[$ordersKey]['cName'] =  $v['cName'];
        }
    }
//$orderedProducts = array_map("unserialize", array_unique(array_map("serialize", $orderedProducts)));
}
?> 


  <div class="container">
        <div class="row">
            <?php include('include/admin/sidebar.php');?>


            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <div class="">
                      <form action="">
                        <table>
                            <tr>
                                <td><p>From: <input type="date" required name="fromDate" id="datepicker"></p></td>
                                <td><p>To: <input type="date" required name="toDate" id="datepicker2"></p></td>
                            </tr>
                                
                        </table>
                        <button type="submit"> Show </button>
                      </form>
                        
                    </div>







<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $sl = 1;
                foreach($orderedProducts as $prd){
                $productNames = explode("-", $prd['name']);

            ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $prd['cName']; ?></td>
                    <td><?php echo $productNames[0]?></td>
                    <td><?php if (isset($productNames[1])) echo $productNames[1]?></td>
                    <td><?php if (isset($productNames[2])) echo $productNames[2]?></td>
                    <td><?php echo $prd['quantity']; ?></td>
                    <td><?php echo $prd['status']; ?></td>
                </tr>
             <?php $sl++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sl</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>

<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.flash.min.js"></script>
<script src="js/jszip.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>

<script src="js/buttons.html5.min.js"></script>

<script src="js/buttons.print.min.js"></script>



    <script type="text/javascript">
        

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

    </script>