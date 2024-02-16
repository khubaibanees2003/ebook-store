   <?php
   include('query.php');
   include('header.php');
   ?>
	<!-- Slider -->
	
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/cover1.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2" style="color:black;">
									Best Collection 2024
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color:black;">
									NEW Books
								</h2>
							</div>
								
							
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<?php
				$query = $pdo->query("select * from books_category");
				$allcategories = $query->fetchall(PDO::FETCH_ASSOC);
				foreach($allcategories as $singleCategory){
					?>
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="dashmin-1.0.0/img/<?php echo $singleCategory['image']?>" alt="IMG-BANNER" style="height: 500px;">

						<a href="books.php?id=<?php echo $singleCategory['id'] ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8" style="color:white;">
								<?php echo $singleCategory['name']?>
								</span>

								<span class="block1-info stext-102 trans-04"style="color:black;" >
								<b><?php echo $singleCategory['description']?></b>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05" >
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				
	
	<?php
	 	};
	 ?>
	
	</div>
		</div>
	</div>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
				   All Books
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Books
					</button>
					<?php
				$query = $pdo->query("select * from books_category");
				$allcategories = $query->fetchall(PDO::FETCH_ASSOC);
				foreach($allcategories as $singleCategory){
					?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $singleCategory['id'] ?>">
					<?php echo $singleCategory['name']?>
					</button>

					<?php
			    	}
					?>
			
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				
			</div>
         <!-- ========================= -->
			<div class="row isotope-grid">
			 <?php
				$query = $pdo->query("select * from books");
				$allproducts = $query->fetchall(PDO::FETCH_ASSOC);
				foreach($allproducts as $singleproduct){
					?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $singleproduct['cid'] ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0 abc">
							<img src="dashmin-1.0.0/img/<?php echo $singleproduct['image']?>" alt="IMG-PRODUCT" style="height: 400px;" >

							<a href="book-detail.php?id=<?php echo $singleproduct['id']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="book-detail.php?id=<?php echo $singleproduct['id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $singleproduct['name']?>
								</a>

								<span class="stext-105 cl3">
								<?php echo $singleproduct['price']?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				
				</div>
				<?php
				}  
			   ?>
		
			</div>


			
		</div>
	</section>


	<!-- Footer -->
	<?php
	include('footer.php');  
	?>