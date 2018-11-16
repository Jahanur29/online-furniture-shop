
<?php include('include/admin/header.php');?>
<section>
    <div class="container">
        <div class="row">
            <?php include('include/admin/sidebar.php');?>


            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Brands</h2>


                    <label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
                    <a rel="facebox" href="addbrand.php">Add Brand</a>
                    <table cellpadding="1" cellspacing="1" id="resultTable">
                        <thead>
                        <tr>
                            <th  style="border-left: 1px solid #C1DAD7"> ID </th>
                            <th> Title </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include('db.php');
                        $result = mysql_query("SELECT * FROM brands");
                        while($row = mysql_fetch_array($result))
                        {
                            echo '<tr class="record">';
                            echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['id'].'</td>';
                            echo '<td><div align="right">'.$row['title'].'</div></td>';
                            echo '<td><div align="center"><a rel="facebox" href="editbranddetails.php?id='.$row['id'].'"><i class="fa fa-edit fa-lg text-success"></i></a> | <a href="#" id="'.$row['id'].'" class="delBrandButton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
</section>
<?php include('include/admin/footer.php'); ?>