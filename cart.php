<?php
    //    session_start();
	   include('query.php');
	   include('header.php');
	   ?>

        <?php
		if(isset($_POST['addtocart'])){

			if(isset($_SESSION['finalcart'])){
	
					$productId = array_column($_SESSION['finalcart'],'p_id');
					if(in_array($_POST['p_id'],$productId)){
	
						echo "<script>alert('book is already added to the cart');
						</script>";
					}
					else{
	
					$count = count($_SESSION['finalcart']);
					$_SESSION['finalcart'][$count] = array('p_id'=>$_POST['p_id'],'p_name'=>$_POST['p_name'],'p_price'=>$_POST['p_price'],'p_des'=>$_POST['p_des'],'p_image'=>$_POST['p_image'],'p_qty'=>$_POST['num-product']);
					echo "<script>alert('cart added succcessfully');
					location.assign('cart.php')
					</script>";
				}
			}
			else{
				$_SESSION['finalcart'][0] = array('p_id'=>$_POST['p_id'],'p_name'=>$_POST['p_name'],'p_price'=>$_POST['p_price'],'p_des'=>$_POST['p_des'],'p_image'=>$_POST['p_image'],'p_qty'=>$_POST['num-product']);
				echo "<script>alert('cart added succcessfully');location.assign('cart.php')</script>";
			}
	}
	
	// var_dump($_POST);
		//remove product from session
		if(isset($_GET['remove'])){
			$id = $_GET['remove'];
			foreach($_SESSION['finalcart'] as $key =>$value){
				if($id == $value['p_id']){
					unset($_SESSION['finalcart'][$key]);
					//reset array
					$_SESSION['finalcart'] = array_values($_SESSION['finalcart']);
				}
			}
			echo  "<script> 
				   alert('cart remove successfully');
				   location.assign('cart.php')
				</script>";
		}

		// checkout

if(isset($_GET['checkout'])){
	$userId = $_SESSION['uid'];
	$username = $_SESSION['uname'];
	$useremail = $_SESSION['uemail'];
	foreach($_SESSION['finalcart'] as $key => $value){
			$productId = $value['p_id'];
			$productName = $value['p_name'];
			$productPrice = $value['p_price'];
			$productQty = $value['p_qty'];
             $query = $pdo->prepare("insert into orders(u_id,u_name, p_id , p_name, p_price ,p_qty) values (:uId , :uName, :pId, :pName ,:pPrice ,:pQty)");
			$query->bindParam('uId' , $userId);
			$query->bindParam('uName' , $username);
			$query->bindParam('pId' , $productId);
			$query->bindParam('pName' , $productName);
			$query->bindParam('pPrice' , $productPrice);
			$query->bindParam('pQty' , $productQty);
			$query->execute();


	}
	echo "<script>alert('order placed succcessfully');
	location.assign('index.php');
	</script>";
	foreach($_SESSION['finalcart'] as $key => $value){
        unset($_SESSION['finalcart'][$key]);
    }
}


		?>
  


		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Book</th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
                                    <th class="column-5">Action</th>
							
								</tr>
								<?php
								if(isset($_SESSION['uemail'])){
								if(isset($_SESSION['finalcart'])){
									foreach($_SESSION['finalcart'] as $key => $value ){

									
								?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="dashmin-1.0.0/img/<?php echo $value['p_image']?>" alt="IMG-PRODUCT">
										</div>
									</td>
									<td class="column-2"><?php echo $value['p_name'] ?></td>
									<td class="column-3"><?php echo $value['p_price'] ?></td>
									<td class="column-4"><?php echo $value['p_qty'] ?></td>
									<td class="column-5"><?php echo $value['p_qty'] * $value['p_price'] ?></td>
                                  

									<td class="column-6"><a class="btn btn-danger" href="?remove=<?php echo $value['p_id']?>">Remove</a></td>
								</tr>
								<?php
								}
							}}
								?>
		
								

							</table>
					

						</div>

						
					</div>
				</div>
				

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
								<?php
               if (isset($_SESSION['finalcart'])) {
                   $totalPrice = 0;
                   foreach ($_SESSION['finalcart'] as $item) {
                       $totalPrice += $item['p_qty'] * $item['p_price'];
                   }
                   echo "<b><span>PKR " . number_format($totalPrice, 0) . "</span></b>"; 
               } else {
                   echo "<b><h4>PKR 0.00</h4></b>"; 
               }
            ?>
							</div>

							<!-- <div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div> -->
						</div>

						<?php
						if(isset($_SESSION['uemail'])){
					    	?>
							<a href="?checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" >
								proceed to checkout
							</a>
						<?php
							}
							else{
						?>

                        <a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Proceed to Checkout
						</a>
						
						<?php
							};
						?>
					</div>
				</div>
			</div>
		</div>
	</form>
	
		
	
		

	<!-- Footer -->
	<?php
	include('footer.php');
	?>
