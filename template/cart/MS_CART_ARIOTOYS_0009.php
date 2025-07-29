<?php 
  // var_dump($_SESSION);
?>
<div class="uni-cart">
    <div id="wrapper-container" class="site-wrapper-container">
        <div id="main-content" class="site-main-content">
            <div class="site-content-area">
                <main id="main" class="site-main">

                    <?php include DIR_BREADCRUMS."MS_BREADCRUMS_ARIOTOYS_0001.php";?>
                    
                    <div class="uni-cart-body">
                        <div id="post" class="container">
                          <h1 class="title-cart">GIỎ HÀNG</h1>
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="table-responsive" id="order_table" style="width: 100%;">  
                                       <table class="table table-bordered table-cart" style="margin-bottom: 100px;">  
                                            <tr>  
                                                 <th width="30%">Tên sản phẩm</th>  
                                                 <th width="10%">Số lượng</th> 
                                                 <th width="10%">kích cỡ</th> 
                                                 <th width="20%">Giá</th>  
                                                 <th width="15%">Tổng tiền</th>  
                                                 <th width="5%">Hành động</th>  
                                            </tr>  
                                            <?php  
                                            if(!empty($_SESSION["shopping_cart"]))  
                                            {  
                                                 $total = 0;  
                                                 foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                                 {                                               
                                            ?>  
                                            <tr>  
                                                 <td><?php echo $values["product_name"]; ?></td>  
                                                 <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_size="<?= $values["product_size"] ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                                                 <td><?= $values['product_size'] ?></td>
                                                 <td align="right"><?php echo number_format($values["product_price"], 2); ?></td>  
                                                 <td align="right"><?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?> VNĐ</td>  
                                                 <td><button name="delete" class="btn btn-danger btn-xs delete" size="<?= $values['product_size'] ?>" id="<?php echo $values["product_id"]; ?>" style="margin: 0px;">Xóa sản phẩm</button></td>  
                                            </tr>  
                                            <?php  
                                                      $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                                 }  
                                            ?>  
                                            <tr>  
                                                 <td colspan="4" align="right">Thành tiền</td>  
                                                 <td align="right"><?php echo number_format($total, 2); ?> VNĐ</td>  
                                                 <td></td>  
                                            </tr>  
                                            <tr>  
                                                 <td colspan="6" align="center">  
                                                      <form method="post" action="/thanh-toan">  
                                                           <input type="submit" name="place_order" class="btn btn-warning place_order" value="Thanh toán" style="width: 15%;" />  
                                                      </form>  
                                                 </td>  
                                            </tr>  
                                            <?php  
                                            }  
                                            ?>  
                                       </table>  
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</div>
<script>  
 $(document).ready(function(data){  
      $('.add_to_cart').click(function(){  
           var product_id = $(this).attr("id");  
           var product_name = $('#name'+product_id).val();  
           var product_price = $('#price'+product_id).val();  
           var product_quantity = $('#quantity'+product_id).val();  
           var action = "add";  
           if(product_quantity > 0)  
           {  
                $.ajax({  
                     url:"../functions/action_cart_tmp.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          alert("Product has been Added into Cart");  
                     }  
                });  
           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });  
      $(document).on('click', '.delete', function(){  
           var product_id = $(this).attr("id");  
           var action = "remove";  
           var size = $(this).attr("size");
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                $.ajax({  
                     url:"../functions/action_cart_tmp1.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, product_size:size, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge1').text(data.cart_item);
                          // alert(data.order_table);
                          // alert('success');
                     },
                     error:function(){
                        alert('loi.');
                     }  
                });  


           }  
           else  
           {  
                return false;  
           }  
      });  
      $(document).on('keyup', '.quantity', function(){  
           var product_id = $(this).data("product_id");  
           var quantity = $(this).val();  
           var action = "quantity_change";  
           var size = $(this).data('product_size');
           // alert(size);return false;
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"../functions/action_cart_tmp1.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, product_size:size, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  


           }  
      });  
 });  
 </script>