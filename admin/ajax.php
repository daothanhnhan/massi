<?php

session_start();
include_once("__autoload.php");
include_once('../functions/database.php');

$page = new action_page();

$order = new action_order();

$acc = new action_account();
//$detail = $acc->getLoginInfor();
if (isset($_POST['action'])) {
	switch ($_POST['action']) {

			case 'addMoreColor':
				$page->addMoreColor();
				break;
			case 'addMoreSize':
				$page->addMoreSize();
				break;
			case 'addMorePicture':
				$page->addMorePicture();
				break;

		/*------------------------------------------------*/

			case 'addMenu':	
				$page->addMenu();
				break;

			case 'updateMenu':
				$page->updateMenu();
				break;

			case 'deleteMenu':
				$page->deleteMenu();
				break;


		/*------------------------------------------------*/

			case 'updateLangConfig':
				$page->updateLangConfig();
				break;

			case 'updateLangMenu':
				$page->updateLangMenu();
				break;

			case 'updateLangPage':
				$page->updateLangPage();
				break;

			case 'updateLangNewsCat':
				$page->updateLangNewsCat();
				break;

			case 'updateLangNews':
				$page->updateLangNews();
				break;

			case 'updateLangServiceCat':
				$page->updateLangServiceCat();
				break;

			case 'updateLangService':
				$page->updateLangService();
				break;	

			case 'updateLangProductCat':
				$page->updateLangProductCat();
				break;

			case 'updateLangProduct':
				$page->updateLangProduct();
				break;

		/*-------------- Đăng nhập ----------------*/

			case 'loginAdmin':
				$acc->login();
				break;

		/*-------------- Người giúp việc ----------------*/
		
			case 'addAccount':
				$acc->addAccount();
				break;
			
			case 'updateAccount':
				$acc->updateAccount();
				break;
			
			case 'deleteAccount':
				$acc->deleteAccount();
				break;
		
		/*-------------- Danh mục sản phẩm --------------*/

			case 'addProductCat':
				$page->addProductCat();
				break;

			case 'updateProductCat':
				if($acc->checkAdmin()){
					$page->updateProductCat();
				}else if ($page->getDetail('productcat','id_productCat',$_POST['id_productCat'])['created_id'] == $detail['id_account'] ) {
					$page->updateProductCatMod();
				}else {
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;

			case 'deleteProductCat':
				if ($acc->checkAdmin()) {
					$page->deleteProductCat();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;

				

		/*-------------- Sản phẩm --------------*/

			case 'addProduct':
				$page->addProduct();
				break;

			case 'updateProduct':

				if($acc->checkAdmin()){
					$page->updateProduct();
				}else if ($page->getDetail('product','id_product',$_POST['id_product'])['created_id'] == $detail['id_account'] ) {
					$page->updateProductMod();
				}else {
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;

			case 'deleteProduct':
				if ($acc->checkAdmin()) {
					$page->deleteProduct();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;
				
		/*----------- Danh mục bài viết ---------------*/
			case 'addNewsCat':
				$page->addNewsCat();
				break;
			
			case 'updateNewsCat':
				if($acc->checkAdmin()){
					$page->updateNewsCat();
				}else if ($page->getDetail('pagecat','id_pageCat',$_POST['id_pageCat'])['created_id'] == $detail['id_account']) {
					$page->updatePageCatMod();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				
				break;
			
			case 'deleteNewsCat':
				if ($acc->checkAdmin()) {
					$page->deleteNewsCat();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				
				break;
		
		/*------------ Bài viết ---------------*/
			case 'addPage':
				$page->addPage();
				break;
			
			case 'updatePage':
				if($acc->checkAdmin()){
					$page->updatePage();
				}else if ($page->getDetail('page','id_page',$_POST['id_page'])['created_id'] == $detail['id_account'] ) {
					$page->updatePageMod();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				
				break;
			
			case 'deletePage':
				if ($acc->checkAdmin()) {
					$page->deletePage();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				
				break;
		
		/*------------- Tin tức ---------------*/
			case 'addNews':
				$page->addNews();
				break;
			
			case 'updateNews':
				// if ($acc->checkAdmin()) {
				// 	$page->updateNews();
				// }else if ($page->getDetail('news','id_news',$_POST['id_news'])['created_id'] == $detail['id_account']) {
				// 	$page->updateNewsMod();
				// }else{
				// 	echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				// }
				$page->updateNews();
				break;
			
			case 'deleteNews':
				if ($acc->checkAdmin()) {
					$page->deleteNews();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;

		/*----------- Danh mục dịch vụ ---------------*/
			case 'addServiceCat':
				$page->addServiceCat();
				break;
			
			case 'updateServiceCat':
				if($acc->checkAdmin()){
					$page->updateServiceCat();
				}else if ($page->getDetail('pagecat','id_pageCat',$_POST['id_pageCat'])['created_id'] == $detail['id_account']) {
					$page->updatePageCatMod();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				
				break;
			
			case 'deleteServiceCat':
				if ($acc->checkAdmin()) {
					$page->deleteServiceCat();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				
				break;		

/*------------- Dịch vụ ---------------*/
			case 'addService':
				$page->addService();
				break;
			
			case 'updateService':
				if ($acc->checkAdmin()) {
					$page->updateService();
				}else if ($page->getDetail('service','id_service',$_POST['id_service'])['created_id'] == $detail['id_account']) {
					$page->updateServiceMod();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;

			case 'deleteService':
				if ($acc->checkAdmin()) {
					$page->deleteService();
				}else{
					echo json_encode(array('error'=>'Bạn không có quyền thực hiện'));
				}
				break;		

		/*------------ Đơn hàng -------------*/
			case 'updateOrder':
				$order->updateOrder();
				break;

			case 'deleteOrder':
				$order->deleteOrder();
				break;

				/** Xóa chi tiết đơn hàng */
			case 'deleteOrderDetail' :
				$order->deleteOrderDetail();
				break;
		/*------------ Config --------------*/
			case 'updateConfig':
				$page->updateConfig();
				break;
				
		default:
			# code...
			break;
	}
}

if (isset($_GET['action'])) {
	switch ($_GET['action']) {

			case 'getMenuType':
				$page->getMenuType();
				break;

		
		default:
			# code...
			break;
	}
}

?>
