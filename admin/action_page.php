<?php

/**

* 

*/





include_once("../functions/library.php");



class action_page extends library{



	public function getListLanguages(){

		return $this->getList('languages','','','languages_id','asc','','','');

	}



	/*-------------- Cấu hình trang chủ --------------------*/



		public function getConfig(){

			$sql = "SELECT * from config where id_config ='1'";

			$this->query($sql,'VN');

			if ($this->num_row("VN") > 0) {

				return $this->fetch_one("VN");

			}

		}



		public function updateConfig(){

			$config_id = 1;

			$web_name = isset($_POST['web_name']) ? $_POST['web_name'] : '';

			$web_meta = isset($_POST['web_meta']) ? $_POST['web_meta'] : '';

			$web_des = isset($_POST['web_des']) ? $_POST['web_des'] : '';

			$web_keyword = isset($_POST['web_keyword']) ? $_POST['web_keyword'] : '';

			$web_logo = isset($_POST['web_logo']) ? $_POST['web_logo'] : '';

			$web_hotline = isset($_POST['web_hotline']) ? $_POST['web_hotline'] : '';

			$web_phone = isset($_POST['web_phone']) ? $_POST['web_phone'] : '';

			$web_email = isset($_POST['web_email']) ? $_POST['web_email'] : '';

			$content_home1 = isset($_POST['content_home1']) ? $_POST['content_home1'] : '';

			$content_home2 = isset($_POST['content_home2']) ? $_POST['content_home2'] : '';

			$content_home3 = isset($_POST['content_home3']) ? $_POST['content_home3'] : '';

			$content_home4 = isset($_POST['content_home4']) ? $_POST['content_home4'] : '';

			$content_home5 = isset($_POST['content_home5']) ? $_POST['content_home5'] : '';

			$content_home6 = isset($_POST['content_home6']) ? $_POST['content_home6'] : '';

			$content_home7 = isset($_POST['content_home7']) ? $_POST['content_home7'] : '';

			$content_home8 = isset($_POST['content_home8']) ? $_POST['content_home8'] : '';

			$content_home9 = isset($_POST['content_home9']) ? $_POST['content_home9'] : '';

			$content_home10 = isset($_POST['content_home10']) ? $_POST['content_home10'] : '';

			$subImage = isset($_POST['subImage']) ? $_POST['subImage'] : '';

			$banner1 = isset($_POST['banner1']) ? $_POST['banner1'] : '';

			$banner2 = isset($_POST['banner2']) ? $_POST['banner2'] : '';

			$icon_web = isset($_POST['icon_web']) ? $_POST['icon_web'] : '';



			$src= "../images/";

			$sub_img = array();

	    	if(isset($_FILES['fileUpload2']) && $_FILES['fileUpload2']['name'] != ""){



				foreach (array_combine($_FILES['fileUpload2']['name'], $_FILES['fileUpload2']['tmp_name']) as $name => $tmp_name){

					if ($name != '' && $name != ' ') {

						$this->uploadPicture($src, $name, $tmp_name);

						$sub_img[] = json_encode(array('image'=>$name));

					}

				}

			}



			if ($subImage) {

				foreach ($subImage as $key => $val) {

					$sub_img[] = json_encode(array('image'=>$val));

				}

			}

			// print_r($sub_img);

			$sub_img = json_encode($sub_img);

			// echo $sub_img;



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$web_logo = $img['name'];

		    	$success = $this->createThumbnail($src.$web_logo, $src.'/thumbs/'.$web_logo, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$web_logo = $_POST['web_logo'];

	    	}

	    	if (isset($_FILES['fileUpload3']) && $_FILES['fileUpload3']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload3'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$banner1 = $img['name'];

		    	//$success = $this->createThumbnail($src.$web_logo, $src.'/thumbs/'.$web_logo, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$banner1 = $_POST['banner1'];

	    	}

	    	if (isset($_FILES['fileUpload4']) && $_FILES['fileUpload4']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload4'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$banner2 = $img['name'];

		    	//$success = $this->createThumbnail($src.$web_logo, $src.'/thumbs/'.$web_logo, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$banner2 = $_POST['banner2'];

	    	}

	    	if (isset($_FILES['fileUpload6']) && $_FILES['fileUpload6']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload6'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$banner3 = $img['name'];

		    	//$success = $this->createThumbnail($src.$web_logo, $src.'/thumbs/'.$web_logo, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$banner3 = $_POST['banner3'];

	    	}

	    	if (isset($_FILES['fileUpload5']) && $_FILES['fileUpload5']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload5'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$icon_web = $img['name'];

		    	//$success = $this->createThumbnail($src.$web_logo, $src.'/thumbs/'.$web_logo, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$icon_web = $_POST['icon_web'];

	    	}

	    	
	    	$lang_showMain = "vn";	

	    	$this->Update_1('config_languages', 

		    							 array('lang_web_name', 

		    							 	   'lang_web_meta', 

		    							 	   'lang_web_des', 

		    							 	   'lang_web_keyword', 

		    							 	   'lang_web_hotline', 

		    							 	   'lang_web_phone', 

		    							 	   'lang_web_email', 

		    							 	   'lang_content_home1', 

		    							 	   'lang_content_home2', 

		    							 	   'lang_content_home3', 

		    							 	   'lang_content_home4', 

		    							 	   'lang_content_home5', 

		    							 	   'lang_content_home6', 

		    							 	   'lang_content_home7', 

		    							 	   'lang_content_home8', 

		    							 	   'lang_content_home9', 

		    							 	   'lang_content_home10'), 

		    							 array(&$web_name, 

										  		&$web_meta, 

										  		&$web_des, 

										  		&$web_keyword, 

										  		&$web_hotline, 

										  		&$web_phone,

										  		&$web_email, 

										  		&$content_home1, 

										  		&$content_home2, 

										  		&$content_home3, 

										  		&$content_home4, 

										  		&$content_home5, 

										  		&$content_home6, 

										  		&$content_home7, 

										  		&$content_home8, 

										  		&$content_home9, 

										  		&$content_home10, 

		    							 	   	&$config_id, 

		    							 	   	&$lang_showMain), 

		    							 array('config_id',

		    							 	   'languages_code'),

		    							 'sssssssssssssssssis');



			if (!$this->Update_1('config',

								  array('web_name', 

								  		'web_meta', 

								  		'web_des', 

								  		'web_keyword', 

								  		'web_logo', 

								  		'web_hotline', 

								  		'web_phone', 

								  		'web_email', 

								  		'content_home1', 

								  		'content_home2', 

								  		'content_home3', 

								  		'content_home4', 

								  		'content_home5', 

								  		'content_home6', 

								  		'content_home7', 

								  		'content_home8', 

								  		'content_home9', 

								  		'content_home10',

								  		'slideshow_home',

								  		'banner1',

								  		'banner2',

								  		'banner3',

								  		'icon_web'), 

								  array(&$web_name, 

								  		&$web_meta, 

								  		&$web_des, 

								  		&$web_keyword, 

								  		&$web_logo, 

								  		&$web_hotline, 

								  		&$web_phone,

								  		&$web_email, 

								  		&$content_home1, 

								  		&$content_home2, 

								  		&$content_home3, 

								  		&$content_home4, 

								  		&$content_home5, 

								  		&$content_home6, 

								  		&$content_home7, 

								  		&$content_home8, 

								  		&$content_home9, 

								  		&$content_home10,

								  		&$sub_img,

								  		&$banner1,

								  		&$banner2, 

								  		&$banner3,

								  		&$icon_web,

								  		&$config_id), 

								  array('config_id'), 

								  'sssssssssssssssssssssssi')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('config_languages',array('config_id','languages_code'),array(&$config_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('config_languages', 

		    	// 						 array('lang_web_name', 

		    	// 						 	   'lang_web_meta', 

		    	// 						 	   'lang_web_des', 

		    	// 						 	   'lang_web_keyword', 

		    	// 						 	   'lang_web_hotline', 

		    	// 						 	   'lang_web_phone', 

		    	// 						 	   'lang_web_email', 

		    	// 						 	   'lang_content_home1', 

		    	// 						 	   'lang_content_home2', 

		    	// 						 	   'lang_content_home3', 

		    	// 						 	   'lang_content_home4', 

		    	// 						 	   'lang_content_home5', 

		    	// 						 	   'lang_content_home6', 

		    	// 						 	   'lang_content_home7', 

		    	// 						 	   'lang_content_home8', 

		    	// 						 	   'lang_content_home9', 

		    	// 						 	   'lang_content_home10'), 

		    	// 						 array(&$web_name, 

							// 			  		&$web_meta, 

							// 			  		&$web_des, 

							// 			  		&$web_keyword, 

							// 			  		&$web_hotline, 

							// 			  		&$web_phone,

							// 			  		&$web_email, 

							// 			  		&$content_home1, 

							// 			  		&$content_home2, 

							// 			  		&$content_home3, 

							// 			  		&$content_home4, 

							// 			  		&$content_home5, 

							// 			  		&$content_home6, 

							// 			  		&$content_home7, 

							// 			  		&$content_home8, 

							// 			  		&$content_home9, 

							// 			  		&$content_home10, 

		    	// 						 	   	&$config_id, 

		    	// 						 	   	&$lang['languages_code']), 

		    	// 						 array('config_id',

		    	// 						 	   'languages_code'),

		    	// 						 'sssssssssssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

		}



	/*--------------- Danh mục sản phẩm -------------------*/



		public function updateProductCat(){

			$productcat_id = isset($_POST['productcat_id']) ? $_POST['productcat_id'] : '';

			$productcat_name = isset($_POST['productcat_name']) ? $_POST['productcat_name'] : '';

			$productcat_des = isset($_POST['productcat_des']) ? $_POST['productcat_des'] : '';

			$productcat_content = isset($_POST['productcat_content']) ? $_POST['productcat_content'] : '';

			$productcat_parent = isset($_POST['productcat_parent']) ? $_POST['productcat_parent'] : '';

			$productcat_sort_order = isset($_POST['productcat_sort_order']) ? $_POST['productcat_sort_order'] : '';



			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$productcat_sub_info1 = isset($_POST['productcat_sub_info1']) ? $_POST['productcat_sub_info1'] : '';

			$productcat_sub_info2 = isset($_POST['productcat_sub_info2']) ? $_POST['productcat_sub_info2'] : '';

			$productcat_sub_info3 = isset($_POST['productcat_sub_info3']) ? $_POST['productcat_sub_info3'] : '';

			$productcat_sub_info4 = isset($_POST['productcat_sub_info4']) ? $_POST['productcat_sub_info4'] : '';

			$productcat_sub_info5 = isset($_POST['productcat_sub_info5']) ? $_POST['productcat_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = $_POST['productcat_img'];

	    	}



	    	$array_child = array();

	    	$array_child = $this->getListChild('productcat','productcat_parent', $productcat_id, 'productcat_id', 'productcat_id', 'desc');

	    	if (in_array($productcat_parent, $array_child) || $productcat_parent == $productcat_id) {

	    		echo json_encode(array('error'=>'Lỗi, mời chọn lại danh mục cha'));

	    		exit();

	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'productcat', $productcat_id);

	    	$lang_showMain = "vn";	

	    	$this->Update_1('productcat_languages', 

		    							 array('lang_productcat_name', 

		    							 	   'lang_productcat_des', 

		    							 	   'lang_productcat_content', 

		    							 	   'lang_productcat_sub_info1', 

		    							 	   'lang_productcat_sub_info2', 

		    							 	   'lang_productcat_sub_info3', 

		    							 	   'lang_productcat_sub_info4', 

		    							 	   'lang_productcat_sub_info5',

		    							 	   'keyword', 

	    						  	    	   'title_seo', 

	    						  	    	   'des_seo', 

	    						  	    	   'friendly_url'), 

		    							 array(&$productcat_name, 

		    							 	   &$productcat_des, 

		    							 	   &$productcat_content, 

		    							 	   &$productcat_sub_info1, 

		    							 	   &$productcat_sub_info2, 

		    							 	   &$productcat_sub_info3, 

		    							 	   &$productcat_sub_info4, 

		    							 	   &$productcat_sub_info5,

		    							 	   &$keyword, 

	    						  	    	   &$title_seo, 

	    						  	    	   &$des_seo, 

	    						  	    	   &$friendly_url,  

		    							 	   &$productcat_id, 

		    							 	   &$lang_showMain), 

		    							 array('productcat_id',

		    							 	   'languages_code'),

		    							 'ssssssssssssis');



	    	if (!$this->Update_1('productcat', 

	    						  array('productcat_name', 

	    						  	    'productcat_des', 

	    						  	    'productcat_content', 

	    						  	    'productcat_parent', 

	    						  	    'productcat_sort_order', 

	    						  	    'productcat_img', 

	    						  	    'productcat_created_date', 

	    						  	    'keyword', 

	    						  	    'title_seo', 

	    						  	    'des_seo', 

	    						  	    'friendly_url',

	    						  	    'state', 

	    						  	    'productcat_sub_info1', 

	    						  	    'productcat_sub_info2', 

	    						  	    'productcat_sub_info3', 

	    						  	    'productcat_sub_info4', 

	    						  	    'productcat_sub_info5'), 

	    						  array(&$productcat_name, 

	    						  	    &$productcat_des, 

	    						  	    &$productcat_content, 

	    						  	    &$productcat_parent, 

	    						  	    &$productcat_sort_order, 

	    						  	    &$img_name, 

	    						  	    &$date, 

	    						  	    &$keyword, 

	    						  	    &$title_seo, 

	    						  	    &$des_seo, 

	    						  	    &$friendly_url, 

	    						  	    &$state,

	    						  	    &$productcat_sub_info1, 

	    						  	    &$productcat_sub_info2, 

	    						  	    &$productcat_sub_info3, 

	    						  	    &$productcat_sub_info4, 

	    						  	    &$productcat_sub_info5, 

	    						  	    &$productcat_id), 

	    						  array('productcat_id'), 

	    						  'sssiissssssisssssi')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('productcat_languages',array('productcat_id','languages_code'),array(&$productcat_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('productcat_languages', 

		    	// 						 array('lang_productcat_name', 

		    	// 						 	   'lang_productcat_des', 

		    	// 						 	   'lang_productcat_content', 

		    	// 						 	   'lang_productcat_sub_info1', 

		    	// 						 	   'lang_productcat_sub_info2', 

		    	// 						 	   'lang_productcat_sub_info3', 

		    	// 						 	   'lang_productcat_sub_info4', 

		    	// 						 	   'lang_productcat_sub_info5'), 

		    	// 						 array(&$productcat_name, 

		    	// 						 	   &$productcat_des, 

		    	// 						 	   &$lang_productcat_content, 

		    	// 						 	   &$productcat_sub_info1, 

		    	// 						 	   &$productcat_sub_info2, 

		    	// 						 	   &$productcat_sub_info3, 

		    	// 						 	   &$productcat_sub_info4, 

		    	// 						 	   &$productcat_sub_info5, 

		    	// 						 	   &$productcat_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('productcat_id',

		    	// 						 	   'languages_code'),

		    	// 						 'ssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

		}



		public function addProductCat(){

			$productcat_name = isset($_POST['productcat_name']) ? $_POST['productcat_name'] : '';

			$productcat_des = isset($_POST['productcat_des']) ? $_POST['productcat_des'] : '';

			$productcat_content = isset($_POST['productcat_content']) ? $_POST['productcat_content'] : '';

			$productcat_parent = isset($_POST['productcat_parent']) ? $_POST['productcat_parent'] : '';

			$productcat_sort_order = isset($_POST['productcat_sort_order']) ? $_POST['productcat_sort_order'] : '';

			$productcat_sub_info1 = isset($_POST['productcat_sub_info1']) ? $_POST['productcat_sub_info1'] : '';

			$productcat_sub_info2 = isset($_POST['productcat_sub_info2']) ? $_POST['productcat_sub_info2'] : '';

			$productcat_sub_info3 = isset($_POST['productcat_sub_info3']) ? $_POST['productcat_sub_info3'] : '';

			$productcat_sub_info4 = isset($_POST['productcat_sub_info4']) ? $_POST['productcat_sub_info4'] : '';

			$productcat_sub_info5 = isset($_POST['productcat_sub_info5']) ? $_POST['productcat_sub_info5'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';



			

			if(isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

		    }else{

		    	$img_name = "";

		    }



		    $date = $this->get_Date('Y-m-d H:m:s');



		    $friendly_url = $this->GetFinalSlug($friendly_url, 'productcat', "");



	    	$insert = $this->Insert_1('productcat', 

	    							   array('productcat_name', 

	    							   	 	 'productcat_des', 

	    							   	 	 'productcat_content', 

	    							   	 	 'productcat_parent', 

	    							   	 	 'productcat_sort_order', 

	    							   	 	 'productcat_img', 

	    							   	 	 'productcat_created_date', 

	    							   	 	 'keyword', 

	    							   	 	 'title_seo', 

	    							   	 	 'des_seo', 

	    							   	 	 'friendly_url',

	    							   	 	 'state', 

	    							   	 	 'productcat_sub_info1', 

	    							   	 	 'productcat_sub_info2', 

	    							   	 	 'productcat_sub_info3', 

	    							   	 	 'productcat_sub_info4', 

	    							   	 	 'productcat_sub_info5', 

	    							   	 	 'created_id'), 

	    							   array(&$productcat_name, 

	    							   		 &$productcat_des, 

	    							   		 &$productcat_content, 

	    							   		 &$productcat_parent, 

	    							   		 &$productcat_sort_order, 

	    							   		 &$img_name, 

	    							   		 &$date, 

	    							   		 &$keyword, 

	    							   		 &$title_seo, 

	    							   		 &$des_seo, 

	    							   		 &$friendly_url, 

	    							   		 &$state, 

	    							   		 &$productcat_sub_info1, 

	    							   		 &$productcat_sub_info2, 

	    							   		 &$productcat_sub_info3, 

	    							   		 &$productcat_sub_info4, 

	    							   		 &$productcat_sub_info5, 

	    							   		 &$_SESSION['admin_id']), 

	    							   'sssiissssssisssssi');

	    	

	    	if($insert != ''){

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$productcat_name = 'english version ' . $productcat_name;
	    				$productcat_des = 'english version ' . $productcat_des;
	    				$productcat_content = 'english version ' . $productcat_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('productcat_languages', 

	    										array('productcat_id', 

	    											  'languages_code', 

	    											  'lang_productcat_name', 

	    											  'lang_productcat_des', 

	    											  'lang_productcat_content', 

	    											  'lang_productcat_sub_info1', 

	    											  'lang_productcat_sub_info2', 

	    											  'lang_productcat_sub_info3',

	    											  'lang_productcat_sub_info4', 

	    											  'lang_productcat_sub_info5',

	    											  'keyword', 

	    							   	 	 		  'title_seo', 

	    							   	 	          'des_seo', 

	    							   	 	          'friendly_url'

	    							   	 	          ), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$productcat_name, 

	    											  &$productcat_des, 

	    											  &$productcat_content, 

	    											  &$productcat_sub_info1, 

	    											  &$productcat_sub_info2, 

	    											  &$productcat_sub_info3, 

	    											  &$productcat_sub_info4, 

	    											  &$productcat_sub_info5,

	    											  &$keyword, 

	    							   		 		  &$title_seo, 

	    							   		 		  &$des_seo, 

	    							   		 		  &$friendly_url

	    							   		 		  ),

	    										'isssssssssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-danh-muc-san-pham&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

		}



		public function deleteProductCat(){

			$productcat_id = isset($_POST['id']) ? $_POST['id'] : '';

			if ($productcat_id == 139 || $productcat_id == 140) {
				echo json_encode(array('error'=>'Mục này không được xóa.'));die;
			}

			$array_child = $this->getList('productcat','productcat_parent', $productcat_id, 'productcat_id', 'desc','','','');

			if ($array_child) {

				$current_parent = $this->getDetail_New('productcat',array('productcat_id'),array(&$productcat_id),'i');

				$current_parent = $current_parent['productcat_parent'];

				foreach ($array_child as $key => $val) {

					$this->Update_1('productcat',array('productcat_parent'),array(&$current_parent, &$val['productcat_id']),array('productcat_id'),'ii');

				}

			}



			if($this->Delete_1('productcat','',array(&$productcat_id),array('productcat_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=danh-muc-san-pham'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}	

		}



	/*--------------- Sản phẩm --------------------*/



		public function addProduct(){

			$product_idCat = isset($_POST['product_idCat']) ? $_POST['product_idCat'] : '';

			$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';

			$product_des = isset($_POST['product_des']) ? $_POST['product_des'] : '';

			$product_des2 = isset($_POST['product_des2']) ? $_POST['product_des2'] : '';

			$product_des3 = isset($_POST['product_des3']) ? $_POST['product_des3'] : '';

			$product_content = isset($_POST['product_content']) ? $_POST['product_content'] : '';

			$product_content2 = isset($_POST['product_content2']) ? $_POST['product_content2'] : '';

			$product_content3 = isset($_POST['product_content3']) ? $_POST['product_content3'] : '';

			$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';

			$product_price_sale = isset($_POST['product_price_sale']) ? $_POST['product_price_sale'] : '';

			$product_discount = isset($_POST['product_discount']) ? $_POST['product_discount'] : '';

			$productcat_id = isset($_POST['productcat_id']) ? $_POST['productcat_id'] : '';

			$product_hot = isset($_POST['product_hot']) ? $_POST['product_hot'] : '';

			$product_new = isset($_POST['product_new']) ? $_POST['product_new'] : '';

			$product_sale = isset($_POST['product_sale']) ? $_POST['product_sale'] : '';

			$product_code = isset($_POST['product_code']) ? $_POST['product_code'] : '';

			$product_original = isset($_POST['product_original']) ? $_POST['product_original'] : '';

			$product_size = isset($_POST['product_size']) ? $_POST['product_size'] : '';

			$product_package = isset($_POST['product_package']) ? $_POST['product_package'] : '';

			$product_delivery = isset($_POST['product_delivery']) ? $_POST['product_delivery'] : '';

			$product_delivery_time = isset($_POST['product_delivery_time']) ? $_POST['product_delivery_time'] : '';

			$product_payment = isset($_POST['product_payment']) ? $_POST['product_payment'] : '';

			$product_payment_type = isset($_POST['product_payment_type']) ? $_POST['product_payment_type'] : '';

			$product_material = isset($_POST['product_material']) ? $_POST['product_material'] : '';

			$product_shape = isset($_POST['product_shape']) ? $_POST['product_shape'] : '';

			$product_expiration = isset($_POST['product_expiration']) ? $_POST['product_expiration'] : '';

			$product_sub_info1 = isset($_POST['product_sub_info1']) ? $_POST['product_sub_info1'] : '';

			$product_sub_info2 = isset($_POST['product_sub_info2']) ? $_POST['product_sub_info2'] : '';

			$product_sub_info3 = isset($_POST['product_sub_info3']) ? $_POST['product_sub_info3'] : '';

			$product_sub_info4 = isset($_POST['product_sub_info4']) ? $_POST['product_sub_info4'] : '';

			$product_sub_info5 = isset($_POST['product_sub_info5']) ? $_POST['product_sub_info5'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '';

			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$product_favorite = isset($_POST['product_favorite']) ? $_POST['product_favorite'] : '';

			$product_brand = isset($_POST['product_brand']) ? $_POST['product_brand'] : 0;

			$product_sex = isset($_POST['product_sex']) ? $_POST['product_sex'] : 0;

			////////////////////
			$arr_product_size = array();
			foreach ($product_size as $item) {
				if ($item != '') {
					$arr_product_size[] = $item;
				}				
			}
			$product_size = json_encode($arr_product_size);
			$product_size_arr = implode(",", $arr_product_size);
			///////////////////
			/*************************************/
			$productCats_ar = isset($_POST['productCats']) ? $_POST['productCats'] : '';
			if ($productCats_ar) {
				$productCats_ar[count($productCats_ar)] = $_POST['productCats'][count($_POST['productCats'])-1];
			}
			// $product_cat = array();
			// /*-----------------------------------*/
			// if ($productCats_ar) {
			// 	foreach ($productCats_ar as $key => $val) {
			// 		$product_cat[] = json_encode(array('product_cat'=>$val));
			// 	}
			// }
			// $product_cat = json_encode($product_cat);

			// $tmp = 0;
			// foreach ($productCats_ar as $key => $val) {
   //              if($val == 136) $tmp = $val;
   //          }

			$product_cat = implode(",",$productCats_ar);
			/*************************************/

			$date = $this->get_Date('Y-m-d H:m:s');



    		$src= "../images/";

			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    		$success = $this->createThumbnail($src.$img_name, $src.'/thumbs/'.$img_name, 270, 190,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$img_name = '';

	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'product', '');



	  //   	if(isset($_FILES['fileUpload2']) && $_FILES['fileUpload2']['name'] != ""){



			// 	$sub_img = array();

			// 	foreach (array_combine($_FILES['fileUpload2']['name'], $_FILES['fileUpload2']['tmp_name']) as $name => $tmp_name) {

			// 		if ($name != '' && $name != ' ') {

			// 			$sub_img[] = json_encode(array('image'=>$name));

			// 		}



			// 	}



			// 	$sub_img = json_encode($sub_img);

			// }



	    	$sub_img = array();

	    	if(isset($_FILES['fileUpload2']) && $_FILES['fileUpload2']['name'] != ""){



				foreach (array_combine($_FILES['fileUpload2']['name'], $_FILES['fileUpload2']['tmp_name']) as $name => $tmp_name) {

					if ($name != '' && $name != ' ') {

						$this->uploadPicture($src, $name, $tmp_name);

						$sub_img[] = json_encode(array('image'=>$name));

					}

				}

			}



			if ($subImage) {

				foreach ($subImage as $key => $val) {

					$sub_img[] = json_encode(array('image'=>$val));

				}

			}

			// print_r($sub_img);

			$sub_img = json_encode($sub_img);

			// echo $sub_img;





			$insert = $this->Insert_1('product', 

									   array('product_name', 

									   		 'product_des', 

									   		 'product_des2', 

									   		 'product_des3', 

									   		 'product_content', 

									   		 'product_content2', 

									   		 'product_content3', 

									   		 'product_price', 

									   		 'product_price_sale', 

									   		 'product_discount', 

									   		 'product_img', 

									   		 'product_sub_img', 

									   		 'product_created_date', 

									   		 'productcat_id', 

									   		 'productcat_ar',

									   		 'product_hot', 

									   		 'product_new', 

									   		 'product_sale', 

									   		 'product_code', 

									   		 'product_original', 

									   		 'product_size', 

									   		 'product_package', 

									   		 'product_delivery', 

									   		 'product_delivery_time', 

									   		 'product_payment', 

									   		 'product_payment_type',

									   		 'product_material' ,

									   		 'product_shape' ,

									   		 'product_expiration' ,

									   		 'product_sub_info1', 

									   		 'product_sub_info2', 

									   		 'product_sub_info3', 

									   		 'product_sub_info4', 

									   		 'product_sub_info5', 

									   		 'state', 

									   		 'title_seo', 

									   		 'des_seo', 

									   		 'friendly_url', 

									   		 'keyword', 

									   		 'product_favorite',

									   		 'product_brand',

									   		 'product_sex',

									   		 'product_size_arr',

									   		 'created_id'), 

									   array(&$product_name, 

									   		 &$product_des, 

									   		 &$product_des2, 

									   		 &$product_des3, 

									   		 &$product_content, 

									   		 &$product_content2, 

									   		 &$product_content3, 

									   		 &$product_price, 

									   		 &$product_price_sale, 

									   		 &$product_discount, 

									   		 &$img_name, 

									   		 &$sub_img, 

									   		 &$date, 

									   		 &$productcat_id, 

									   		 &$product_cat, 

									   		 &$product_hot, 

									   		 &$product_new, 

									   		 &$product_sale, 

									   		 &$product_code, 

									   		 &$product_original, 

									   		 &$product_size, 

									   		 &$product_package, 

									   		 &$product_delivery, 

									   		 &$product_delivery_time, 

									   		 &$product_payment, 

									   		 &$product_payment_type, 

									   		 &$product_material, 

									   		 &$product_shape,

									   		 &$product_expiration,

									   		 &$product_sub_info1, 

									   		 &$product_sub_info2, 

									   		 &$product_sub_info3, 

									   		 &$product_sub_info4, 

									   		 &$product_sub_info5, 

									   		 &$state, 

									   		 &$title_seo, 

									   		 &$des_seo, 

									   		 &$friendly_url, 

									   		 &$keyword, 

									   		 &$product_favorite,

									   		 &$product_brand,

									   		 &$product_sex,

									   		 &$product_size_arr,

									   		 &$_SESSION['admin_id']), 

									   'sssssssdddsssisiiissssssssssssssssissssiiisi');



			if($insert != ''){



				/*-------------- Thêm màu sắc + kích cỡ ----------------*/

				foreach ($_POST['name'] as $key => $value) {

					print_r($value);

					if ($_FILES['name']['name'][$key]['img'] != '') {

						print_r($_FILES['name']['name'][$key]['img']);

						print_r($_FILES['name']['name'][$key]['tmp_name']);

						$this->uploadPicture($src, $_FILES['name']['name'][$key]['img'], $_FILES['name']['name'][$key]['tmp_name']);	

					}

					$color_id = $this->addColor($value['name'], '', $_FILES['name']['name'][$key]['img'], $insert);

					$hh = array();

					foreach ($_POST['b'][$key]['size'] as $key1 => $value1) {

						

						$hh[] = json_encode(array('size'=>$value1, 'stock'=>$_POST['b'][$key]['stock'][$key1]));

						if ($color_id != 0) {

							$this->addSize($value1, $_POST['b'][$key]['stock'][$key1], $color_id, $insert);

						}

					}

				}

				/*------------ Thêm ngôn ngữ --------------*/

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$product_name = 'english version ' . $product_name;
	    				$product_des = 'english version ' . $product_des;
	    				$product_content = 'english version ' . $product_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('product_languages', 

	    										array('product_id', 

	    											  'languages_code', 

	    											  'lang_product_name', 

	    											  'lang_product_des', 

	    											  'lang_product_des2', 

	    											  'lang_product_des3', 

	    											  'lang_product_content', 

	    											  'lang_product_content2', 

	    											  'lang_product_content3', 

	    											  'lang_product_code', 

	    											  'lang_product_original', 

	    											  'lang_product_size', 

	    											  'lang_product_package', 

	    											  'lang_product_delivery', 

	    											  'lang_product_delivery_time', 

	    											  'lang_product_payment', 

	    											  'lang_product_payment_type', 

	    											  'lang_product_sub_info1', 

	    											  'lang_product_sub_info2', 

	    											  'lang_product_sub_info3', 

	    											  'lang_product_sub_info4', 

	    											  'lang_product_sub_info5',

	    											  'title_seo', 

									   		 		  'des_seo', 

									   		          'friendly_url', 

									   		          'keyword'), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$product_name, 

	    											  &$product_des,

	    											  &$product_des2, 

	    											  &$product_des3, 

	    											  &$product_content,

	    											  &$product_content2, 

	    											  &$product_content3, 

	    											  &$product_code, 

	    											  &$product_original, 

	    											  &$product_size, 

	    											  &$product_package, 

	    											  &$product_delivery, 

	    											  &$product_delivery_time, 

	    											  &$product_payment, 

	    											  &$product_payment_type, 

	    											  &$product_sub_info1, 

	    											  &$product_sub_info2, 

	    											  &$product_sub_info3, 

	    											  &$product_sub_info4, 

	    											  &$product_sub_info5,

	    											  &$title_seo, 

									   		 		  &$des_seo, 

									   		 		  &$friendly_url, 

									   		 		  &$keyword),

	    										'isssssssssssssssssssssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-san-pham&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}	    	

		}



		public function updateProduct(){

			$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';

			$product_idCat = isset($_POST['product_idCat']) ? $_POST['product_idCat'] : '';

			$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';

			$product_des = isset($_POST['product_des']) ? $_POST['product_des'] : '';

			$product_des2 = isset($_POST['product_des2']) ? $_POST['product_des2'] : '';

			$product_des3 = isset($_POST['product_des3']) ? $_POST['product_des3'] : '';

			$product_content = isset($_POST['product_content']) ? $_POST['product_content'] : '';

			$product_content2 = isset($_POST['product_content2']) ? $_POST['product_content2'] : '';

			$product_content3 = isset($_POST['product_content3']) ? $_POST['product_content3'] : '';

			$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';

			$product_price_sale = isset($_POST['product_price_sale']) ? $_POST['product_price_sale'] : '';

			$product_discount = isset($_POST['product_discount']) ? $_POST['product_discount'] : '';

			$productcat_id = isset($_POST['productcat_id']) ? $_POST['productcat_id'] : '';

			$product_hot = isset($_POST['product_hot']) ? $_POST['product_hot'] : '';

			$product_new = isset($_POST['product_new']) ? $_POST['product_new'] : '';

			$product_sale = isset($_POST['product_sale']) ? $_POST['product_sale'] : '';

			$product_code = isset($_POST['product_code']) ? $_POST['product_code'] : '';

			$product_original = isset($_POST['product_original']) ? $_POST['product_original'] : '';

			$product_size = isset($_POST['product_size']) ? $_POST['product_size'] : '';

			$product_package = isset($_POST['product_package']) ? $_POST['product_package'] : '';

			$product_delivery = isset($_POST['product_delivery']) ? $_POST['product_delivery'] : '';

			$product_delivery_time = isset($_POST['product_delivery_time']) ? $_POST['product_delivery_time'] : '';

			$product_payment = isset($_POST['product_payment']) ? $_POST['product_payment'] : '';

			$product_payment_type = isset($_POST['product_payment_type']) ? $_POST['product_payment_type'] : '';

			$product_material = isset($_POST['product_material']) ? $_POST['product_material'] : '';

			$product_shape = isset($_POST['product_shape']) ? $_POST['product_shape'] : '';

			$product_expiration = isset($_POST['product_expiration']) ? $_POST['product_expiration'] : '';

			$product_sub_info1 = isset($_POST['product_sub_info1']) ? $_POST['product_sub_info1'] : '';

			$product_sub_info2 = isset($_POST['product_sub_info2']) ? $_POST['product_sub_info2'] : '';

			$product_sub_info3 = isset($_POST['product_sub_info3']) ? $_POST['product_sub_info3'] : '';

			$product_sub_info4 = isset($_POST['product_sub_info4']) ? $_POST['product_sub_info4'] : '';

			$product_sub_info5 = isset($_POST['product_sub_info5']) ? $_POST['product_sub_info5'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '';

			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$subImage = isset($_POST['subImage']) ? $_POST['subImage'] : '';

			$product_favorite = isset($_POST['product_favorite']) ? $_POST['product_favorite'] : '';

			$product_brand = isset($_POST['product_brand']) ? $_POST['product_brand'] : 0;

			$product_sex = isset($_POST['product_sex']) ? $_POST['product_sex'] : 0;

			////////////////////
			$arr_product_size = array();
			foreach ($product_size as $item) {
				if ($item != '') {
					$arr_product_size[] = $item;
				}				
			}
			$product_size = json_encode($arr_product_size);
			$product_size_arr = implode(",", $arr_product_size);
			///////////////////
			/*************************************/
			$productCats_ar = isset($_POST['productCats']) ? $_POST['productCats'] : '';
			if ($productCats_ar) {
				$productCats_ar[count($productCats_ar)] = $_POST['productCats'][count($_POST['productCats'])-1];
			}
			// $product_cat = array();
			// /*-----------------------------------*/
			// if ($productCats_ar) {
			// 	foreach ($productCats_ar as $key => $val) {
			// 		$product_cat[] = json_encode(array('product_cat'=>$val));
			// 	}
			// }
			// $product_cat = json_encode($product_cat);

			// $tmp = 0;
			// foreach ($productCats_ar as $key => $val) {
   //              if($val == 136) $tmp = $val;
   //          }

			$product_cat = implode(",",$productCats_ar);
			/*************************************/


			$date = $this->get_Date('Y-m-d H:m:s');

			$src= "../images/";

			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    		$success = $this->createThumbnail($src.$img_name, $src.'/thumbs/'.$img_name, 270, 190,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$img_name = $_POST['product_img'];


	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'product', $product_id);



			$sub_img = array();

	    	if(isset($_FILES['fileUpload2']) && $_FILES['fileUpload2']['name'] != ""){



				foreach (array_combine($_FILES['fileUpload2']['name'], $_FILES['fileUpload2']['tmp_name']) as $name => $tmp_name) {

					if ($name != '' && $name != ' ') {

						$this->uploadPicture($src, $name, $tmp_name);

						$sub_img[] = json_encode(array('image'=>$name));

					}

				}

			}


			/*---------------------------------------*/
			if ($subImage) {

				foreach ($subImage as $key => $val) {

					$sub_img[] = json_encode(array('image'=>$val));

				}

			}

			// print_r($sub_img);

			$sub_img = json_encode($sub_img);

			// echo $sub_img;


			
			/*-------------------------------------*/



			$arrayColor = $this->getListIDColor($product_id);



			foreach ($_POST['name'] as $key => $value) {

			

				if ($value['color_id']) {

					$arraySize = $this->getListIDSize($value['color_id']);

					if ($_FILES['name']['name'][$key]['img'] != '') {

						$img_name1 = $_FILES['name']['name'][$key]['img'];

						$this->uploadPicture($src, $img_name1, $_FILES['name']['tmp_name'][$key]['img']);	

					}else{

						$img_name1 = $value['img_color'];

					}

					$this->updateColor($value['name'], '', $img_name1, $value['color_id']);

					$hh = array();

					foreach ($_POST['b'][$key]['size'] as $key1 => $value1) {

						

						$hh[] = json_encode(array('size'=>$value1, 'stock'=>$_POST['b'][$key]['stock'][$key1]));

						if ($_POST['b'][$key]['size_id'][$key1]) {

							if(($keySize = array_search($_POST['b'][$key]['size_id'][$key1], $arrayColor)) !== false) {

							    unset($arraySize[$keySize]);

							}

							$this->updateSize($value1, $_POST['b'][$key]['stock'][$key1], $_POST['b'][$key]['size_id'][$key1]);

						}else{

							$this->addSize($value1, $_POST['b'][$key]['stock'][$key1], $value['color_id'],$product_id);

						}

					}



					if(($keyColor = array_search($value['color_id'], $arrayColor)) !== false) {

					    unset($arrayColor[$keyColor]);

					}



					foreach (array_values($arraySize) as $key4 => $value4) {

						$this->deleteSize($value4['size_id']);

					}

					

				}else{

					$color_id = $this->addColor($value['name'], '', $_FILES['name']['name'][$key]['img'], $product_id);

					$hh = array();

					foreach ($_POST['b'][$key]['size'] as $key1 => $value1) {

						

						$hh[] = json_encode(array('size'=>$value1, 'stock'=>$_POST['b'][$key]['stock'][$key1]));

						if ($color_id != 0) {

							$this->addSize($value1, $_POST['b'][$key]['stock'][$key1], $color_id,$product_id);

						}

					}

				}

			}



			foreach (array_values($arrayColor) as $key => $value) {

				$this->deleteColor($value['color_id']);

			}



			$lang_showMain = "vn";

			$this->Update_1('product_languages', 

		    							 array('lang_product_name', 

		    							 	   'lang_product_des', 

		    							 	   'lang_product_des2', 

		    							 	   'lang_product_des3', 

		    							 	   'lang_product_content', 

		    							 	   'lang_product_content2', 

		    							 	   'lang_product_content3', 

		    							 	   'lang_product_code', 

		    							 	   'lang_product_original', 

		    							 	   'lang_product_size', 

		    							 	   'lang_product_package', 

		    							 	   'lang_product_delivery', 

		    							 	   'lang_product_delivery_time', 

		    							 	   'lang_product_payment', 

		    							 	   'lang_product_payment_type', 

		    							 	   'lang_product_sub_info1', 

		    							 	   'lang_product_sub_info2', 

		    							 	   'lang_product_sub_info3', 

		    							 	   'lang_product_sub_info4', 

		    							 	   'lang_product_sub_info5',

		    							 	   'title_seo', 

	    						  	   		   'des_seo', 

	    						  	           'keyword', 

	    						  	           'friendly_url'

		    							 	   ), 

		    							 array(&$product_name, 

		    							 	   &$product_des, 

		    							 	   &$product_des2, 

		    							 	   &$product_des3, 

		    							 	   &$product_content, 

		    							 	   &$product_content2, 

		    							 	   &$product_content3, 

		    							 	   &$product_code, 

		    							 	   &$product_original, 

		    							 	   &$product_size, 

		    							 	   &$product_package, 

		    							 	   &$product_delivery, 

		    							 	   &$product_delivery_time, 

		    							 	   &$product_payment, 

		    							 	   &$product_payment_type, 

		    							 	   &$product_sub_info1, 

		    							 	   &$product_sub_info2, 

		    							 	   &$product_sub_info3, 

		    							 	   &$product_sub_info4, 

		    							 	   &$product_sub_info5,

		    							 	   &$title_seo, 

	    						  	   		   &$des_seo, 

	    						  	   		   &$keyword, 

	    						  	   		   &$friendly_url,  

		    							 	   &$product_id, 

		    							 	   &$lang_showMain), 

		    							 array('product_id',

		    							 	   'languages_code'),

		    							 'ssssssssssssssssssssssssis');

			

			if (!$this->Update_1('product',

								  array('product_name', 

								  		'product_des', 

								  		'product_des2', 

								  		'product_des3', 

								  		'product_content', 

								  		'product_content2', 

								  		'product_content3', 

								  		'product_price', 

								  		'product_price_sale', 

								  		'product_discount', 

								  		'product_img', 

								  		'product_sub_img', 

								  		'product_update_date', 

								  		'productcat_id', 

								  		'productcat_ar',

								  		'product_hot', 

								  		'product_new', 

								  		'product_sale', 

								  		'product_code', 

								  		'product_original', 

								  		'product_size',

								  		'product_package', 

								  		'product_delivery', 

								  		'product_delivery_time', 

								  		'product_payment', 

								  		'product_payment_type', 

								  		'product_material' ,

										'product_shape' ,

										'product_expiration' ,

								  		'product_sub_info1', 

								  		'product_sub_info2', 

								  		'product_sub_info3', 

								  		'product_sub_info4', 

								  		'product_sub_info5', 

								  		'state', 

								  		'title_seo', 

								  		'des_seo', 

								  		'friendly_url', 

								  		'keyword',

								  		'product_favorite',

								  		'product_brand',

								  		'product_sex',

								  		'product_size_arr'), 

								  array(&$product_name, 

								  		&$product_des, 

								  		&$product_des2, 

								  		&$product_des3, 

								  		&$product_content, 

								  		&$product_content2, 

								  		&$product_content3,

								  		&$product_price, 

								  		&$product_price_sale, 

								  		&$product_discount, 

								  		&$img_name, 

								  		&$sub_img, 

								  		&$date, 

								  		&$productcat_id,

								  		&$product_cat, 

								  		&$product_hot, 

								  		&$product_new, 

								  		&$product_sale, 

								  		&$product_code, 

								  		&$product_original, 

								  		&$product_size, 

								  		&$product_package, 

								  		&$product_delivery, 

								  		&$product_delivery_time, 

								  		&$product_payment, 

								  		&$product_payment_type, 

								  		&$product_material, 

										&$product_shape,

										&$product_expiration,

								  		&$product_sub_info1, 

								  		&$product_sub_info2, 

								  		&$product_sub_info3, 

								  		&$product_sub_info4, 

								  		&$product_sub_info5, 

								  		&$state, 

								  		&$title_seo, 

								  		&$des_seo, 

								  		&$friendly_url, 

								  		&$keyword, 

								  		&$product_favorite,

								  		&$product_brand,

								  		&$product_sex,

								  		&$product_size_arr,

								  		&$product_id), 

								  array('product_id'), 

								  'sssssssdddsssisiiissssssssssssssssissssiiisi')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('product_languages',array('product_id','languages_code'),array(&$product_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('product_languages', 

		    	// 						 array('lang_product_name', 

		    	// 						 	   'lang_product_des', 

		    	// 						 	   'lang_product_des2', 

		    	// 						 	   'lang_product_des3', 

		    	// 						 	   'lang_product_content', 

		    	// 						 	   'lang_product_content2', 

		    	// 						 	   'lang_product_content3', 

		    	// 						 	   'lang_product_code', 

		    	// 						 	   'lang_product_original', 

		    	// 						 	   'lang_product_size', 

		    	// 						 	   'lang_product_package', 

		    	// 						 	   'lang_product_delivery', 

		    	// 						 	   'lang_product_delivery_time', 

		    	// 						 	   'lang_product_payment', 

		    	// 						 	   'lang_product_payment_type', 

		    	// 						 	   'lang_product_sub_info1', 

		    	// 						 	   'lang_product_sub_info2', 

		    	// 						 	   'lang_product_sub_info3', 

		    	// 						 	   'lang_product_sub_info4', 

		    	// 						 	   'lang_product_sub_info5'), 

		    	// 						 array(&$product_name, 

		    	// 						 	   &$product_des, 

		    	// 						 	   &$product_des2, 

		    	// 						 	   &$product_des3, 

		    	// 						 	   &$product_content, 

		    	// 						 	   &$product_content2, 

		    	// 						 	   &$product_content3, 

		    	// 						 	   &$product_code, 

		    	// 						 	   &$product_original, 

		    	// 						 	   &$product_size, 

		    	// 						 	   &$product_package, 

		    	// 						 	   &$product_delivery, 

		    	// 						 	   &$product_delivery_time, 

		    	// 						 	   &$product_payment, 

		    	// 						 	   &$product_payment_type, 

		    	// 						 	   &$product_sub_info1, 

		    	// 						 	   &$product_sub_info2, 

		    	// 						 	   &$product_sub_info3, 

		    	// 						 	   &$product_sub_info4, 

		    	// 						 	   &$product_sub_info5, 

		    	// 						 	   &$product_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('product_id',

		    	// 						 	   'languages_code'),

		    	// 						 'ssssssssssssssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));
	    		// echo json_encode(array('success'=>$product_cat));

	    	}

		}



		public function deleteProduct(){

			$product_id = isset($_POST['id']) ? $_POST['id'] : '';



			if($this->Delete_1('product','',array(&$product_id),array('product_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=san-pham'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}	

		}



		public function getListIDColor($product_id){

			global $conn_vn;

			$rows = array();

			$sql = "SELECT color_id from color where product_id = '".$product_id."'";

			$result = mysqli_query($conn_vn, $sql);

			while($row = mysqli_fetch_array($result)){

				$rows[] = $row['color_id'];

			}

			return $rows;

		}



		public function getListIDSize($color_id){

			$rows = array();

			$sql = "SELECT size_id from size where color_id = '".$color_id."'";

			$result = mysqli_query($conn_vn, $sql);

			while($row = mysqli_fetch_array($result)){

				$rows[] = $row['size_id'];

			}

			return $rows;

		}



		public function deleteColor($color_id){

			global $conn_vn;

			$sql = 'DELETE from color where color_id = ?';

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('i',$color_id);

			$stmt->execute();

		}



		public function deleteSize($size_id){

			global $conn_vn;

			$sql = 'DELETE from size where size_id = ?';

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('i',$size_id);

			$stmt->execute();

		}



		public function updateColor($color_name, $color_price, $color_img, $color_id){

			global $conn_vn;

			//echo $color_name.'-'.$color_price.'-'.$color_id;

			$sql = 'UPDATE color set color_name = ?, color_price = ?, color_img = ? where color_id = ?';

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('sdsi', $color_name, $color_price, $color_img, $color_id);

			$stmt->execute();

		}



		public function updateSize($size_name, $size_stock, $size_id){

			global $conn_vn;

			//echo $size_name.'-'.$size_stock.'-'.$size_id;

			$sql = 'UPDATE size set size_name = ?, size_stock = ? where size_id = ?';

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('sii', $size_name, $size_stock, $size_id);

			$stmt->execute();

		}



		public function addColor($color_name, $color_price, $color_img, $product_id){

			global $conn_vn;

			$id = 0;

			$sql = 'INSERT into color (color_name, color_price, color_img, product_id) values (?,?,?,?)';

			echo $sql;

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('sdsi', $color_name, $color_price, $color_img, $product_id);

			if($stmt->execute()){

				$id = $stmt->insert_id;

			}



			return $id;

		}



		public function addSize($size_name, $size_stock, $color_id, $product_id){

			global $conn_vn;

			$sql = 'INSERT into size (size_name, size_stock, color_id) values (?,?,?)';

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('sii',$size_name, $size_stock,$color_id);

			$stmt->execute();

		}



		public function addColor1($product_id, $color){

			global $conn_vn;

			$sql = 'INSERT into product_color (product_id, color) values (?,?)';

			$stmt = $conn_vn->prepare($sql);

			$stmt->bind_param('is',$product_id, $color);

			$stmt->execute();

		}



		public function addMoreColor(){

			$total = isset($_POST['total']) ? $_POST['total'] : '0';

			$total +=1;

			?>

				<div class="row colorProduct" id="colorProduct" data-total="<?= $total?>" style="position: relative;">

	                <div class="subColContent2">

	                    <p class="titleRightNCP">Tên màu</p>

	                    <input type="text" name="name[<?= $total?>][name]" value="" placeholder="" class="txtNCP1" required>

	                </div>

	                <div class="subColContent2">

	                	<p class="titleRightNCP">Ảnh màu</p>

	                    <input type="file" name="name[<?= $total?>][img]" value="" placeholder="" class="txtNCP1">

	                </div>



	                <div class="rowNCP size_section" id="size_section1" >

		                <a href="javascript:void(0)" id="addMoreSize" class="addMoreProductPart" onclick="addMoreSize(this)">Thêm kích cỡ</a>

		                <div class="row" id="colorProduct">

			                <div class="subColContent2">

			                    <p class="titleRightNCP">Kích cỡ</p>

			                    <input type="text" name="b[<?= $total?>][size][]" value="" placeholder="" class="txtNCP1" required>

			                </div>

			                <div class="subColContent2">

			                    <p class="titleRightNCP">Số lượng</p>

			                    <input type="text" name="b[<?= $total?>][stock][]" value="" placeholder="" class="txtNCP1" required>

			                </div>

			                <div class="subColContent2" style="position: relative;">

	                            <div style="position: absolute; top: 40px; left: 10px; cursor: pointer; background-color: #931313; padding: 9px 10px; color: #fff; border:1px solid #931313; border-radius: 5px;" onclick="deleteSize(this)">

	                                <i class="fa-lg fa fa-trash"></i>

	                            </div>

	                        </div>

			            </div>

		            </div>

	                <div class="" style="position: absolute; top: 40px; right: 10px; cursor: pointer; background-color: #931313; padding: 9px 10px; color: #fff; border:1px solid #931313; border-radius: 5px;" onclick="deleteColor(this)">

	                    <i class="fa-lg fa fa-trash"></i>

	                </div>

	            </div>

			<?php

		}



		public function addMoreSize(){

			$total = isset($_POST['total']) ? $_POST['total'] : '0';

			?>

				<div class="row" id="colorProduct">

	                <div class="subColContent2">

	                    <p class="titleRightNCP">Kích cỡ</p>

	                    <input type="text" name="b[<?= $total?>][size][]" value="" placeholder="" class="txtNCP1" required>

	                </div>

	                <div class="subColContent2">

	                    <p class="titleRightNCP">Số lượng</p>

	                    <input type="text" name="b[<?= $total?>][stock][]" value="" placeholder="" class="txtNCP1" required>

	                </div>

	                <div class="subColContent2" style="position: relative;">

	                    <div style="position: absolute; top: 40px; left: 10px; cursor: pointer; background-color: #931313; padding: 9px 10px; color: #fff; border:1px solid #931313; border-radius: 5px;" onclick="deleteSize(this)">

	                        <i class="fa-lg fa fa-trash"></i>

	                    </div>

	                </div>

	            </div>

			<?php

		}



		public function addMorePicture(){

			$total = isset($_POST['total']) ? $_POST['total'] : '0';

			$total +=1;

			?>

				<div class="row picture" id="picture" data-count="<?= $total?>">

					<div class="subColContent2">

						<p class="titleRightNCP">Chọn ảnh</p>

	                    <input type="file" name="img_adv[<?= $total?>][img]" value="" placeholder="" class="txtNCP1">

	                </div>

	                <div class="subColContent">

	                    <p class="titleRightNCP">Đường dẫn</p>

	                    <input type="text" class="txtNCP1" name="img_adv[<?= $total?>][url]" value="" placeholder="">

	                </div>

	                <span id="deleteColor" class="deleteColor btn btnDelete" onclick="deleteColor(this)">xóa</span>



				</div>

			<?php

		}



	/*----------------- Trang nội dung -------------------*/



		public function addPage(){

			

			$page_name = isset($_POST['page_name']) ? $_POST['page_name'] : '';

			$page_des = isset($_POST['page_des']) ? $_POST['page_des'] : '';

			$page_content = isset($_POST['page_content']) ? $_POST['page_content'] : '';

			

			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$page_sub_info1 = isset($_POST['page_sub_info1']) ? $_POST['page_sub_info1'] : '';

			$page_sub_info2 = isset($_POST['page_sub_info2']) ? $_POST['page_sub_info2'] : '';

			$page_sub_info3 = isset($_POST['page_sub_info3']) ? $_POST['page_sub_info3'] : '';

			$page_sub_info4 = isset($_POST['page_sub_info4']) ? $_POST['page_sub_info4'] : '';

			$page_sub_info5 = isset($_POST['page_sub_info5']) ? $_POST['page_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');

			if ($page_name == '') {
				echo json_encode(array('error'=>'Mời bạn nhập tên.'));die;
			}



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = '';

	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'page', '');

	    	$insert = $this->Insert_1('page', 

	    							   array('page_name', 

	    							   		 'page_des', 

	    							   		 'page_content', 

	    							   		 'page_img', 

	    							   		 'page_created_date', 

	    							   		 'keyword', 

	    							   		 'title_seo', 

	    							   		 'des_seo', 

	    							   		 'friendly_url',

	    							   		 'state', 

	    							   		 'page_sub_info1',

	    							   		 'page_sub_info2', 

	    							   		 'page_sub_info3', 

	    							   		 'page_sub_info4', 

	    							   		 'page_sub_info5', 

	    							   		 'created_id'), 

	    							   array(&$page_name, 

	    							   		 &$page_des, 

	    							   		 &$page_content, 

	    							   		 &$img_name, 

	    							   		 &$date, 

	    							   		 &$keyword, 

	    							   		 &$title_seo, 

	    							   		 &$des_seo, 

	    							   		 &$friendly_url, 

	    							   		 &$state, 

	    							   		 &$page_sub_info1, 

	    							   		 &$page_sub_info2, 

	    							   		 &$page_sub_info3, 

	    							   		 &$page_sub_info4, 

	    							   		 &$page_sub_info5, 

	    							   		 &$_SESSION['admin_id']),

	    							   'sssssssssisssssi');

	    	// $this->Insert_1('page', array('page_name', 'page_des', 'page_content', 'state'), array(&$page_name, &$page_des, &$page_content, &$state), 'sssi');

	    	if($insert != ''){

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$page_name = 'english version ' . $page_name;
	    				$page_des = 'english version ' . $page_des;
	    				$page_content = 'english version ' . $page_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('page_languages', 

	    										array('page_id', 

	    											  'languages_code', 

	    											  'lang_page_name', 

	    											  'lang_page_des', 

	    											  'lang_page_content', 

	    											  'lang_page_sub_info1', 

	    											  'lang_page_sub_info2', 

	    											  'lang_page_sub_info3',

	    											  'lang_page_sub_info4', 

	    											  'lang_page_sub_info5',

	    											  'keyword',

	    											  'title_seo',

	    											  'des_seo',

	    											  'friendly_url'), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$page_name, 

	    											  &$page_des, 

	    											  &$page_content, 

	    											  &$page_sub_info1, 

	    											  &$page_sub_info2, 

	    											  &$page_sub_info3, 

	    											  &$page_sub_info4, 

	    											  &$page_sub_info5,

	    											  &$keyword,

	    											  &$title_seo,

	    											  &$des_seo,

	    											  &$friendly_url

	    											  ),

	    										'isssssssssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-bai-viet&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

		}



		public function updatePage(){

			$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : '';

			$page_name = isset($_POST['page_name']) ? $_POST['page_name'] : '';

			$page_des = isset($_POST['page_des']) ? $_POST['page_des'] : '';

			$page_content = isset($_POST['page_content']) ? $_POST['page_content'] : '';

			

			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$page_sub_info1 = isset($_POST['page_sub_info1']) ? $_POST['page_sub_info1'] : '';

			$page_sub_info2 = isset($_POST['page_sub_info2']) ? $_POST['page_sub_info2'] : '';

			$page_sub_info3 = isset($_POST['page_sub_info3']) ? $_POST['page_sub_info3'] : '';

			$page_sub_info4 = isset($_POST['page_sub_info4']) ? $_POST['page_sub_info4'] : '';

			$page_sub_info5 = isset($_POST['page_sub_info5']) ? $_POST['page_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');

			if ($page_name == '') {
				echo json_encode(array('error'=>'Mời bạn nhập tên.'));die;
			}



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = $_POST['page_img'];

	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'page', $page_id);

	    	$lang_showMain = "vn";

	    	$this->Update_1('page_languages', 

		    							 array('lang_page_name', 

		    							 	   'lang_page_des', 

		    							 	   'lang_page_content', 

		    							 	   'lang_page_sub_info1', 

		    							 	   'lang_page_sub_info2', 

		    							 	   'lang_page_sub_info3', 

		    							 	   'lang_page_sub_info4', 

		    							 	   'lang_page_sub_info5',

		    							 	   'keyword', 

		    							   	   'title_seo', 

	    							   		   'des_seo', 

	    							   		   'friendly_url'), 

		    							 array(&$page_name, 

		    							 	   &$page_des, 

		    							 	   &$page_content, 

		    							 	   &$page_sub_info1, 

		    							 	   &$page_sub_info2, 

		    							 	   &$page_sub_info3, 

		    							 	   &$page_sub_info4, 

		    							 	   &$page_sub_info5,

		    							 	   &$keyword, 

		    							   	   &$title_seo, 

	    							   		   &$des_seo, 

	    							   		   &$friendly_url,  

		    							 	   &$page_id, 

		    							 	   &$lang_showMain), 

		    							 array('page_id','languages_code'),

		    							 'ssssssssssssis');



	    	if ((!$this->Update_1('page',

	    						  array('page_name', 

	    						  		'page_des', 

	    						  		'page_content', 

	    						  		'page_img', 

	    						  		'page_update_date', 

	    						  		'keyword', 

	    						  		'title_seo', 

	    						  		'des_seo', 

	    						  		'friendly_url',

	    						  		'state', 

	    						  		'page_sub_info1', 

	    						  		'page_sub_info2', 

	    						  		'page_sub_info3', 

	    						  		'page_sub_info4', 

	    						  		'page_sub_info5'), 

	    						  array(&$page_name, 

	    						  		&$page_des, 

	    						  		&$page_content, 

	    						  		&$img_name, 

	    						  		&$date, 

	    						  		&$keyword, 

	    						  		&$title_seo, 

	    						  		&$des_seo, 

	    						  		&$friendly_url, 

	    						  		&$state, 

	    						  		&$page_sub_info1, 

	    						  		&$page_sub_info2, 

	    						  		&$page_sub_info3, 

	    						  		&$page_sub_info4, 

	    						  		&$page_sub_info5, 

	    						  		&$page_id), 

	    						  array('page_id'), 

	    						  'sssssssssisssssi'))

	    		

	    		) {

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

	    	else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('page_languages',array('page_id','languages_code'),array(&$page_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('page_languages', 

		    	// 						 array('lang_page_name', 

		    	// 						 	   'lang_page_des', 

		    	// 						 	   'lang_page_content', 

		    	// 						 	   'lang_page_sub_info1', 

		    	// 						 	   'lang_page_sub_info2', 

		    	// 						 	   'lang_page_sub_info3', 

		    	// 						 	   'lang_page_sub_info4', 

		    	// 						 	   'lang_page_sub_info5'), 

		    	// 						 array(&$page_name, 

		    	// 						 	   &$page_des, 

		    	// 						 	   &$page_content, 

		    	// 						 	   &$page_sub_info1, 

		    	// 						 	   &$page_sub_info2, 

		    	// 						 	   &$page_sub_info3, 

		    	// 						 	   &$page_sub_info4, 

		    	// 						 	   &$page_sub_info5, 

		    	// 						 	   &$page_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('page_id','languages_code'),

		    	// 						 'ssssssssii');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

		}



		public function deletePage(){

			$page_id = isset($_POST['id']) ? $_POST['id'] : '';



			if($this->Delete_1('page','',array(&$page_id),array('page_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=bai-viet'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}		

		}



	/*---------------- Danh mục tin tức --------------------*/



		public function addNewsCat(){

			

			$newscat_name = isset($_POST['newscat_name']) ? $_POST['newscat_name'] : '';

			$newscat_des = isset($_POST['newscat_des']) ? $_POST['newscat_des'] : '';

			$newscat_content = isset($_POST['newscat_content']) ? $_POST['newscat_content'] : '';

			$newscat_parent = isset($_POST['newscat_parent']) ? $_POST['newscat_parent'] : '';

			$newscat_sort_order = isset($_POST['newscat_sort_order']) ? $_POST['newscat_sort_order'] : '';



			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$newscat_sub_info1 = isset($_POST['newscat_sub_info1']) ? $_POST['newscat_sub_info1'] : '';

			$newscat_sub_info2 = isset($_POST['newscat_sub_info2']) ? $_POST['newscat_sub_info2'] : '';

			$newscat_sub_info3 = isset($_POST['newscat_sub_info3']) ? $_POST['newscat_sub_info3'] : '';

			$newscat_sub_info4 = isset($_POST['newscat_sub_info4']) ? $_POST['newscat_sub_info4'] : '';

			$newscat_sub_info5 = isset($_POST['newscat_sub_info5']) ? $_POST['newscat_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');

			if ($newscat_name == '') {
				echo json_encode(array('error'=>'Mời bạn nhập tên.'));die;
			}


			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = '';

	    	}

	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'newscat', '');

	    	$insert = $this->Insert_1('newscat', 

	    							   array('newscat_name', 

	    							   		 'newscat_des', 

	    							   		 'newscat_content', 

	    							   		 'newscat_parent', 

	    							   		 'newscat_sort_order', 

	    							   		 'newscat_img', 

	    							   		 'newscat_created_date', 

	    							   		 'keyword', 

	    							   		 'title_seo', 

	    							   		 'des_seo', 

	    							   		 'friendly_url',

	    							   		 'state', 

	    							   		 'newscat_sub_info1', 

	    							   		 'newscat_sub_info2', 

	    							   		 'newscat_sub_info3', 

	    							   		 'newscat_sub_info4', 

	    							   		 'newscat_sub_info5', 

	    							   		 'created_id'), 

	    							   array(&$newscat_name, 

	    							   		 &$newscat_des, 

	    							   		 &$newscat_content, 

	    							   		 &$newscat_parent, 

	    							   		 &$newscat_sort_order, 

	    							   		 &$img_name, 

	    							   		 &$date, 

	    							   		 &$keyword, 

	    							   		 &$title_seo, 

	    							   		 &$des_seo, 

	    							   		 &$friendly_url, 

	    							   		 &$state, 

	    							   		 &$newscat_sub_info1, 

	    							   		 &$newscat_sub_info2, 

	    							   		 &$newscat_sub_info3, 

	    							   		 &$newscat_sub_info4, 

	    							   		 &$newscat_sub_info5, 

	    							   		 &$_SESSION['admin_id']), 

	    							   'sssiissssssisssssi');

	    	

	    	if($insert != ''){

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$newscat_name = 'english version ' . $newscat_name;
	    				$newscat_des = 'english version ' . $newscat_des;
	    				$newscat_content = 'english version ' . $newscat_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('newscat_languages', 

	    										array('newscat_id', 

	    											  'languages_code', 

	    											  'lang_newscat_name', 

	    											  'lang_newscat_des', 

	    											  'lang_newscat_content', 

	    											  'lang_newscat_sub_info1', 

	    											  'lang_newscat_sub_info2', 

	    											  'lang_newscat_sub_info3', 

	    											  'lang_newscat_sub_info4', 

	    											  'lang_newscat_sub_info5',

	    											  'keyword', 

	    							   		 		  'title_seo', 

	    							   		          'des_seo', 

	    							   		          'friendly_url'), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$newscat_name, 

	    											  &$newscat_des, 

	    											  &$newscat_content, 

	    											  &$newscat_sub_info1, 

	    											  &$newscat_sub_info2,

	    											  &$newscat_sub_info3, 

	    											  &$newscat_sub_info4, 

	    											  &$newscat_sub_info5,

	    											  &$keyword, 

	    							   		 		  &$title_seo, 

	    							   		 		  &$des_seo, 

	    							   		 		  &$friendly_url),

	    										'isssssssssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-danh-muc-tin-tuc&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

		}



		public function updateNewsCat(){

			$newscat_id = isset($_POST['newscat_id']) ? $_POST['newscat_id'] : '';

			$newscat_name = isset($_POST['newscat_name']) ? $_POST['newscat_name'] : '';

			$newscat_des = isset($_POST['newscat_des']) ? $_POST['newscat_des'] : '';

			$newscat_content = isset($_POST['newscat_content']) ? $_POST['newscat_content'] : '';

			$newscat_parent = isset($_POST['newscat_parent']) ? $_POST['newscat_parent'] : '';

			$newscat_sort_order = isset($_POST['newscat_sort_order']) ? $_POST['newscat_sort_order'] : '';



			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$newscat_sub_info1 = isset($_POST['newscat_sub_info1']) ? $_POST['newscat_sub_info1'] : '';

			$newscat_sub_info2 = isset($_POST['newscat_sub_info2']) ? $_POST['newscat_sub_info2'] : '';

			$newscat_sub_info3 = isset($_POST['newscat_sub_info3']) ? $_POST['newscat_sub_info3'] : '';

			$newscat_sub_info4 = isset($_POST['newscat_sub_info4']) ? $_POST['newscat_sub_info4'] : '';

			$newscat_sub_info5 = isset($_POST['newscat_sub_info5']) ? $_POST['newscat_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');

			if ($newscat_name == '') {
				echo json_encode(array('error'=>'Mời bạn nhập tên.'));die;
			}



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = $_POST['newscat_img'];

	    	}



	    	$array_child = array();

	    	$array_child = $this->getListChild('newscat','newscat_parent', $newscat_id, 'newscat_id', 'newscat_id', 'desc');

	    	if (in_array($newscat_parent, $array_child) || $newscat_parent == $newscat_id) {

	    		echo json_encode(array('error'=>'Lỗi, mời chọn lại danh mục cha'));

	    		exit();

	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'newscat', $newscat_id);

	    	$lang_showMain = "vn";



	    	$this->Update_1('newscat_languages', 

		    							 array('lang_newscat_name', 

		    							 	   'lang_newscat_des', 

		    							 	   'lang_newscat_content', 

		    							 	   'lang_newscat_sub_info1', 

		    							 	   'lang_newscat_sub_info2', 

		    							 	   'lang_newscat_sub_info3', 

		    							 	   'lang_newscat_sub_info4', 

		    							 	   'lang_newscat_sub_info5',

		    							 	   'keyword', 

	    							   		   'title_seo', 

	    							   		   'des_seo', 

	    							   		   'friendly_url'), 

		    							 array(&$newscat_name, 

		    							 	   &$newscat_des, 

		    							 	   &$lang_newscat_content, 

		    							 	   &$newscat_sub_info1, 

		    							 	   &$newscat_sub_info2, 

		    							 	   &$newscat_sub_info3,

		    							 	   &$newscat_sub_info4, 

		    							 	   &$newscat_sub_info5,

		    							 	   &$keyword, 

	    							   		   &$title_seo, 

	    							   		   &$des_seo, 

	    							   		   &$friendly_url, 

		    							 	   &$newscat_id, 

		    							 	   &$lang_showMain), 

		    							 array('newscat_id','languages_code'),

		    							 'ssssssssssssis');

	    	

	    	if (!$this->Update_1('newscat', 

	    						  array('newscat_name', 

	    						  		'newscat_des', 

	    						  		'newscat_content', 

	    						  		'newscat_parent', 

	    						  		'newscat_sort_order', 

	    						  		'newscat_img', 

	    						  		'newscat_created_date', 

	    						  		'keyword', 

	    						  		'title_seo', 

	    						  		'des_seo', 

	    						  		'friendly_url', 

	    						  		'state', 

	    						  		'newscat_sub_info1', 

	    						  		'newscat_sub_info2', 

	    						  		'newscat_sub_info3', 

	    						  		'newscat_sub_info4', 

	    						  		'newscat_sub_info5'), 

	    						  array(&$newscat_name, 

	    						  		&$newscat_des, 

	    						  		&$newscat_content, 

	    						  		&$newscat_parent, 

	    						  		&$newscat_sort_order, 

	    						  		&$img_name, 

	    						  		&$date, 

	    						  		&$keyword, 

	    						  		&$title_seo, 

	    						  		&$des_seo, 

	    						  		&$friendly_url, 

	    						  		&$state, 

	    						  		&$newscat_sub_info1, 

	    						  		&$newscat_sub_info2, 

	    						  		&$newscat_sub_info3, 

	    						  		&$newscat_sub_info4, 

	    						  		&$newscat_sub_info5, 

	    						  		&$newscat_id), 

	    						  array('newscat_id'), 

	    						  'sssiissssssisssssi')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

	    	else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('newscat_languages',array('newscat_id','languages_code'),array(&$newscat_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('newscat_languages', 

		    	// 						 array('lang_newscat_name', 

		    	// 						 	   'lang_newscat_des', 

		    	// 						 	   'lang_newscat_content', 

		    	// 						 	   'lang_newscat_sub_info1', 

		    	// 						 	   'lang_newscat_sub_info2', 

		    	// 						 	   'lang_newscat_sub_info3', 

		    	// 						 	   'lang_newscat_sub_info4', 

		    	// 						 	   'lang_newscat_sub_info5'), 

		    	// 						 array(&$newscat_name, 

		    	// 						 	   &$newscat_des, 

		    	// 						 	   &$lang_newscat_content, 

		    	// 						 	   &$newscat_sub_info1, 

		    	// 						 	   &$newscat_sub_info2, 

		    	// 						 	   &$newscat_sub_info3,

		    	// 						 	   &$newscat_sub_info4, 

		    	// 						 	   &$newscat_sub_info5, 

		    	// 						 	   &$newscat_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('newscat_id','languages_code'),

		    	// 						 'ssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

		}



		public function deleteNewsCat(){

			$newscat_id = isset($_POST['id']) ? $_POST['id'] : '';



			$array_child = $this->getList('newscat','newscat_parent', $newscat_id, 'newscat_id', 'desc','','','');

			if ($array_child) {

				$current_parent = $this->getDetail_New('newscat',array('newscat_id'),array(&$newscat_id),'i');

				$current_parent = $current_parent['newscat_parent'];

				foreach ($array_child as $key => $val) {

					$this->Update_1('newscat',array('newscat_parent'),array(&$current_parent, &$val['newscat_id']),array('newscat_id'),'ii');

				}

			}



			if($this->Delete_1('newscat','',array(&$newscat_id),array('newscat_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=danh-muc-tin-tuc'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}		

		}



	/*------------------ Tin tức -------------------*/



		public function addNews(){

			$detail = $this->getLoginInfor();

			$news_name = isset($_POST['news_name']) ? $_POST['news_name'] : '';

	    	$news_des = isset($_POST['news_des']) ? $_POST['news_des'] : '';

	    	$news_content = isset($_POST['news_content']) ? $_POST['news_content'] : '';

	    	$news_author = isset($_POST['news_author']) ? $_POST['news_author'] : '';

	    	$news_views = isset($_POST['news_views']) ? $_POST['news_views'] : '';

	    	$newscat_id = isset($_POST['newscat_id']) ? $_POST['newscat_id'] : '';

	    	$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$news_sub_info1 = isset($_POST['news_sub_info1']) ? $_POST['news_sub_info1'] : '';

			$news_sub_info2 = isset($_POST['news_sub_info2']) ? $_POST['news_sub_info2'] : '';

			$news_sub_info3 = isset($_POST['news_sub_info3']) ? $_POST['news_sub_info3'] : '';

			$news_sub_info4 = isset($_POST['news_sub_info4']) ? $_POST['news_sub_info4'] : '';

			$news_sub_info5 = isset($_POST['news_sub_info5']) ? $_POST['news_sub_info5'] : '';

			if ($news_name == '') {
				echo json_encode(array('error'=>'Mời bạn nhập tên.'));die;
			}



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

		    	$success = $this->createThumbnail($src.$img_name, $src.'/thumbs/'.$img_name, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$img_name = '';

	    	}





	    	$date = $this->get_Date('Y-m-d H:m:s');



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'news', '');



	    	$insert = $this->Insert_1('news', 

	    							   array('news_name', 

	    							   		 'news_des', 

	    							   		 'news_content', 

	    							   		 'news_img', 

	    							   		 'news_author', 

	    							   		 'news_created_date', 

	    							   		 'news_views', 

	    							   		 'newscat_id', 

	    							   		 'title_seo', 

	    							   		 'des_seo', 

	    							   		 'keyword', 

	    							   		 'friendly_url', 

	    							   		 'state', 

	    							   		 'news_sub_info1', 

	    							   		 'news_sub_info2', 

	    							   		 'news_sub_info3', 

	    							   		 'news_sub_info4', 

	    							   		 'news_sub_info5', 

	    							   		 'created_id'), 

	    							   array(&$news_name, 

	    							   		 &$news_des, 

	    							   		 &$news_content, 

	    							   		 &$img_name, 

	    							   		 &$news_author, 

	    							   		 &$date, 

	    							   		 &$news_views, 

	    							   		 &$newscat_id, 

	    							   		 &$title_seo, 

	    							   		 &$des_seo, 

	    							   		 &$keyword, 

	    							   		 &$friendly_url, 

	    							   		 &$state, 

	    							   		 &$news_sub_info1, 

	    							   		 &$news_sub_info2, 

	    							   		 &$news_sub_info3, 

	    							   		 &$news_sub_info4, 

	    							   		 &$news_sub_info5, 

	    							   		 &$_SESSION['admin_id']), 

	    							   'ssssssiissssisssssi');



	    	if($insert != ''){

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$news_name = 'english version ' . $news_name;
	    				$news_des = 'english version ' . $news_des;
	    				$news_content = 'english version ' . $news_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('news_languages', 

	    										array('news_id', 

	    											  'languages_code', 

	    											  'lang_news_name', 

	    											  'lang_news_des', 

	    											  'lang_news_content', 

	    											  'lang_news_sub_info1', 

	    											  'lang_news_sub_info2', 

	    											  'lang_news_sub_info3', 

	    											  'lang_news_sub_info4', 

	    											  'lang_news_sub_info5',

	    											  'title_seo', 

	    							   		 		  'des_seo', 

	    							   		 		  'keyword', 

	    							   		 		  'friendly_url'), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$news_name, 

	    											  &$news_des, 

	    											  &$news_content, 

	    											  &$news_sub_info1, 

	    											  &$news_sub_info2, 

	    											  &$news_sub_info3, 

	    											  &$news_sub_info4, 

	    											  &$news_sub_info5,

	    											  &$title_seo, 

	    							   		 		  &$des_seo, 

	    							   		 		  &$keyword, 

	    							   		          &$friendly_url),

	    										'isssssssssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-tin-tuc&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

		}



		public function updateNews(){

			$detail = $this->getLoginInfor();

			$news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';

			$news_name = isset($_POST['news_name']) ? $_POST['news_name'] : '';

	    	$news_des = isset($_POST['news_des']) ? $_POST['news_des'] : '';

	    	$news_content = isset($_POST['news_content']) ? $_POST['news_content'] : '';

	    	$news_author = isset($_POST['news_author']) ? $_POST['news_author'] : '';

	    	$news_views = isset($_POST['news_views']) ? $_POST['news_views'] : '';

	    	$newscat_id = isset($_POST['newscat_id']) ? $_POST['newscat_id'] : '';

	    	$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$news_sub_info1 = isset($_POST['news_sub_info1']) ? $_POST['news_sub_info1'] : '';

			$news_sub_info2 = isset($_POST['news_sub_info2']) ? $_POST['news_sub_info2'] : '';

			$news_sub_info3 = isset($_POST['news_sub_info3']) ? $_POST['news_sub_info3'] : '';

			$news_sub_info4 = isset($_POST['news_sub_info4']) ? $_POST['news_sub_info4'] : '';

			$news_sub_info5 = isset($_POST['news_sub_info5']) ? $_POST['news_sub_info5'] : '';

			if ($news_name == '') {
				echo json_encode(array('error'=>'Mời bạn nhập tên.'));die;
			}



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

		    	$success = $this->createThumbnail($src.$img_name, $src.'/thumbs/'.$img_name, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$img_name = $_POST['news_img'];

	    	}

	    	$date = $this->get_Date('Y-m-d H:m:s');



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'news', $news_id);




	    	$lang_showMain = "vn";

			$this->Update_1('news_languages', 

    							 array('lang_news_name', 

    							 	   'lang_news_des', 

    							 	   'lang_news_content', 

    							 	   'lang_news_sub_info1', 

    							 	   'lang_news_sub_info2', 

    							 	   'lang_news_sub_info3', 

    							 	   'lang_news_sub_info4', 

    							 	   'lang_news_sub_info5',

    							 	   'title_seo', 

	    						  	   'des_seo', 

	    						  	   'keyword', 

	    						  	   'friendly_url'), 

    							 array(&$news_name, 

    							 	   &$news_des, 

    							 	   &$news_content, 

    							 	   &$news_sub_info1, 

    							 	   &$news_sub_info2, 

    							 	   &$news_sub_info3, 

    							 	   &$news_sub_info4, 

    							 	   &$news_sub_info5,

    							 	   &$title_seo, 

	    						  	   &$des_seo, 

	    						  	   &$keyword, 

	    						  	   &$friendly_url, 

    							 	   &$news_id, 

    							 	   &$lang_showMain), 

    							 array('news_id','languages_code'),

    							 'ssssssssssssis');



	    	if (!$this->Update_1('news', 

	    						  array('news_name', 

	    						  		'news_des', 

	    						  		'news_content', 

	    						  		'news_img', 

	    						  		'news_author', 

	    						  		'news_update_date', 

	    						  		'news_views', 

	    						  		'newscat_id', 

	    						  		'title_seo', 

	    						  		'des_seo', 

	    						  		'keyword', 

	    						  		'friendly_url', 

	    						  		'state', 

	    						  		'news_sub_info1', 

	    						  		'news_sub_info2', 

	    						  		'news_sub_info3', 

	    						  		'news_sub_info4', 

	    						  		'news_sub_info5'), 

	    						  array(&$news_name, 

	    						  		&$news_des, 

	    						  		&$news_content, 

	    						  		&$img_name, 

	    						  		&$news_author, 

	    						  		&$date, 

	    						  		&$news_views,

	    						  		&$newscat_id,

	    						  		&$title_seo, 

	    						  		&$des_seo, 

	    						  		&$keyword, 

	    						  		&$friendly_url, 

	    						  		&$state, 

	    						  		&$news_sub_info1, 

	    						  		&$news_sub_info2, 

	    						  		&$news_sub_info3, 

	    						  		&$news_sub_info4, 

	    						  		&$news_sub_info5, 

	    						  		&$news_id), 

	    						  array('news_id'), 

	    						  'ssssssiissssisssssi')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('news_languages',array('news_id','languages_code'),array(&$news_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('news_languages', 

		    	// 						 array('lang_news_name', 

		    	// 						 	   'lang_news_des', 

		    	// 						 	   'lang_news_content', 

		    	// 						 	   'lang_news_sub_info1', 

		    	// 						 	   'lang_news_sub_info2', 

		    	// 						 	   'lang_news_sub_info3', 

		    	// 						 	   'lang_news_sub_info4', 

		    	// 						 	   'lang_news_sub_info5'), 

		    	// 						 array(&$news_name, 

		    	// 						 	   &$news_des, 

		    	// 						 	   &$news_content, 

		    	// 						 	   &$news_sub_info1, 

		    	// 						 	   &$news_sub_info2, 

		    	// 						 	   &$news_sub_info3, 

		    	// 						 	   &$news_sub_info4, 

		    	// 						 	   &$news_sub_info5, 

		    	// 						 	   &$news_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('news_id','languages_code'),

		    	// 						 'ssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

	    }



	    public function deleteNews(){

			$news_id = isset($_POST['id']) ? $_POST['id'] : '';



			if($this->Delete_1('news','',array(&$news_id),array('news_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=tin-tuc'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}	

		}



	/*------------------ Ngôn ngữ ---------------------*/



		public function updateLangConfig(){

    		$config_id = 1;

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

    		$edit_state = 1;

    		$flag =true;

    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('config_languages',

    								 array('lang_web_name', 

    								 	   'lang_web_meta', 

    								 	   'lang_web_des',

    								 	   'lang_web_keyword',

    								 	   'lang_web_hotline',

    								 	   'lang_web_phone',

    								 	   'lang_web_email',

    								 	   'lang_content_home1',

    								 	   'lang_content_home2',

    								 	   'lang_content_home3',

    								 	   'lang_content_home4',

    								 	   'lang_content_home5',

    								 	   'lang_content_home6',

    								 	   'lang_content_home7',

    								 	   'lang_content_home8',

    								 	   'lang_content_home9',

    								 	   'lang_content_home10',

    								 	   'edit_state'),

    								 array(&$value['lang_web_name'], 

    								 	   &$value['lang_web_meta'], 

    								 	   &$value['lang_web_des'],

    								 	   &$value['lang_web_keyword'],

    								 	   &$value['lang_web_hotline'],

    								 	   &$value['lang_web_phone'],

    								 	   &$value['lang_web_email'],

    								 	   &$value['lang_content_home1'],

    								 	   &$value['lang_content_home2'],

    								 	   &$value['lang_content_home3'],

    								 	   &$value['lang_content_home4'],

    								 	   &$value['lang_content_home5'],

    								 	   &$value['lang_content_home6'],

    								 	   &$value['lang_content_home7'],

    								 	   &$value['lang_content_home8'],

    								 	   &$value['lang_content_home9'],

    								 	   &$value['lang_content_home10'],

    								 	   &$edit_state,&$config_id,&$key),

    								 array('config_id','languages_code'),

    								 'sssssssssssssssssiis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



    	public function updateLangMenu(){

    		$menu_id = isset($_POST['menu_id']) ? $_POST['menu_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

    		$edit_state = 1;

    		$flag =true;

    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('menu_languages',

    								 array('lang_menu_name',     								 	   

    								 	   'edit_state'),

    								 array(&$value['lang_menu_name'],     								 	  

    								 	   &$edit_state,

    								 	   &$menu_id,

    								 	   &$key),

    								 array('menu_id',

    								 	   'languages_code'),

    								 'siis')){

    				$flag = false;

    			}

    		}


    		

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



    	public function updateLangPage(){

    		$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

    		$edit_state = 1;

    		$flag =true;

    		// print_r($lang);

    		// echo $page_id;

    		$th = "ádfsdfsdf";

    		foreach ($lang as $key => $value) {



    			if(!$this->Update_1('page_languages',

    								 array('lang_page_name', 

    								 	   'lang_page_des', 

    								 	   'lang_page_content',

    								 	   'lang_page_sub_info1',

    								 	   'lang_page_sub_info2',

    								 	   'lang_page_sub_info3',

    								 	   'lang_page_sub_info4',

    								 	   'lang_page_sub_info5',

    								 	   'edit_state',

    								 	   'keyword', 

	    							   	   'title_seo', 

    							   		   'des_seo', 

    							   		   'friendly_url'),

    								 array(&$value['lang_page_name'], 

    								 	   &$value['lang_page_des'], 

    								 	   &$value['lang_page_content'],

    								 	   &$value['lang_page_sub_info1'],

    								 	   &$value['lang_page_sub_info2'],

    								 	   &$value['lang_page_sub_info3'],

    								 	   &$value['lang_page_sub_info4'],

    								 	   &$value['lang_page_sub_info5'],

    								 	   &$edit_state,

    								 	   &$value['keyword'],

    								 	   &$value['title_seo'],

    								 	   &$value['des_seo'],

    								 	   &$value['friendly_url'],

    								 	   &$page_id,

    								 	   &$key),

    								 array('page_id','languages_code'),

    								 'ssssssssissssis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



    	public function updateLangNewsCat(){

    		$newscat_id = isset($_POST['newscat_id']) ? $_POST['newscat_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

	    		$edit_state = 1;

    		$flag =true;

    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('newscat_languages',

    								 array('lang_newscat_name', 

    								 	   'lang_newscat_des', 

    								 	   'lang_newscat_content',

    								 	   'lang_newscat_sub_info1',

    								 	   'lang_newscat_sub_info2',

    								 	   'lang_newscat_sub_info3',

    								 	   'lang_newscat_sub_info4',

    								 	   'lang_newscat_sub_info5',

    								 	   'edit_state'),

    								 array(&$value['lang_newscat_name'], 

    								 	   &$value['lang_newscat_des'], 

    								 	   &$value['lang_newscat_content'],

    								 	   &$value['lang_newscat_sub_info1'],

    								 	   &$value['lang_newscat_sub_info2'],

    								 	   &$value['lang_newscat_sub_info3'],

    								 	   &$value['lang_newscat_sub_info4'],

    								 	   &$value['lang_newscat_sub_info5'],

    								 	   &$edit_state,

    								 	   &$newscat_id,

    								 	   &$key),

    								 array('newscat_id','languages_code'),

    								 'ssssssssiis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



    	public function updateLangNews(){

    		$news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

    		$edit_state = 1;

    		$flag =true;

    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('news_languages',

    								 array('lang_news_name', 

    								 	'lang_news_des', 

    								 	'lang_news_content',

    								 	'lang_news_sub_info1',

    								 	'lang_news_sub_info2',

    								 	'lang_news_sub_info3',

    								 	'lang_news_sub_info4',

    								 	'lang_news_sub_info5',

    								 	'edit_state',

    								 	'title_seo',

    								 	'des_seo',

    								 	'keyword'),

    								 array(&$value['lang_news_name'], 

    								 	   &$value['lang_news_des'], 

    								 	   &$value['lang_news_content'],

    								 	   &$value['lang_news_sub_info1'],

    								 	   &$value['lang_news_sub_info2'],

    								 	   &$value['lang_news_sub_info3'],

    								 	   &$value['lang_news_sub_info4'],

    								 	   &$value['lang_news_sub_info5'],

    								 	   &$edit_state,

    								 	   &$value['title_seo'],

    								 	   &$value['des_seo'],

    								 	   &$value['keyword'],

    								 	   &$news_id,

    								 	   &$key),

    								 array('news_id','languages_code'),

    								 'ssssssssisssis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}

    	public function updateLangServiceCat(){

    		$servicecat_id = isset($_POST['servicecat_id']) ? $_POST['servicecat_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

	    		$edit_state = 1;

    		$flag =true;

    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('servicecat_languages',

    								 array('lang_servicecat_name', 

    								 	   'lang_servicecat_des', 

    								 	   'lang_servicecat_content',

    								 	   'lang_servicecat_sub_info1',

    								 	   'lang_servicecat_sub_info2',

    								 	   'lang_servicecat_sub_info3',

    								 	   'lang_servicecat_sub_info4',

    								 	   'lang_servicecat_sub_info5',

    								 	   'edit_state'),

    								 array(&$value['lang_servicecat_name'], 

    								 	   &$value['lang_servicecat_des'], 

    								 	   &$value['lang_servicecat_content'],

    								 	   &$value['lang_servicecat_sub_info1'],

    								 	   &$value['lang_servicecat_sub_info2'],

    								 	   &$value['lang_servicecat_sub_info3'],

    								 	   &$value['lang_servicecat_sub_info4'],

    								 	   &$value['lang_servicecat_sub_info5'],

    								 	   &$edit_state,

    								 	   &$servicecat_id,

    								 	   &$key),

    								 array('servicecat_id','languages_code'),

    								 'ssssssssiis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



    	public function updateLangService(){

    		$service_id = isset($_POST['service_id']) ? $_POST['service_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

    		$edit_state = 1;

    		$flag =true;
// echo json_encode(array('error'=>'Lỗi, mời thử lại check'));die;
    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('service_languages',

    								 array('lang_service_name', 

    								 	'lang_service_des', 

    								 	'lang_service_content',

    								 	'lang_service_sub_info1',

    								 	'lang_service_sub_info2',

    								 	'lang_service_sub_info3',

    								 	'lang_service_sub_info4',

    								 	'lang_service_sub_info5',

    								 	'edit_state'),

    								 array(&$value['lang_service_name'], 

    								 	   &$value['lang_service_des'], 

    								 	   &$value['lang_service_content'],

    								 	   &$value['lang_service_sub_info1'],

    								 	   &$value['lang_service_sub_info2'],

    								 	   &$value['lang_service_sub_info3'],

    								 	   &$value['lang_service_sub_info4'],

    								 	   &$value['lang_service_sub_info5'],

    								 	   &$edit_state,

    								 	   &$service_id,

    								 	   &$key),

    								 array('service_id','languages_code'),

    								 'ssssssssiis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}


    	public function updateLangProductCat(){

    		$productcat_id = isset($_POST['productcat_id']) ? $_POST['productcat_id'] : '';

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

	    	$edit_state = 1;

    		$flag =true;

    		foreach ($lang as $key => $value) {

    			if(!$this->Update_1('productcat_languages',

    								 array('lang_productcat_name', 

    								 	   'lang_productcat_des', 

    								 	   'lang_productcat_content',

    								 	   'lang_productcat_sub_info1',

    								 	   'lang_productcat_sub_info2',

    								 	   'lang_productcat_sub_info3',

    								 	   'lang_productcat_sub_info4',

    								 	   'lang_productcat_sub_info5',

    								 	   'edit_state'),

    								 array(&$value['lang_productcat_name'], 

    								 	   &$value['lang_productcat_des'], 

    								 	   &$value['lang_productcat_content'],

    								 	   &$value['lang_productcat_sub_info1'],

    								 	   &$value['lang_productcat_sub_info2'],

    								 	   &$value['lang_productcat_sub_info3'],

    								 	   &$value['lang_productcat_sub_info4'],

    								 	   &$value['lang_productcat_sub_info5'],

    								 	   &$edit_state,

    								 	   &$productcat_id,

    								 	   &$key),

    								 array('productcat_id','languages_code'),

    								 'ssssssssiis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



    	public function updateLangProduct(){

    		$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';

    		// print_r($product_id);

    		$lang = isset($_POST['lang']) ? $_POST['lang'] : '';

    		$edit_state = 1;

    		$flag =true;

    		// print_r($lang);

    		foreach ($lang as $key => $value) {

    			// print_r(array(&$value['lang_product_name'], 

		    	// 						   &$value['lang_product_des'], 

		    	// 						   // &$value['lang_product_des2'], 

		    	// 						   // &$value['lang_product_des3'], 

		    	// 						   &$value['lang_product_content'], 

		    	// 						   // &$value['lang_product_content2'], 

		    	// 						   // &$value['lang_product_content3'], 

		    	// 						   // &$value['lang_product_code'], 

		    	// 						   // &$value['lang_product_original'], 

		    	// 						   // &$value['lang_product_size'], 

		    	// 						   // &$value['lang_product_package'], 

		    	// 						   // &$value['lang_product_delivery'], 

		    	// 						   // &$value['lang_product_delivery_time'], 

		    	// 						   // &$value['lang_product_payment'], 

		    	// 						   // &$value['lang_product_payment_type'], 

		    	// 						   // &$value['lang_product_sub_info1'], 

		    	// 						   // &$value['lang_product_sub_info2'], 

		    	// 						   // &$value['lang_product_sub_info3'], 

		    	// 						   // &$value['lang_product_sub_info4'], 

		    	// 						   // &$value['lang_product_sub_info5'], 

		    	// 						   &$product_id, 

		    	// 						   &$key));

    			

    			if(!$this->Update_1('product_languages', 

		    						 array('lang_product_name', 

		    							   'lang_product_des', 

		    							   'lang_product_des2', 

		    							   'lang_product_des3', 

		    							   'lang_product_content', 

		    							   'lang_product_content2', 

		    							   'lang_product_content3', 

		    							   'lang_product_code', 

		    							   'lang_product_original', 

		    							   'lang_product_size', 

		    							   'lang_product_package', 

		    							   'lang_product_delivery', 

		    							   'lang_product_delivery_time', 

		    							   'lang_product_payment', 

		    							   'lang_product_payment_type', 

		    							   'lang_product_sub_info1', 

		    							   'lang_product_sub_info2', 

		    							   'lang_product_sub_info3', 

		    							   'lang_product_sub_info4', 

		    							   'lang_product_sub_info5','friendly_url', 'title_seo'), 

		    						 array(&$value['lang_product_name'], 

		    							   &$value['lang_product_des'], 

		    							   &$value['lang_product_des2'], 

		    							   &$value['lang_product_des3'], 

		    							   &$value['lang_product_content'], 

		    							   &$value['lang_product_content2'], 

		    							   &$value['lang_product_content3'], 

		    							   &$value['lang_product_code'], 

		    							   &$value['lang_product_original'], 

		    							   &$value['lang_product_size'], 

		    							   &$value['lang_product_package'], 

		    							   &$value['lang_product_delivery'], 

		    							   &$value['lang_product_delivery_time'], 

		    							   &$value['lang_product_payment'], 

		    							   &$value['lang_product_payment_type'], 

		    							   &$value['lang_product_sub_info1'], 

		    							   &$value['lang_product_sub_info2'], 

		    							   &$value['lang_product_sub_info3'], 

		    							   &$value['lang_product_sub_info4'], 

		    							   &$value['lang_product_sub_info5'], 

		    							   &$value['friendly_url'],

		    							   &$value['title_seo'],

		    							   &$product_id, 

		    							   &$key), 

		    						 array('product_id',

		    							  'languages_code'), 

		    						 'ssssssssssssssssssssssis')){

    				$flag = false;

    			}

    		}

    		if ($flag) {

    			echo json_encode(array('success'=>'Cập nhật ngôn ngữ thành công'));

    		}else{

    			echo json_encode(array('error'=>'Lỗi, mời thử lại'));

    		}

    	}



   	/*----------------- Menu -----------------------*/



   		public function getMenuType(){

  			$menu_type = $_GET['menu'] ? $_GET['menu'] : '';



  			switch ($menu_type) {

  				case '1':

  					break;

  				case '2':

  					break;  				

  				case '3':

  					$list = $this->getList('productcat','','','productcat_id','asc','','','');

  					?>

  						<p class="titleRightNCP">Danh mục sản phẩm 1</p>

		                <select name="productcat_id" id="" class="select2">

		                	<?php 

		                		$this->showCategoriesSelect2($list, 'productcat_parent', 0, '', 'productcat_id', 'productcat_name', '')

		                	?>

		                </select>

		                <!-- <p class="titleRightNCP">Đường dẫn</p>

		                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

  					<?php

  					break;



  				case '4':

  					$list = $this->getList('product','','','productcat_id','asc','','','');

  					?>

  						<p class="titleRightNCP">Sản phẩm</p>

		                <select name="product_id" id="" class="select2">

		                	<?php 

		                		foreach ($list as $key => $value) {

		                		?>

		                			<option value="<?= $value['product_id']?>"><?= $value['product_name']?></option>

		                		<?php

		                		}

		                	?>

		                </select>

		               <!--  <p class="titleRightNCP">Đường dẫn</p>

		                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

  					<?php

  					break;



  				case '5':

  					$list = $this->getList('newscat','','','newscat_id','asc','','','');

  					?>

  						<p class="titleRightNCP">Danh mục tin tức</p>

		                <select name="newscat_id" id="" class="select2">

		                	<?php 

		                		$this->showCategoriesSelect2($list, 'newscat_parent', 0, '', 'newscat_id', 'newscat_name', '')

		                	?>

		                </select>

		                <!-- <p class="titleRightNCP">Đường dẫn</p>

		                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

  					<?php

  					break;

  				case '6':

  					break;

  				case '7':

  					$list = $this->getList('news','','','newscat_id','asc','','','');

  					?>

  						<p class="titleRightNCP">Tin tức</p>

		                <select name="news_id" id="" class="select2">

		                	<?php 

		                		foreach ($list as $key => $value) {

		                		?>

		                			<option value="<?= $value['news_id']?>"><?= $value['news_name']?></option>

		                		<?php

		                		}

		                	?>

		                </select>

		                <!-- <p class="titleRightNCP">Đường dẫn</p>

		                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

  					<?php

  					break;

  				case '8':

  					?>

		                <p class="titleRightNCP">Đường dẫn</p>

		                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/>

  					<?php

  					break;	

  				case '9':

  					break;  
  					
  				case '10':

  					break;		

  				case '11':

                    $list = $this->getList('service','','','servicecat_id','asc','','','');

                    ?>

                        <p class="titleRightNCP">Tin tức</p>

                        <select name="service_id" id="" class="select2">

                            <?php 

                                foreach ($list as $key => $value) {

                                ?>

                                    <option value="<?= $value['service_id']?>"><?= $value['service_name']?></option>

                                <?php

                                }

                            ?>

                        </select>

                        <!-- <p class="titleRightNCP">Đường dẫn</p>

                        <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

                    <?php

                    break;



  				/*========*/



  				case '12':

                    $list = $this->getList('servicecat','','','servicecat_id','asc','','','');

                    ?>

                        <p class="titleRightNCP">Danh mục dịch vụ</p>

                        <select name="servicecat_id" id="" class="select2">

                            <?php 

                                $this->showCategoriesSelect2($list, 'servicecat_parent', 0, '', 'servicecat_id', 'servicecat_name', '')

                            ?>

                        </select>

                        <!-- <p class="titleRightNCP">Đường dẫn</p>

                        <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

                    <?php

                    break;  				

  				case '13':

  					$list = $this->getList('page','','','page_id','asc','','','');

  					?>

  						<p class="titleRightNCP">Trang nội dung</p>

		                <select name="page_id" id="" class="select2">

		                	<?php 

		                		foreach ($list as $key => $value) {

		                		?>

		                			<option value="<?= $value['page_id']?>"><?= $value['page_name']?></option>

		                		<?php

		                		}

		                	?>

		                </select>

		                <!-- <p class="titleRightNCP">Đường dẫn</p>

		                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->

  					<?php

  					break;

  				case '14':
  					break;

  				case '15':
  					break;	
  		
  				default:
  					break;

  			}

  		}



  		public function addMenu(){

  			$menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';

  			$menu_sort_order = isset($_POST['menu_sort_order']) ? $_POST['menu_sort_order'] : '';

  			$menu_type_id = isset($_POST['menu_type_id']) ? $_POST['menu_type_id'] : '';

  			$menu_url = isset($_POST['menu_url']) ? $_POST['menu_url'] : '';

  			$productcat_id = isset($_POST['productcat_id']) ? $_POST['productcat_id'] : '';

  			$newscat_id = isset($_POST['newscat_id']) ? $_POST['newscat_id'] : '';

  			$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';

  			$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : '';

  			$news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';

  			$servicecat_id = isset($_POST['servicecat_id']) ? $_POST['servicecat_id'] : '';

  			$service_id = isset($_POST['service_id']) ? $_POST['service_id'] : '';

  			$menu_parent = isset($_POST['menu_parent']) ? $_POST['menu_parent'] : '';

  			$state = isset($_POST['state']) ? $_POST['state'] : '';


  			$insert = $this->Insert_1('menu',

  									   array('menu_name', 

  									   		 'menu_sort_order',

  									   		 'menu_type_id',

  									   		 'menu_url',

  									   		 'productcat_id',

  									   		 'newscat_id',

  									   		 'product_id',

  									   		 'page_id',

  									   		 'news_id',

  									   		 'servicecat_id',

  									   		 'service_id',

  									   		 'state',

  									   		 'menu_parent'),

  									   array(&$menu_name, 

  									   		 &$menu_sort_order, 

  									   		 &$menu_type_id, 

  									   		 &$menu_url, 

  									   		 &$productcat_id, 

  									   		 &$newscat_id, 

  									   		 &$product_id, 

  									   		 &$page_id, 

  									   		 &$news_id, 

  									   		 &$servicecat_id,

  									   		 &$service_id,

  									   		 &$state, 

  									   		 &$menu_parent),

  									   'siisiiiiiiiii');

  			if ($insert != '') {

  				$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {

	    			$insert1 = $this->Insert_1('menu_languages', 

	    										array('menu_id',

	    											  'urlFriendly_menu',

	    											  'languages_code', 

	    											  'lang_menu_name'), 

	    										array(&$insert, 

	    											  &$menu_url,

	    											  &$lang['languages_code'], 

	    											  &$menu_name),

	    										'isss');

	    		}

  				echo json_encode(array('success'=>'Thêm mới menu thành công', 'url'=>'index.php?page=sua-trinh-don&id='.$insert));

  			}else{

  				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

  			}

  		}

  		public function updateMenu(){

  			$menu_id = isset($_POST['menu_id']) ? $_POST['menu_id'] : '';

  			$menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';

  			$menu_sort_order = isset($_POST['menu_sort_order']) ? $_POST['menu_sort_order'] : '';

  			$menu_type_id = isset($_POST['menu_type_id']) ? $_POST['menu_type_id'] : '';

  			$menu_url = isset($_POST['menu_url']) ? $_POST['menu_url'] : '';

  			$productcat_id = isset($_POST['productcat_id']) ? $_POST['productcat_id'] : '';

  			$newscat_id = isset($_POST['newscat_id']) ? $_POST['newscat_id'] : '';

  			$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';

  			$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : '';

  			$news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';

  			$servicecat_id = isset($_POST['servicecat_id']) ? $_POST['servicecat_id'] : '';

            $service_id = isset($_POST['service_id']) ? $_POST['service_id'] : '';

  			$menu_parent = isset($_POST['menu_parent']) ? $_POST['menu_parent'] : '';

  			$state = isset($_POST['state']) ? $_POST['state'] : '';


  			//$friendly_url = $this->GetFinalSlug($menu_url, 'menu', $menu_id);

  			$lang_showMain = "vn";

  			$this->Update_1('menu_languages', 

		    							 array('lang_menu_name',
		    							 	   'urlFriendly_menu'), 

		    							 array(&$menu_name,		    							 	   
		    							 	   &$menu_url, 
		    							 	   &$menu_id, 
		    							 	   &$lang_showMain), 

		    							 array('menu_id',
		    							 	   'languages_code'),
		    							 'ssis');



  			$update = $this->Update_1('menu',

  									   array('menu_name', 

  									   		 'menu_sort_order',

  									   		 'menu_type_id',

  									   		 'menu_url',

  									   		 'productcat_id',

  									   		 'newscat_id',

  									   		 'product_id',

  									   		 'page_id',

  									   		 'news_id',

  									   		 'servicecat_id',

  									   		 'service_id',

  									   		 'state',

  									   		 'menu_parent'),

  									   array(&$menu_name, 

  									   		 &$menu_sort_order, 

  									   		 &$menu_type_id, 

  									   		 &$menu_url, 

  									   		 &$productcat_id, 

  									   		 &$newscat_id, 

  									   		 &$product_id, 

  									   		 &$page_id, 

  									   		 &$news_id, 

  									   		 &$servicecat_id,

  									   		 &$service_id,

  									   		 &$state, 

  									   		 &$menu_parent,

  									   		 &$menu_id),

  									   array('menu_id'),

  									   'siisiiiiiiiiii');

  			if ($update) {

  				$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {

		    		if ($this->getDetail_New('menu_languages',array('menu_id','languages_code'),array(&$menu_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    			$this->Update_1('menu_languages', 

		    							 array('lang_menu_name'), 

		    							 array(&$menu_name,		    							 	   

		    							 	   &$menu_id, 

		    							 	   &$menu_url, 

		    							 	   &$lang['languages_code']), 

		    							 array('menu_id',
		    							 	
		    							 	   'urlFriendly_menu',

		    							 	   'languages_code'),

		    							 'siss');

		    		}

	    		}

  				echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

  			}else{

  				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

  			}

  		}



  		public function deleteMenu(){

			$menu_id = isset($_POST['id']) ? $_POST['id'] : '';



			$array_child = $this->getList('menu','menu_parent', $menu_id, 'menu_id', 'desc','','','');

			if ($array_child) {

				$current_parent = $this->getDetail_New('menu',array('menu_id'),array(&$menu_id),'i');

				$current_parent = $current_parent['menu_parent'];

				foreach ($array_child as $key => $val) {

					$this->Update_1('menu',array('menu_parent'),array(&$current_parent, &$val['menu_id']),array('menu_id'),'ii');

				}

			}



			if($this->Delete_1('menu','',array(&$menu_id),array('menu_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=trinh-don'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}	

		}



/*---------------- Danh mục dịch vụ --------------------*/



		public function addServiceCat(){

			

			$servicecat_name = isset($_POST['servicecat_name']) ? $_POST['servicecat_name'] : '';

			$servicecat_des = isset($_POST['servicecat_des']) ? $_POST['servicecat_des'] : '';

			$servicecat_content = isset($_POST['servicecat_content']) ? $_POST['servicecat_content'] : '';

			$servicecat_parent = isset($_POST['servicecat_parent']) ? $_POST['servicecat_parent'] : '';

			$servicecat_sort_order = isset($_POST['servicecat_sort_order']) ? $_POST['servicecat_sort_order'] : '';



			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$servicecat_sub_info1 = isset($_POST['servicecat_sub_info1']) ? $_POST['servicecat_sub_info1'] : '';

			$servicecat_sub_info2 = isset($_POST['servicecat_sub_info2']) ? $_POST['servicecat_sub_info2'] : '';

			$servicecat_sub_info3 = isset($_POST['servicecat_sub_info3']) ? $_POST['servicecat_sub_info3'] : '';

			$servicecat_sub_info4 = isset($_POST['servicecat_sub_info4']) ? $_POST['servicecat_sub_info4'] : '';

			$servicecat_sub_info5 = isset($_POST['servicecat_sub_info5']) ? $_POST['servicecat_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = '';

	    	}

	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'servicecat', '');



	    	$insert = $this->Insert_1('servicecat', 

	    							   array('servicecat_name', 

	    							   		 'servicecat_des', 

	    							   		 'servicecat_content', 

	    							   		 'servicecat_parent', 

	    							   		 'servicecat_sort_order', 

	    							   		 'servicecat_img', 

	    							   		 'servicecat_created_date', 

	    							   		 'keyword', 

	    							   		 'title_seo', 

	    							   		 'des_seo', 

	    							   		 'friendly_url',

	    							   		 'state', 

	    							   		 // 'servicecat_sub_info1', 

	    							   		 // 'servicecat_sub_info2', 

	    							   		 // 'servicecat_sub_info3', 

	    							   		 // 'servicecat_sub_info4', 

	    							   		 // 'servicecat_sub_info5', 

	    							   		 'created_id'), 

	    							   array(&$servicecat_name, 

	    							   		 &$servicecat_des, 

	    							   		 &$servicecat_content, 

	    							   		 &$servicecat_parent, 

	    							   		 &$servicecat_sort_order, 

	    							   		 &$img_name, 

	    							   		 &$date, 

	    							   		 &$keyword, 

	    							   		 &$title_seo, 

	    							   		 &$des_seo, 

	    							   		 &$friendly_url, 

	    							   		 &$state, 

	    							   		 // &$servicecat_sub_info1, 

	    							   		 // &$servicecat_sub_info2, 

	    							   		 // &$servicecat_sub_info3, 

	    							   		 // &$servicecat_sub_info4, 

	    							   		 // &$servicecat_sub_info5, 

	    							   		 &$_SESSION['admin_id']), 

	    							   'sssiissssssii');

	    	// echo json_encode(array('error'=>'Lỗi, mời thử lại'));
	    	

	    	if($insert != ''){

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$servicecat_name = 'english version ' . $servicecat_name;
	    				$servicecat_des = 'english version ' . $servicecat_des;
	    				$servicecat_content = 'english version ' . $servicecat_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('servicecat_languages', 

	    										array('servicecat_id', 

	    											  'languages_code', 

	    											  'lang_servicecat_name', 

	    											  'lang_servicecat_des', 

	    											  'lang_servicecat_content', 

	    											  // 'lang_servicecat_sub_info1', 

	    											  // 'lang_servicecat_sub_info2', 

	    											  // 'lang_servicecat_sub_info3', 

	    											  // 'lang_servicecat_sub_info4', 

	    											  // 'lang_servicecat_sub_info5',

	    											  'keyword', 

	    							   		 		  'title_seo', 

	    							   		          'des_seo', 

	    							   		          'friendly_url'), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$servicecat_name, 

	    											  &$servicecat_des, 

	    											  &$servicecat_content, 

	    											  // &$servicecat_sub_info1, 

	    											  // &$servicecat_sub_info2,

	    											  // &$servicecat_sub_info3, 

	    											  // &$servicecat_sub_info4, 

	    											  // &$servicecat_sub_info5,

	    											  &$keyword, 

	    							   		 		  &$title_seo, 

	    							   		 		  &$des_seo, 

	    							   		 		  &$friendly_url),

	    										'issssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-danh-muc-dich-vu&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

		}



		public function updateServiceCat(){

			$servicecat_id = isset($_POST['servicecat_id']) ? $_POST['servicecat_id'] : '';

			$servicecat_name = isset($_POST['servicecat_name']) ? $_POST['servicecat_name'] : '';

			$servicecat_des = isset($_POST['servicecat_des']) ? $_POST['servicecat_des'] : '';

			$servicecat_content = isset($_POST['servicecat_content']) ? $_POST['servicecat_content'] : '';

			$servicecat_parent = isset($_POST['servicecat_parent']) ? $_POST['servicecat_parent'] : '';

			$servicecat_sort_order = isset($_POST['servicecat_sort_order']) ? $_POST['servicecat_sort_order'] : '';



			$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$servicecat_sub_info1 = isset($_POST['servicecat_sub_info1']) ? $_POST['servicecat_sub_info1'] : '';

			$servicecat_sub_info2 = isset($_POST['servicecat_sub_info2']) ? $_POST['servicecat_sub_info2'] : '';

			$servicecat_sub_info3 = isset($_POST['servicecat_sub_info3']) ? $_POST['servicecat_sub_info3'] : '';

			$servicecat_sub_info4 = isset($_POST['servicecat_sub_info4']) ? $_POST['servicecat_sub_info4'] : '';

			$servicecat_sub_info5 = isset($_POST['servicecat_sub_info5']) ? $_POST['servicecat_sub_info5'] : '';

			$date = $this->get_Date('Y-m-d H:m:s');



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

	    	}else{

	    		$img_name = $_POST['servicecat_img'];

	    	}




	    	$array_child = array();

	    	$array_child = $this->getListChild('servicecat','servicecat_parent', $servicecat_id, 'servicecat_id', 'servicecat_id', 'desc');

	    	if (in_array($servicecat_parent, $array_child) || $servicecat_parent == $servicecat_id) {

	    		echo json_encode(array('error'=>'Lỗi, mời chọn lại danh mục cha'));

	    		exit();

	    	}



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'servicecat', $servicecat_id);

	    	$lang_showMain = "vn";



	    	$this->Update_1('servicecat_languages', 

		    							 array('lang_servicecat_name', 

		    							 	   'lang_servicecat_des', 

		    							 	   'lang_servicecat_content', 

		    							 	   // 'lang_servicecat_sub_info1', 

		    							 	   // 'lang_servicecat_sub_info2', 

		    							 	   // 'lang_servicecat_sub_info3', 

		    							 	   // 'lang_servicecat_sub_info4', 

		    							 	   // 'lang_servicecat_sub_info5',

		    							 	   'keyword', 

	    							   		   'title_seo', 

	    							   		   'des_seo', 

	    							   		   'friendly_url'), 

		    							 array(&$servicecat_name, 

		    							 	   &$servicecat_des, 

		    							 	   &$lang_servicecat_content, 

		    							 	   // &$servicecat_sub_info1, 

		    							 	   // &$servicecat_sub_info2, 

		    							 	   // &$servicecat_sub_info3,

		    							 	   // &$servicecat_sub_info4, 

		    							 	   // &$servicecat_sub_info5,

		    							 	   &$keyword, 

	    							   		   &$title_seo, 

	    							   		   &$des_seo, 

	    							   		   &$friendly_url, 

		    							 	   &$servicecat_id, 

		    							 	   &$lang_showMain), 

		    							 array('servicecat_id','languages_code'),

		    							 'sssssssis');

	  	 

	    	if (!$this->Update_1('servicecat', 

	    						  array('servicecat_name', 

	    						  		'servicecat_des', 

	    						  		'servicecat_content', 

	    						  		'servicecat_parent', 

	    						  		'servicecat_sort_order', 

	    						  		'servicecat_img', 

	    						  		'servicecat_created_date', 

	    						  		'keyword', 

	    						  		'title_seo', 

	    						  		'des_seo', 

	    						  		'friendly_url', 

	    						  		'state', 

	    						  		// 'servicecat_sub_info1', 

	    						  		// 'servicecat_sub_info2', 

	    						  		// 'servicecat_sub_info3', 

	    						  		// 'servicecat_sub_info4', 

	    						  		// 'servicecat_sub_info5'
	    						  		), 

	    						  array(&$servicecat_name, 

	    						  		&$servicecat_des, 

	    						  		&$servicecat_content, 

	    						  		&$servicecat_parent, 

	    						  		&$servicecat_sort_order, 

	    						  		&$img_name, 

	    						  		&$date, 

	    						  		&$keyword, 

	    						  		&$title_seo, 

	    						  		&$des_seo, 

	    						  		&$friendly_url, 

	    						  		&$state, 

	    						  		// &$servicecat_sub_info1, 

	    						  		// &$servicecat_sub_info2, 

	    						  		// &$servicecat_sub_info3, 

	    						  		// &$servicecat_sub_info4, 

	    						  		// &$servicecat_sub_info5, 

	    						  		&$servicecat_id), 

	    						  array('servicecat_id'), 

	    						  'sssiissssssii')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

	    	else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('servicecat_languages',array('servicecat_id','languages_code'),array(&$servicecat_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('servicecat_languages', 

		    	// 						 array('lang_servicecat_name', 

		    	// 						 	   'lang_servicecat_des', 

		    	// 						 	   'lang_servicecat_content', 

		    	// 						 	   'lang_servicecat_sub_info1', 

		    	// 						 	   'lang_servicecat_sub_info2', 

		    	// 						 	   'lang_servicecat_sub_info3', 

		    	// 						 	   'lang_servicecat_sub_info4', 

		    	// 						 	   'lang_servicecat_sub_info5'), 

		    	// 						 array(&$servicecat_name, 

		    	// 						 	   &$servicecat_des, 

		    	// 						 	   &$lang_servicecat_content, 

		    	// 						 	   &$servicecat_sub_info1, 

		    	// 						 	   &$servicecat_sub_info2, 

		    	// 						 	   &$servicecat_sub_info3,

		    	// 						 	   &$servicecat_sub_info4, 

		    	// 						 	   &$servicecat_sub_info5, 

		    	// 						 	   &$servicecat_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('servicecat_id','languages_code'),

		    	// 						 'ssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

		}



		public function deleteServiceCat(){

			$servicecat_id = isset($_POST['id']) ? $_POST['id'] : '';



			$array_child = $this->getList('servicecat','servicecat_parent', $servicecat_id, 'servicecat_id', 'desc','','','');

			if ($array_child) {

				$current_parent = $this->getDetail_New('servicecat',array('servicecat_id'),array(&$servicecat_id),'i');

				$current_parent = $current_parent['servicecat_parent'];

				foreach ($array_child as $key => $val) {

					$this->Update_1('servicecat',array('servicecat_parent'),array(&$current_parent, &$val['servicecat_id']),array('servicecat_id'),'ii');

				}

			}



			if($this->Delete_1('servicecat','',array(&$servicecat_id),array('servicecat_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=danh-muc-dich-vu'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}		

		}



	/*------------------ dịch vụ -------------------*/



		public function addService(){



			$detail = $this->getLoginInfor();

			$service_name = isset($_POST['service_name']) ? $_POST['service_name'] : '';

	    	$service_des = isset($_POST['service_des']) ? $_POST['service_des'] : '';

	    	$service_content = isset($_POST['service_content']) ? $_POST['service_content'] : '';

	    	$service_author = isset($_POST['service_author']) ? $_POST['service_author'] : '';

	    	$service_views = isset($_POST['service_views']) ? $_POST['service_views'] : '';

	    	$servicecat_id = isset($_POST['servicecat_id']) ? $_POST['servicecat_id'] : '';

	    	$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$service_sub_info1 = isset($_POST['service_sub_info1']) ? $_POST['service_sub_info1'] : '';

			$service_sub_info2 = isset($_POST['service_sub_info2']) ? $_POST['service_sub_info2'] : '';

			$service_sub_info3 = isset($_POST['service_sub_info3']) ? $_POST['service_sub_info3'] : '';

			$service_sub_info4 = isset($_POST['service_sub_info4']) ? $_POST['service_sub_info4'] : '';

			$service_sub_info5 = isset($_POST['service_sub_info5']) ? $_POST['service_sub_info5'] : '';



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

		    	$success = $this->createThumbnail($src.$img_name, $src.'/thumbs/'.$img_name, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$img_name = '';

	    	}





	    	$date = $this->get_Date('Y-m-d H:m:s');



	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'service', '');

	    	$insert = $this->Insert_1('service', 

	    							   array('service_name', 

	    							   		 'service_des', 

	    							   		 'service_content', 

	    							   		 'service_img', 

	    							   		 'service_author', 

	    							   		 'service_create_date', 

	    							   		 'service_update_date',

	    							   		 'service_views', 

	    							   		 'servicecat_id', 

	    							   		 'title_seo', 

	    							   		 'des_seo', 

	    							   		 'keyword', 

	    							   		 'friendly_url', 

	    							   		 'state', 

	    							   		 // 'service_sub_info1', 

	    							   		 // 'service_sub_info2', 

	    							   		 // 'service_sub_info3', 

	    							   		 // 'service_sub_info4', 

	    							   		 // 'service_sub_info5', 

	    							   		 'created_id'), 

	    							   array(&$service_name, 

	    							   		 &$service_des, 

	    							   		 &$service_content, 

	    							   		 &$img_name, 

	    							   		 &$service_author, 

	    							   		 &$date, 

	    							   		 &$date,

	    							   		 &$service_views, 

	    							   		 &$servicecat_id, 

	    							   		 &$title_seo, 

	    							   		 &$des_seo, 

	    							   		 &$keyword, 

	    							   		 &$friendly_url, 

	    							   		 &$state, 

	    							   		 // &$service_sub_info1, 

	    							   		 // &$service_sub_info2, 

	    							   		 // &$service_sub_info3, 

	    							   		 // &$service_sub_info4, 

	    							   		 // &$service_sub_info5, 

	    							   		 &$_SESSION['admin_id']), 

	    							   'sssssssiissssii');	    	


	    	if($insert != ''){

	    		$languages = $this->getListLanguages();

	    		foreach ($languages as $key => $lang) {
	    			if ($lang['languages_code'] == 'en') {
	    				$service_name = 'english version ' . $service_name;
	    				$service_des = 'english version ' . $service_des;
	    				$service_content = 'english version ' . $service_content;
	    				$friendly_url = 'en-' . $friendly_url;
	    			}

	    			$insert1 = $this->Insert_1('service_languages', 

	    										array('service_id', 

	    											  'languages_code', 

	    											  'lang_service_name', 

	    											  'lang_service_des', 

	    											  'lang_service_content', 

	    											  // 'lang_service_sub_info1', 

	    											  // 'lang_service_sub_info2', 

	    											  // 'lang_service_sub_info3', 

	    											  // 'lang_service_sub_info4', 

	    											  // 'lang_service_sub_info5',

	    											  'title_seo', 

	    							   		 		  'des_seo', 

	    							   		 		  'keyword', 

	    							   		 		  'friendly_url'), 

	    										array(&$insert, 

	    											  &$lang['languages_code'], 

	    											  &$service_name, 

	    											  &$service_des, 

	    											  &$service_content, 

	    											  // &$service_sub_info1, 

	    											  // &$service_sub_info2, 

	    											  // &$service_sub_info3, 

	    											  // &$service_sub_info4, 

	    											  // &$service_sub_info5,

	    											  &$title_seo, 

	    							   		 		  &$des_seo, 

	    							   		 		  &$keyword, 

	    							   		          &$friendly_url),

	    										'issssssss');

	    		}

	    		echo json_encode(array('success'=>'Thêm mới thành công', 'url'=>'index.php?page=sua-dich-vu&id='.$insert));

	    	}else{

	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}

		}



		public function updateService(){

	
			$detail = $this->getLoginInfor();

			$service_id = isset($_POST['service_id']) ? $_POST['service_id'] : '';

			$service_name = isset($_POST['service_name']) ? $_POST['service_name'] : '';

	    	$service_des = isset($_POST['service_des']) ? $_POST['service_des'] : '';

	    	$service_content = isset($_POST['service_content']) ? $_POST['service_content'] : '';

	    	$service_author = isset($_POST['service_author']) ? $_POST['service_author'] : '';

	    	$service_views = isset($_POST['service_views']) ? $_POST['service_views'] : '';

	    	$servicecat_id = isset($_POST['servicecat_id']) ? $_POST['servicecat_id'] : '';

	    	$title_seo = isset($_POST['title_seo']) ? $_POST['title_seo'] : '';

			$des_seo = isset($_POST['des_seo']) ? $_POST['des_seo'] : '';

			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

			$friendly_url = isset($_POST['friendly_url']) ? $_POST['friendly_url'] : '';

			$state = isset($_POST['state']) ? $_POST['state'] : '0';

			$service_sub_info1 = isset($_POST['service_sub_info1']) ? $_POST['service_sub_info1'] : '';

			$service_sub_info2 = isset($_POST['service_sub_info2']) ? $_POST['service_sub_info2'] : '';

			$service_sub_info3 = isset($_POST['service_sub_info3']) ? $_POST['service_sub_info3'] : '';

			$service_sub_info4 = isset($_POST['service_sub_info4']) ? $_POST['service_sub_info4'] : '';

			$service_sub_info5 = isset($_POST['service_sub_info5']) ? $_POST['service_sub_info5'] : '';



			if (isset($_FILES['fileUpload1']) && $_FILES['fileUpload1']['name'] != "") {

	    		$src= "../images/";

		    	$img = $_FILES['fileUpload1'];

		    	$this->uploadPicture($src, $img['name'], $img['tmp_name']);	

		    	$img_name = $img['name'];

		    	$success = $this->createThumbnail($src.$img_name, $src.'/thumbs/'.$img_name, 215, 145,array(255,255,255)); // creates a thumbnail 

	    	}else{

	    		$img_name = $_POST['service_img'];

	    	}

	    	$date = $this->get_Date('Y-m-d H:m:s');


	    	$friendly_url = $this->GetFinalSlug($friendly_url, 'service', $service_id);

	    	$lang_showMain = "vn";


			$this->Update_1('service_languages', 

    							 array('lang_service_name', 

    							 	   'lang_service_des', 

    							 	   'lang_service_content', 

    							 	   // 'lang_service_sub_info1', 

    							 	   // 'lang_service_sub_info2', 

    							 	   // 'lang_service_sub_info3', 

    							 	   // 'lang_service_sub_info4', 

    							 	   // 'lang_service_sub_info5',

    							 	   'title_seo', 

	    						  	   'des_seo', 

	    						  	   'keyword', 

	    						  	   'friendly_url'), 

    							 array(&$service_name, 

    							 	   &$service_des, 

    							 	   &$service_content, 

    							 	   // &$service_sub_info1, 

    							 	   // &$service_sub_info2, 

    							 	   // &$service_sub_info3, 

    							 	   // &$service_sub_info4, 

    							 	   // &$service_sub_info5,

    							 	   &$title_seo, 

	    						  	   &$des_seo, 

	    						  	   &$keyword, 

	    						  	   &$friendly_url, 

    							 	   &$service_id, 

    							 	   &$lang_showMain), 

    							 array('service_id','languages_code'),

    							 'sssssssis');			

	    	if (!$this->Update_1('service', 

	    						  array('service_name', 

	    						  		'service_des', 

	    						  		'service_content', 

	    						  		'service_img', 

	    						  		'service_author', 

	    						  		'service_update_date', 

	    						  		'service_views', 

	    						  		'servicecat_id', 

	    						  		'title_seo', 

	    						  		'des_seo', 

	    						  		'keyword', 

	    						  		'friendly_url', 

	    						  		'state'

	    						  		// 'service_sub_info1', 

	    						  		// 'service_sub_info2', 

	    						  		// 'service_sub_info3', 

	    						  		// 'service_sub_info4', 

	    						  		// 'service_sub_info5'
	    						  		), 

	    						  array(&$service_name, 

	    						  		&$service_des, 

	    						  		&$service_content, 

	    						  		&$img_name, 

	    						  		&$service_author, 

	    						  		&$date, 

	    						  		&$service_views,

	    						  		&$servicecat_id,

	    						  		&$title_seo, 

	    						  		&$des_seo, 

	    						  		&$keyword, 

	    						  		&$friendly_url, 

	    						  		&$state, 

	    						  		// &$service_sub_info1, 

	    						  		// &$service_sub_info2, 

	    						  		// &$service_sub_info3, 

	    						  		// &$service_sub_info4, 

	    						  		// &$service_sub_info5, 

	    						  		&$service_id), 

	    						  array('service_id'), 

	    						  'ssssssiissssii')) {



	    		echo json_encode(array('error'=>'Lỗi, mời thử lại'));

	    	}else{

	    		// $languages = $this->getListLanguages();

	    		// foreach ($languages as $key => $lang) {

		    	// 	if ($this->getDetail_New('service_languages',array('service_id','languages_code'),array(&$service_id, &$lang['languages_code']),'is')['edit_state'] == 0) {



		    	// 		$this->Update_1('service_languages', 

		    	// 						 array('lang_service_name', 

		    	// 						 	   'lang_service_des', 

		    	// 						 	   'lang_service_content', 

		    	// 						 	   'lang_service_sub_info1', 

		    	// 						 	   'lang_service_sub_info2', 

		    	// 						 	   'lang_service_sub_info3', 

		    	// 						 	   'lang_service_sub_info4', 

		    	// 						 	   'lang_service_sub_info5'), 

		    	// 						 array(&$service_name, 

		    	// 						 	   &$service_des, 

		    	// 						 	   &$service_content, 

		    	// 						 	   &$service_sub_info1, 

		    	// 						 	   &$service_sub_info2, 

		    	// 						 	   &$service_sub_info3, 

		    	// 						 	   &$service_sub_info4, 

		    	// 						 	   &$service_sub_info5, 

		    	// 						 	   &$service_id, 

		    	// 						 	   &$lang['languages_code']), 

		    	// 						 array('service_id','languages_code'),

		    	// 						 'ssssssssis');

		    	// 	}

	    		// }

	    		echo json_encode(array('success'=>'Cập nhật thông tin thành công'));

	    	}

	    }



	    public function deleteService(){

			$service_id = isset($_POST['id']) ? $_POST['id'] : '';



			if($this->Delete_1('service','',array(&$service_id),array('service_id'),'i')){

				echo json_encode(array('success'=>'Xóa thành công','url'=>'index.php?page=dich-vu'));

			}else{

				echo json_encode(array('error'=>'Lỗi, mời thử lại'));

			}	

		}		

}









?>