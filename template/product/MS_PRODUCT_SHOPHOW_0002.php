<?php if ($row['product_price_sale'] != 0) { ?>
<div class="price">
        <span class="new-price"><?= number_format($row['product_price']-($row['product_price']*($row['product_price_sale']/100))) ?>đ</span>
        <span class="old-price"><?= number_format($row['product_price']) ?>₫</span>
</div>
<?php } else { ?>
<div class="price">
        <span class="new-price"><?= number_format($row['product_price']-($row['product_price']*($row['product_price_sale']/100))) ?>đ</span>
</div>
<?php } ?>