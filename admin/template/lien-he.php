<?php 
 //  if (isset($_GET['trang'])) {
 //        $start = $_GET['trang'] - 1;
 //        $start = $start*20;
 //    } else {
 //        $start = 0;
 //    }

	// $sql_lien_he = "SELECT * FROM lien_he Limit $start,20";
	// $result_lien_he = mysqli_query($conn_vn, $sql_lien_he);
	// $rows_lien_he = array();
	// while ($row_lien_he = mysqli_fetch_array($result_lien_he, MYSQLI_ASSOC)) {
	// 	$rows_lien_he[] = $row_lien_he;
	// }
$rows_lien_he = $action->getList('lien_he','','','id','desc',$trang,20,'lien-he');//var_dump($rows_lien_he);die();
?>
<div class="container">
  <h2>Bảng lên hệ.</h2>            
  <table class="table">
    <thead>
      <tr>
      	<th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <!-- <th>Address</th> -->
        <th>Comment</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_lien_he['data'] as $v_row_lh) { ?>
      <tr>
        <td><?php echo $v_row_lh['name'];?></td>
        <td><?php echo $v_row_lh['email'];?></td>
        <td><?php echo $v_row_lh['phone'];?></td>
        <!-- <td><?php echo $v_row_lh['address'];?></td> -->
        <td><?php echo $v_row_lh['comment'];?></td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>
<?php

    echo $rows_lien_he['paging'];
    // if (isset($_GET['trang'])) {
    //     $trang = $_GET['trang'];
    // } else {
    //     $trang = 1;
    // }

    // $sql_pagin = "SELECT * From lien_he";
    // $result_pagin = mysqli_query($conn_vn, $sql_pagin);
    // $num_pagin = mysqli_num_rows($result_pagin);


    // $config = array(
    //     'current_page'  => $trang, // Trang hiện tại
    //     'total_record'  => $num_pagin, // Tổng số record
    //     'total_page'    => 1, // Tổng số trang
    //     'limit'         => 20,// limit
    //     'start'         => 0, // start
    //     'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
    //     'link_first'    => '',// Link trang đầu tiên
    //     'range'         => 9, // Số button trang bạn muốn hiển thị 
    //     'min'           => 0, // Tham số min
    //     'max'           => 0  // tham số max, min và max là 2 tham số private
    // );

    // $pagination = new Pagination;
    // $pagination->init($config);
    
 // echo $pagination->htmlPaging_tuan($_GET['page']); 
?>