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

    $dateQuery  = " AND STR_TO_DATE(`dateDelivered`, '%m/%d/%y') >= '$fromDate' AND STR_TO_DATE(`dateDelivered`, '%m/%d/%y') <= '$toDate'";
}
$result = mysql_query("SELECT * FROM `order` WHERE STATUS = 'delivered'".$dateQuery);
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
        }
        $index++;
       }
    }
$orderedProducts = array();
if (count($orders) > 0) {
    foreach ($orders as $ordersKey => $value) {
        $key = search($orders, 'name', $value['name']); 

        $totalQty = 0;
        foreach ($key as $v) {
            $orderedProducts[$ordersKey]['name'] =  $v['name'];
            $totalQty += $v['quantity'];
            $orderedProducts[$ordersKey]['quantity'] =  $totalQty;
        }
    }
$orderedProducts = array_map("unserialize", array_unique(array_map("serialize", $orderedProducts)));
}
?>  

<section>
    <div class="container">
        <div class="row">
            <?php include('include/admin/sidebar.php');?>


            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <div class="">
                      <form action="">
                        <table>
                            <tr>
                                <td><p>From: <input type="text" required name="fromDate" id="datepicker"></p></td>
                                <td><p>To: <input type="text" required name="toDate" id="datepicker2"></p></td>
                            </tr>
                                
                        </table>
                        <button type="submit"> Show </button>
                      </form>
                        
                    </div>
              
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sl</th>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                $sl = 1;
                foreach($orderedProducts as $prd){
            ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td>
                        <?php
                        $productNames = explode("-", $prd['name']);
                        echo $productNames[0]
                        ?>
                    </td>
                    <td><?php echo $prd['quantity']; ?></td>
                </tr>
             <?php $sl++; } ?>
        </tbody>
    </table>
</section>
<?php include('include/admin/footer.php'); ?>