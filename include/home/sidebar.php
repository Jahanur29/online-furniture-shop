<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
                        <div class="list-group">
                        <?php                            
                            $q = "Select * from category order by title asc";
                            $r = mysql_query($q);

                            if($r){
                                while($row = mysql_fetch_array($r)){
                                    echo '<a href="category.php?filter='.$row['title'].'" class="list-group-item">'.$row['title'].'</a>';
                                }
                            }
                        ?>                    
                        </div> 
                        <!--/category-products-->

                        <h2>Brand</h2>

                        <div class="list-group">
                            <?php
                            $q = "Select * from brands order by title asc";
                            $r = mysql_query($q);

                            if($r){
                                while($row = mysql_fetch_array($r)){
                                    echo '<input type="radio" name="brand" class="brand" value="'.$row['title'].'"> '.$row['title'].'</input><br>';
                                }
                            }
                            ?>
                        </div>
                        <?php
                        $q = "SELECT min(price) as minPrice, max(price) as maxPrice FROM `products`";
                        $execute = mysql_query($q);
                        $prices = mysql_fetch_assoc($execute);

                        ?>

                        <h2> Filter by price </h2><b><?php echo $prices['minPrice']; ?></b><input id="ex2" type="text" class="span2" value="" data-slider-min="<?php echo $prices['minPrice']; ?>" data-slider-max="<?php echo $prices['maxPrice']; ?>" data-slider-step="100" data-slider-value="[<?php echo $prices['minPrice']; ?>,<?php echo $prices['maxPrice']; ?>]"/> <b><?php echo $prices['maxPrice']; ?></b>
                        <input type="hidden" value="<?php echo $prices['minPrice']; ?>" id="minPrice">
                        <input type="hidden" value="<?php echo $prices['maxPrice']; ?>" id="maxPrice">

                    </div>
                </div>