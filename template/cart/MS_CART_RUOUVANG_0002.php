<div class="gb-chi-tiet-add-to-cart">
    <form class="cart" method="post" enctype="multipart/form-data">
        
        <div class="gb-selectsize">
            <div class="form-group">
                <label>Select size</label>
                <select class="form-control" name="size" id="size">
                    <?php 
                    $size = json_decode($row['product_size']);
                    foreach ($size as $item) { 
                    ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                    <?php } ?>
                    <option value="">Chọn...</option>
                </select>
            </div>
        </div>
        <div class="quantity">
            <div class="form-group">
                <label>Số lượng:</label>
                <input type="number" class="form-control qty number_cart" id="pwd" min="0" value="1">
                <input type="hidden" name="id" id="product_id" value="<?php echo $rowLang['product_id'];?>">
                <input type="hidden" name="name" id="product_name" value="<?= $rowLang['lang_product_name'];?>">
                <input type="hidden" name="price" id="product_price" value="<?php echo $row['product_price']-($row['product_price']*($row['product_price_sale']/100));?>">
            </div>
        </div>
        <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart">Add to cart</button>
        <div class="clearfix"></div>
    </form>
</div>