<?php 

/**

* 

*/



date_default_timezone_set('Asia/Ho_Chi_Minh'); /* Set múi giờ */



class library{	
	
    public function getDate(){
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
    	return date('Y-m-d');
    }

	/*----------- Tính % giá khuyến mãi ---------------*/



		function percent($num_amount, $num_total) {

			$count1 = $num_amount / $num_total;

			$count2 = $count1 * 100;

			$count = number_format($count2, 2);

			return round(100 - $count);

		}





	/*----------------- Lấy ngày -------------------*/



		public function get_Date($format){

			return date($format);

		}



	/*---------------- Upload image ----------------*/



		public function uploadPicture($src, $img_name, $img_temp){

			$src = $src.$img_name;

			if (!@getimagesize($src)){

				if (move_uploaded_file($img_temp, $src)) {

					return true;

				}

			}

		}



	/*-------------- Tạo thumbnails ---------------*/



		function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background=false) {

		    list($original_width, $original_height, $original_type) = getimagesize($filepath);

		    if ($original_width > $original_height) {

		        $new_width = $thumbnail_width;

		        $new_height = intval($original_height * $new_width / $original_width);

		    } else {

		        $new_height = $thumbnail_height;

		        $new_width = intval($original_width * $new_height / $original_height);

		    }

		    $dest_x = intval(($thumbnail_width - $new_width) / 2);

		    $dest_y = intval(($thumbnail_height - $new_height) / 2);



		    if ($original_type === 1) {

		        $imgt = "ImageGIF";

		        $imgcreatefrom = "ImageCreateFromGIF";

		    } else if ($original_type === 2) {

		        $imgt = "ImageJPEG";

		        $imgcreatefrom = "ImageCreateFromJPEG";

		    } else if ($original_type === 3) {

		        $imgt = "ImagePNG";

		        $imgcreatefrom = "ImageCreateFromPNG";

		    } else {

		        return false;

		    }



		    $old_image = $imgcreatefrom($filepath);

		    $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height); // creates new image, but with a black background



		    // figuring out the color for the background

		    if(is_array($background) && count($background) === 3) {

		      list($red, $green, $blue) = $background;

		      $color = imagecolorallocate($new_image, $red, $green, $blue);

		      imagefill($new_image, 0, 0, $color);

		    // apply transparent background only if is a png image

		    } else if($background === 'transparent' && $original_type === 3) {

		      imagesavealpha($new_image, TRUE);

		      $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);

		      imagefill($new_image, 0, 0, $color);

		    }



		    imagecopyresampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);

		    $imgt($new_image, $thumbpath);

		    return file_exists($thumbpath);

		}



	/*-------------- Tạo slug độc nhất -----------------*/



		public function GetFinalSlug($slug, $table, $id){

			global $conn_vn;

			if ($id != "") {

				$id = "and id_".$table." != '".$id."'";

			}

			$sql = "select * from ".$table." where friendly_url ='".$slug."' $id";

			$result = mysqli_query($conn_vn,$sql);

			if(mysqli_num_rows($result) > 0){

				for ($i=1; $i < 99999; $i++) { 

					$new_slug = $slug.'-'.$i;

					$sql1 = "SELECT * from $table where friendly_url = '".$new_slug."' limit 1";

					$result1 = mysqli_query($conn_vn,$sql1);

					if (mysqli_num_rows($result1) == 0) {

						return $new_slug;

						break;

					}

				}

			}else{

				return $slug;

			}

		}

		public function GetFinalSlug1($slug, $table, $id){

			global $conn_vn;

			if ($id != "") {

				$id = "and ".$table."_id != '".$id."'";

			}

			$sql = "select * from ".$table." where friendly_url ='".$slug."' $id";

			$result = mysqli_query($conn_vn,$sql);

			if(mysqli_num_rows($result) > 0){

				for ($i=1; $i < 99999; $i++) { 

					$new_slug = $slug.'-'.$i;

					$sql1 = "SELECT * from $table where friendly_url = '".$new_slug."' limit 1";

					$result1 = mysqli_query($conn_vn,$sql1);

					if (mysqli_num_rows($result1) == 0) {

						return $new_slug;

						break;

					}

				}

			}else{

				return $slug;

			}

		}

		public function GetFinalSlug2($slug, $table, $id){

			global $conn_vn;

			if ($id != "") {

				$id = "and ".$table."_id != '".$id."'";

			}

			$sql = "select * from ".$table." where friendly_url ='".$slug."' $id";

			$result = mysqli_query($conn_vn,$sql);

			if(mysqli_num_rows($result) > 0){

				for ($i=1; $i < 99999; $i++) { 

					$new_slug = $slug.'-'.$i;

					$sql1 = "SELECT * from $table where friendly_url = '".$new_slug."' limit 1";

					$result1 = mysqli_query($conn_vn,$sql1);

					if (mysqli_num_rows($result1) == 0) {

						echo json_encode(array('error' => 'Tên sản phẩm của bạn bị trùng.'));
						die();

					}

				}

			}else{

				return $slug;

			}

		}



	/*------------- Hàm Thêm mới ---------------*/



		public function Insert_1($table, $name, $value, $type){

			global $conn_vn;

			$string = array();

			$total = count($name);

			$name = implode(',', $name);



			for ($i=0; $i < $total; $i++) { 

				$string[] = '?';

			}



			$string = implode(',', $string);

			$sql = "INSERT into $table($name) values ($string)";



			$stmt = $conn_vn->prepare($sql);

			call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $value));



			

			if ($stmt->execute()) {

				if ($conn_vn->affected_rows > 0) {

					return $stmt->insert_id;

				}

			}

		}



	/*------------- Hàm cập nhật ---------------*/



		public function Update_1($table, $name, $value, $where_names, $type){

			global $conn_vn;

			$string = array();

			$where = array();

			foreach ($name as $key => $val) {

				$string[] = $val.' = ?';

			}



			foreach ($where_names as $key => $where_name) {

				$where[] = $where_name.' = ?';

			}



			$string = implode(',', $string);

			$where = implode(' and ', $where);



			$sql = "UPDATE $table set $string where $where";

			//echo $sql;

			// print_r($value);

			$stmt = $conn_vn->prepare($sql);

			call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $value));

			if ($stmt->execute()) {

				return true;

			}else{

				echo $stmt->error;

			}

		}



	/*-------------- Hàm xóa --------------*/



		public function Delete_1($table, $name, $value, $where_names, $type){

			global $conn_vn;

			$string = array();

			$where = array();

			foreach ($name as $key => $val) {

				$string[] = $val.' = ?';

			}



			foreach ($where_names as $key => $where_name) {

				$where[] = $where_name.' = ?';

			}



			$string = implode(',', $string);

			$where = implode(' and ', $where);



			$sql = "DELETE from $table where $where";

			// echo $sql;

			$stmt = $conn_vn->prepare($sql);

			call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $value));

			if ($stmt->execute()) {

				return true;

			}

		}



	/*------------- Hàm select list ----------------*/



		public function getList_New($table, $where_name, $where_value, $order_name, $order_value, $type, $trang, $limit, $page, $slug = ''){

			global $conn_vn;

	        $string = array();

	        $where = array();

	        $order = array();



	        foreach ($where_name as $key => $val) {

	            $where[] = $val.' = ?';

	        }



	        foreach ($order_name as $key => $val) {

	            $order[] = $val.' '.$order_value[$key];

	        }



	        $where = implode(' and ', $where);

	        $order = implode(', ', $order);



	        if ($trang == '' && $limit != '') {

	            $limit1 = 'limit '.$limit;

	        }



	        if ($where != '') {

	            $where1 = 'where '.$where;

	        }



	        if ($order != '') {

	            $order1 = 'order by '.$order;

	        }



	        $sql = "SELECT * from $table $where1 $order1 $limit1";

	        //echo $sql;

	        

	        $stmt = $conn_vn->prepare($sql);

	        call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $where_value));

	        $stmt->execute();



	        

	        $rows = array();

	        if ($trang != "" && $limit != "") {

	            $stmt->store_result();

	            $total_record = $stmt->num_rows;

	            $config = array(

	                'current_page'=> $trang != "" ? $trang : 1,

	                'total_record'=> $total_record,

	                'limit' => $limit,

	                'link_full'=> $slug != '' ? $slug.'/{trang}' : 'index.php?page='.$page.$cond.'&trang={trang}',

	                'link_first'=> $slug != '' ? $slug : 'index.php?page='.$page,

	                'range'=> 3

	            );

	            $paging = new Pagination();

	            $paging->init($config);

	            $start = $paging->_config['start'];

	            $limit = $paging->_config['limit'];

	            $sql = "SELECT * from $table $where1 $order1 limit $start, $limit";

	            $stmt = $conn_vn->prepare($sql);

	            call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $where_value));

	            $stmt->execute();

	            $results = $stmt->get_result();

	            while($row = $results->fetch_assoc()){

	                $rows[] = $row;

	            }

	            

	            $p = $paging->htmlPaging();

	            $rows1 = array("data"=>$rows, "paging"=>$p);

	            return $rows1;

	        }else{

	            $results = $stmt->get_result();

	            while($row = $results->fetch_assoc()){

	                $rows[] = $row;

	            }

	            return $rows;

	        }

	    }



	    public function getList($table, $name_idCat, $id_Cat, $order_name, $order_state, $trang, $limit, $page, $slug = ''){

	    	global $conn_vn;

	        if ($id_Cat != "" && $name_idCat != "") {

	            $cond = "&".$name_idCat."=".$id_Cat;

	            // $cond = "";

	            $where = " where $name_idCat='".$id_Cat."'";

	        }else{

	            $cond = "";

	        }

	        if ($order_name != "" && $order_state != "") {

	            $order = "order by $order_name $order_state ";

	        }

	        $rows = array();

	        if ($trang == '' && $limit != '') {

	        	$limit1 = 'limit '.$limit;

	        }

	        $sql = "SELECT * From $table $where $order $limit1";

	        // echo $sql;

	        $result = mysqli_query($conn_vn,$sql);

	        $total_record = mysqli_num_rows($result);

	        if ($trang != "" && $limit != "") {

	            $config = array(

	                'current_page'=> $trang != "" ? $trang : 1,

	                'total_record'=> $total_record,

	                'limit' => $limit,

	                'link_full'=> $slug != '' ? $slug.'/{trang}' : 'index.php?page='.$page.$cond.'&trang={trang}',

	                'link_first'=> $slug != '' ? $slug : 'index.php?page='.$page,

	                // 'link_full'=> $slug != '' ? $slug.'/'.$page.$cond.'/{trang}',

	                // 'link_first'=> $slug != '' ? $slug : '/'.$page,

	                // 'link_full'=> $slug != '' ? $slug.'/{trang}' : '/'.$page.'/{trang}',

	                // 'link_first'=> $slug != '' ? $slug : '/'.$page,

	                'range'=> 3

	            );

	            $paging = new Pagination();

	            $paging->init($config);

	            $start = $paging->_config['start'];

	            $limit = $paging->_config['limit'];

	            $sql = "SELECT * from $table $where $order limit $start, $limit";

	            $result = mysqli_query($conn_vn,$sql);

	            while($row = mysqli_fetch_array($result)){

	                $rows[] = $row;

	            }

	            $p = $paging->htmlPaging();

	            $rows1 = array("data"=>$rows, "paging"=>$p);

	            return $rows1;

	        }else{

	            while($row = mysqli_fetch_array($result)){

	                $rows[] = $row;

	            }

	            return $rows;

	        }

	    }



	/*------------ Hàm select chi tiết ---------------*/



		public function getDetail_New($table, $name, $value, $type){

			global $conn_vn;

	    	$string = array();

	    	$where = array();

	    	foreach ($name as $key => $val) {

	    	    foreach ($value as $i => $ii) {
	    	        if ($i == $key) {
			            $where[] = $val." = '$ii'";
                    }
                }

            }



			$where = implode(' and ', $where);

			$sql = "SELECT * from $table where $where limit 1";






			// print_r($value);

			// echo $where;

			// Lỗi mysqli::get_result;
			/*$stmt = $conn_vn->prepare($sql);

			call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $value));

//            $stmt->bind_param(array_merge(array($type), $value));

           $stmt->execute();



//            $results = $stmt->get_result();

			$row = $stmt->fetch();

           return $row;*/

            // value đâu????

		    $result = mysqli_query($conn_vn, $sql);

		    return mysqli_fetch_assoc($result);

	    }



	    public function getDetail($table, $name_id, $id){

	    	global $conn_vn;

	        $sql = "SELECT * from $table where $name_id = '".$id."' limit 1";

	        $result = mysqli_query($conn_vn,$sql);

	        if (mysqli_num_rows($result) > 0) {

	            $row = mysqli_fetch_assoc($result);

				return $row;

	        }

	    }



	/*-------------- Hàm tìm kiếm admin ---------------*/



		public function getSearchAdmin($table, $name_search, $value_search, $trang, $limit, $page){

			global $conn_vn;

	    	$where = array();

	    	$safe_search = $conn_vn->real_escape_string($value_search);

	    	$text_search = "'%".$safe_search."%'";

	    	$cond = '&search='.$value_search;

	    	foreach ($name_search as $key => $value) {

	    		$where[] =  $value.' like '.$text_search;

	    	}

	    	$where = implode(' OR ', $where);

	    	$sql = "SELECT * from $table where $where";

	    	$result = mysqli_query($conn_vn,$sql);

	        $total_record = mysqli_num_rows($result);

	        if ($trang != "" && $limit != "") {

	            $config = array(

	                'current_page'=> $trang != "" ? $trang : 1,

	                'total_record'=> $total_record,

	                'limit' => $limit,

	                'link_full'=> 'index.php?page='.$page.$cond.'&trang={trang}',

	                'link_first'=> 'index.php?page='.$page.$cond,

	                'range'=> 3

	            );

	            $paging = new Pagination();

	            $paging->init($config);

	            $start = $paging->_config['start'];

	            $limit = $paging->_config['limit'];

	            $sql = "SELECT * from $table where $where limit $start, $limit";

	            $result = mysqli_query($conn_vn,$sql);

	            while($row = mysqli_fetch_array($result)){

	                $rows[] = $row;

	            }

	            $p = $paging->htmlPaging();

	            $rows1 = array("data"=>$rows, 'total_record'=>$total_record, "paging"=>$p);

	            return $rows1;

	        }else{

	            while($row = mysqli_fetch_array($result)){

	                $rows[] = $row;

	            }

	            return $rows;

	        }

	    }



	/*------------ Lấy thông tin đăng nhập -----------------*/



		public function getLoginInfor(){

	    	$detail = '';

	        if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != '') {

	            $admin_id = $_SESSION['admin_id'];

	        }else if(isset($_COOKIE['admin_id']) && $_COOKIE['admin_id'] != ''){

	            $admin_id = $_COOKIE['admin_id'];

	        }

	        //$GLOBALS['id_account_gb'] = $admin_id;



	        $detail = $this->getDetail('admin', 'admin_id', $admin_id); 

	        return $detail;        

	    }



	/*--------------- Danh mục đệ quy ---------------*/



		function showCategoriesTable($list, $name_parent, $value_parent = 0, $page, $name_id, $name_text, $state, $level = 0){

			$cate_child = array();

		    foreach ($list as $key => $item)

		    {

		        // Nếu là chuyên mục con thì hiển thị

		        if ($item[$name_parent] == $value_parent)

		        {

		        	$cate_child[] = $item;

		            // Xóa chuyên mục đã lặp

		            unset($list[$key]);

		        }

		    }

		    if ($cate_child) {

	        	foreach ($cate_child as $key => $item) {

	        		echo '<tr>';

		                echo '<td>';

		                    echo '<a href="index.php?page='.$page.'&id='.$item[$name_id].'" title="" style="padding-left: '.($level*20).'px">'.$item[$name_text].'</a>';

		                echo '</td>';

		                echo '<td>';

		                	$account = $this->getDetail('admin','admin_id',$item['created_id']);

		                	echo '<a href="index.php?page=$page&created='.$account['admin_id'].'" title="" >'.$account['admin_name'].'</a>';

		                echo '</td>';

		                echo '<td>';

		                	echo $item[$state] == 1 ? 'Hoạt động' : 'Không';

		                echo '</td>';

		                $this->showCategoriesTable($list, $name_parent, $item[$name_id], $page, $name_id, $name_text, $state, $level+1);

		            echo '</tr>';

	        	}

	        }

		}



		function getListChild($table, $parent_field, $parent_value, $name_id, $sort_name, $sort_value){

			global $conn_vn;

			$list = $this->getList($table, $parent_field, $parent_value, $sor_name, $sort_value, '', '', '');



			foreach ($list as $key => $value) {

				$this->list_id[] = $value[$name_id];

				unset($list[$key]);

				$this->getListChild($table, $parent_field, $value[$name_id], $name_id, $sort_name, $sort_value);

			}

			return $this->list_id;

			$this->list_id = '';

		}



		public function refreshList(){
			$this->list_id = '';

		}



		/*-----------------------------------------------------------*/
		function showProductCategoriesSelect($categories, $name_parent, $value_parent = 0, $selected, $name_id, $name_text, $level, $productcat_ar){

		    foreach ($categories as $key => $item){
		        // Nếu là chuyên mục con thì hiển thị
		        if ($item[$name_parent] == $value_parent){
		            ?>
		           	<label>
		           		<input type="checkbox" name="productCats[]" <?php $this->isProductCategory_returnString($productcat_ar, $item[$name_id]) ?> value="<?= $item[$name_id]?>" style="margin-left: <?= ($level*30)?>px; padding-top: 2px; padding-bottom: 2px;"/> 
		           	<?= $item[$name_text] ?></label><br>
		           	
		            <?php
		            // Xóa chuyên mục đã lặp
		           	unset($categories[$key]);                                                                                                                     // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
		            $this->showProductCategoriesSelect($categories, $name_parent, $item[$name_id], $selected, $name_id, $name_text, $level+1,$productcat_ar);
		        }
		    }
		}
		/*----------------------------------------------------*/
		function isProductCategory_returnString($productcat_ar, $value_productId){

			// $array = json_decode($productcat_ar, true);
			// 	foreach ($array as $key => $val) {
			//     $productcat = json_decode($val, true);
			//     if ($productcat != '')
			//     	if($productcat['product_cat'] == $value_productId) echo "checked";
			// }
			$product_cat = explode(',', $productcat_ar);
       		foreach ($product_cat as $key => $val) {
                if($val == $value_productId) echo "checked ";
            }
		}
		/*----------------------------------------------------*/
		function isProductCategory_returnId($productcat_ar, $value_productId){

			$array = json_decode($productcat_ar, true);
       		foreach ($array as $key => $val) {
                $productcat = json_decode($val, true);

                if ($productcat != '')
                	if($productcat['product_cat'] == $value_productId) echo "checked";
            }
		}

		/*-------------------------------------------------------*/
		function showCategoriesSelect($categories, $name_parent, $value_parent = 0, $selected, $name_id, $name_text, $level){



		    foreach ($categories as $key => $item){



		        // Nếu là chuyên mục con thì hiển thị

		        if ($item[$name_parent] == $value_parent){

		            ?>

		           	<option value="<?= $item[$name_id]?>" <?php if($selected == $item[$name_id]){echo "selected";}?> style="padding-left: <?= ($level*20)?>px; padding-top: 2px; padding-bottom: 2px;">

		                <?= $item[$name_text] ?>

		            </option>

		            <?php

		            // Xóa chuyên mục đã lặp

		            unset($categories[$key]);                                                                                                                                                                                        

		            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp

		            $this->showCategoriesSelect($categories, $name_parent, $item[$name_id], $selected, $name_id, $name_text, $level+1);

		        }

		    }

		}



		function showCategoriesSelect2($categories, $name_parent, $value_parent = 0, $selected, $name_id, $name_text, $level){



		    foreach ($categories as $key => $item){



		        // Nếu là chuyên mục con thì hiển thị

		        if ($item[$name_parent] == $value_parent){

		            ?>

		           	<option value="<?= $item[$name_id]?>" <?php if($selected == $item[$name_id]){echo "selected";}?> style="padding-top: 2px; padding-bottom: 2px;">

		                <?= $level.$item[$name_text] ?>

		            </option>

		            <?php

		            // Xóa chuyên mục đã lặp

		            unset($categories[$key]);                                                                                                                                                                                        

		            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp

		            $this->showCategoriesSelect2($categories, $name_parent, $item[$name_id], $selected, $name_id, $name_text, $level.'---');

		        }

		    }

		}
		

		function update_service_lang ($title, $des, $content, $url, $lang, $id) {
			global $conn_vn;
			$sql = "UPDATE service_languages SET lang_service_name = '$title', lang_service_des = '$des', lang_service_content = '$content', friendly_url = '$url' Where languages_code = '$lang' And service_id = $id";
			$result = mysqli_query($conn_vn, $sql);
		}

}



