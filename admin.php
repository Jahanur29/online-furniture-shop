
<?php include('include/admin/header.php');?>
    <section>
		<div class="container">
			<div class="row">
				<?php include('include/admin/sidebar.php');?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>
                        
          
          					<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" /><br>
          					<div class="row">
          						<div class="col-md-4">
      								<label for="quantity">Quantity</label> 
		          					<select type="text" name="quantity" id="quantity" />
		          						<option value="all" selected>All</option>
		          						<option value="empty">Empty</option>
		          						<option value="low">Low</option>
		          						<option value="normal">Normal</option>
		          					</select>			
          						</div>
          					</div> <br>
          				
					<a rel="facebox" href="addproduct.php" class="btn btn-default">Add Product</a>
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> ID </th>
								<th> Image </th>
								<th> Product </th>
								<th> Desciption </th>
								<th> Price </th>
								<th> Category </th>
								<th> Quantity </th>
								<th> Brand </th>
                                <th> Action </th>
							</tr>
						</thead>
						<tbody>
						<?php
							$filterQuery = "1";
							if (isset($_GET['quantity'])) {
								$fQuantity = $_GET['quantity'];
								if ($fQuantity == "all") {
									$filterQuery = "1";
								}elseif ($fQuantity == "empty") {
									$filterQuery = "qty <= 0";
								}elseif ($fQuantity == "low") {
									$filterQuery = "qty <= 5 AND qty > 0";
								}elseif ($fQuantity == "normal") {
									$filterQuery = "qty > 5";
								}
							}
							include('db.php');
							$query = "SELECT * FROM products where $filterQuery";
							$result = mysql_query($query);
							while($row = mysql_fetch_array($result))
								{
									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['ID'].'</td>';
									echo '<td><a rel="facebox" href="editproductimage.php?id='.$row['ID'].'"><img src="reservation/img/products/'.$row['imgUrl'].'" width="80" height="50"></a></td>';
									echo '<td><div align="right">'.$row['Product'].'</div></td>';
									echo '<td><div align="right">'.$row['Description'].'</div></td>';
									echo '<td><div align="right">'.$row['Price'].'</div></td>';
									echo '<td><div align="right">'.$row['Category'].'</div></td>';
									if ((int) $row['qty'] <= 0) {
										echo '<td><h5> 0 <span class="label label-danger"> Empty </span></h5></td>';
									}
									elseif ((int) $row['qty'] < 5) {
											
									echo '<td><h5>'.$row['qty'].' <span class="label label-warning">Low</span></h5></td>';

									}else
									{
										echo '<td><h5><div align="right"><span class="label label-success">'.$row['qty'].'</span></div></h5></td>';
									}
								
									if ($row['brand'] != null)
									    echo '<td><div align="right">'.$row['brand'].'</div></td>';
                                    else
                                        echo '<td><div align="right">Unknown</div></td>';
									echo '<td><div align="center"><a rel="facebox" href="editproductdetails.php?id='.$row['ID'].'"><i class="fa fa-edit fa-lg text-success"></i></a> | <a href="#" id="'.$row['ID'].'" class="delbutton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>';
									echo '</tr>';
								}
?> 
						</tbody>
					</table>
              </section>
<?php include('include/admin/footer.php'); ?>