<?php
if (isset($_GET['search']) && $_GET['search'] != '') {
    $rows = $action->getSearchAdmin('regInfor', array('regInfor_name', 'regInfor_mail', 'regInfor_wasBorn', 'regInfor_sex'), $_GET['search'], $trang, 30);
} else {
    $rows = $action->getList('regInfor', '', '', 'regInfor_id', 'desc', $trang, 30, 'dang-ky');
}
?>
<div class="boxPageNews">
    <div class="searchBox">
        <form action="">
            <input type="hidden" name="page" value="dang-ky">
            <button type="submit" class="btnSearchBox" name="">Tìm kiếm</button>
            <input type="text" class="txtSearchBox" name="search"/>
        </form>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Tên người đăng ký</th>
            <th>Số điện thoại</th>
            <th>Năm sinh</th>
            <th>Giới tính</th>
            <th>Ngày đăng ký</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rows['data'] as $row) {
            ?>
            <tr>
                <td><a href="index.php?page=sua-dang-ky&id=<?= $row['regInfor_id']; ?>"
                       title=""><?= $row['regInfor_name']; ?></a></td>
                <td><?= $row['regInfor_phone'] ?></td>
                <td>
                    <?= $row['regInfor_wasBorn'] ?>
                </td>
                <td>
                    <?= $row['regInfor_sex'] ?>
                </td>
                <td><?= $row['regInfor_createdDate'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <div class="paging">
        <?= $rows['paging'] ?>
    </div>
</div>
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br/>Sản phẩm thuộc Công ty TNHH Truyền
    Thông Và Công Nghệ GoldBridge Việt Nam</p>