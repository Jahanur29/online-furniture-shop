<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('db.php');

if(isset($_GET['brand']))
{
    $brand = $_GET['brand'];
    $category = $_GET['category'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];

    if ($brand != null && $brand != '')
    {
        $brandQuery = "brand = '$brand' AND";
    }else
        $brandQuery = " ";

    if ($category != null && $category != '') {
        $query = "SELECT * FROM products WHERE ".$brandQuery." Category = '$category' AND Price BETWEEN '$minPrice' AND '$maxPrice'";
        $results = mysql_query($query);
    }
    else {
        $query = "SELECT * FROM products WHERE ".$brandQuery." Price BETWEEN '$minPrice' AND '$maxPrice'";
        $results = mysql_query($query);
    }

    if ($results)
    {
        $singleProductHtml = '';
        while($row=mysql_fetch_array($results)){
            $singleProductHtml .= '<ul class="col-sm-4">
                            <div class="product-image-wrapper">
                                                      <div class="single-products">
                                                      <div class="productinfo text-center">
                                                <a href="product-details.php?prodid=';
            $singleProductHtml .= $row["ID"];
            $singleProductHtml .=' rel="bookmark" title="'.$row["Product"].'"><img src="reservation/img/products/';
            $singleProductHtml .= $row["imgUrl"] . '" alt="'.$row["Product"].'" title="'.$row["Product"].'" width="150" height="150"></a><h2><a href="product-details.php?prodid=';
            $singleProductHtml .= $row["ID"];
            $singleProductHtml .= ' rel="bookmark" title="'.$row["Product"].'">'.$row["Product"].'</a></h2><h2>';
            $singleProductHtml .= $row["Price"];
            $singleProductHtml .= '</h2><p>Category: ';
            $singleProductHtml .=  $row["Category"];
            $singleProductHtml .=  '</p><a href="product-details.php?prodid=';
            $singleProductHtml .=  $row["ID"];
            $singleProductHtml .=  '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a></div></div></div></ul>';
        }
        echo $singleProductHtml;
    }
}else
{
    echo 'error';
}

?>