<?php 
	$total_cart = 0;
	if (isset($_SESSION['shopping_cart'])) {
		foreach ($_SESSION['shopping_cart'] as $v) {
			$total_cart++;
		}
	}
?>
<div class="cart_ruouvang">
	<a href="/gio-hang">
    	<i class="fa fa-shopping-bag" aria-hidden="true"></i> (<span class="badge1"><?= $total_cart ?></span>)
    </a>
</div>