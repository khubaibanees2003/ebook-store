<?php
  include('query.php');
   include('header.php');
 
  ?>

<?php



if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("select * from books Where id = :id");
    $query->bindParam('id', $id);
    $query->execute();
    $productDetail = $query->fetch(PDO::FETCH_ASSOC);

    
    // if(isset($productDetail['name'], $productDetail['price'], $productDetail['description'])){
        
    // } else {
        
    //     var_dump($productDetail);
    //     echo "Product not found.";
    // }
	

	
?>



	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="dashmin-1.0.0/img/<?php echo $productDetail['image']?>">
									<div class="wrap-pic-w pos-relative">
										<img src="dashmin-1.0.0/img/<?php echo $productDetail['image']?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="dashmin-1.0.0/img/<?php echo $productDetail['image']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-2">
						<?php echo $productDetail['name']?>
						</h4>
						<p class="stext-102 cl3 p-t-23">
						<?php echo $productDetail['price']?>
					</p>
						<p class="stext-102 cl3 p-t-23">
						<?php echo $productDetail['description']?>
					</p>
						
						<!--  -->
						<div class="p-t-33">
							
                             <form method="post" action="cart.php" >
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="form-control cl3 txt-center num-product" type="number" name="num-product" value="1"  min="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<input type="hidden" value="<?php echo $productDetail['id']?>" name="p_id">
									<input type="hidden" value="<?php echo $productDetail['name']?>" name="p_name">
									<input type="hidden" value="<?php echo $productDetail['price']?>" name="p_price">
									<input type="hidden" value="<?php echo $productDetail['description']?>" name="p_des">
									<input type="hidden" value="<?php echo $productDetail['image']?>" name="p_image">
									<?php
						if(isset($_SESSION['uemail'])){
					    	?>
									<button name="addtocart" type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
									<?php
							}
							else{
						?>
						 <a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Add to cart
						</a>
						
						<?php
							};
						?>
								</div>
							</div>	
							</form>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		<?php
}

?>
		
		
	</section>


	
		

	<!-- Footer -->
	<?php
	include('footer.php');
	?>
