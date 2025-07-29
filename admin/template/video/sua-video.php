<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function video ($id) {
		global $conn_vn;
		if (isset($_POST['add_video'])) {
			$src= "../images/";
			// $src = "uploads/";
			$image = "";

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$content = $_POST['content'];
			
			if ($image == "") {
				$sql = "UPDATE video SET content = '$content' WHERE id = $id";
			} else {
				$sql = "UPDATE video SET content = '$content', image = '$image' WHERE id = $id";
			}

			$result = mysqli_query($conn_vn, $sql) or die('loi:');
			echo '<script type="text/javascript">alert(\'Bạn đã sửa Video thành công.\');</script>';
		}
	}

	video($_GET['id']);

	function getVideo ($id) {
		global $conn_vn;
		$sql = "SELECT * FROM video WHERE id = $id";
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	$video_item = getVideo($_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin<br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Video</p>
            <textarea class="txtNCP1" name="content" rows="5" required><?= $video_item['content'] ?></textarea>
            <p class="titleRightNCP">Ảnh</p>
            <input type="file" class="txtNCP1" name="image"/>
            <img src="/images/<?= $video_item['image'] ?>" width="200">
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_video">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>