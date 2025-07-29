<?php
    $products = $cart->getCart();
    $totalPrice = 0;
?>
<script>
    // $(function(){
    //     $("#formPayment").on("submit",function(e){
    //         e.preventDefault();
    //         $.ajax({
    //             url: "ajax.php?action=payment",
    //             data: $(this).serialize(),
    //             type: "post",
    //             dataType: "json",
    //             beforeSend:function() {
    //                 // setting a timeout
    //                 // $("#submitPayment").addClass('loading');
    //                 $("#submitPayment").prop('disabled', true);
    //             },
    //             success:function(json){
    //                 if (json['success']) {
    //                     alert(json['success']);
    //                     location.href = json['url'];
    //                 }
    //                 if (json['error']) {
    //                     alert(json['error']);
    //                     $("#submitPayment").removeAttr('disabled');
    //                 }
    //             }
    //         });
        
    //     });
    // })
</script>
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
                     url1:"..themes/dpgreen/cart-detail", 
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
                          // alert("Product has been Added into Cart"); 
                          // window.location = '/cart-detail';
                          if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                              window.location = '/cart-detail';
                          }else{
                              location.reload();
                          }

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
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                // $.ajax({  
                //      url:"action.php",  
                //      method:"POST",  
                //      dataType:"json",  
                //      data:{product_id:product_id, action:action},  
                //      success:function(data){  
                //           $('#order_table').html(data.order_table);  
                //           $('.badge').text(data.cart_item);  
                //      }  
                // });  
                // alert(product_id);

                // var xhttp = new XMLHttpRequest();
                // xhttp.onreadystatechange = function() {
                //   if (this.readyState == 4 && this.status == 200) {
                //    // document.getElementById("demo").innerHTML = this.responseText;
                //    // alert(this.responseText);
                //    // alert('thanh cong.');
                //    window.location.href = "/cart-payment";
                //   }
                // };
                // xhttp.open("POST", "/themes/dpgreen/ajax-remove-cart.php", true);
                // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // xhttp.send("action1=add_cart&product_id="+product_id+"&action=remove");
                // xhttp.send();

                 $.ajax({  
                     url:"../functions/action_cart_tmp.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
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
           if(quantity != '')  
           {  
                // $.ajax({  
                //      url :"action.php",  
                //      method:"POST",  
                //      dataType:"json",  
                //      data:{product_id:product_id, quantity:quantity, action:action},  
                //      success:function(data){  
                //           $('#order_table').html(data.order_table);  
                //      }  
                // });

                // alert(quantity);  
                //  var xhttp = new XMLHttpRequest();
                // xhttp.onreadystatechange = function() {
                //   if (this.readyState == 4 && this.status == 200) {
                //    // document.getElementById("demo").innerHTML = this.responseText;
                //    // alert(this.responseText);
                //    // alert('thanh cong.');
                //    setTimeout(function(){ window.location.href = "/cart-payment"; }, 2000);
                //   }
                // };
                // xhttp.open("POST", "/themes/dpgreen/ajax-quantity-cart.php", true);
                // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // xhttp.send("action1=add_cart&product_id="+product_id+"&quantity="+quantity+"&action=quantity_change");
                // xhttp.send();

                 $.ajax({  
                     url :"../functions/action_cart_tmp.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                }); 
           }  
      });  
 });  
 </script>
<style>
    .loading{

    }

    #Content-Payment {
    	/*margin-top: 130px;*/
    }
</style>
<?php 
	if (isset($_POST['txtName'])){
		$cart->payment1();
		?>
		<!-- <script type="text/javascript">
			alert('Đặt hàng thành công');
		</script> -->
		<?php 
	}
?>

<div id="Content-Payment">
    <div class="Center-Width">
        <div class="Infor-Width">
            <div class="box_payment">
            <div class="container">
              <?php include DIR_BREADCRUMS."MS_BREADCRUMS_ARIOTOYS_0001.php";?>
              <h1 class="title-cart">THANH TOÁN</h1>
            	 <div class="row" id="Content-mainSlide">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="title_form">
                            <h1 style="margin:0px; font-size:22px;padding-bottom: 15px;">Địa chỉ giao hàng</h1>
                        </div>
                        <br>
                        <form action="" method="POST" role="form" id="formPayment">
                            <div class="form-group">
                                <label for="inputTxtName">Họ tên</label>
                                <input type="text" class="form-control" name="txtName" id="inputTxtName" placeholder="Nhập Họ Tên" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="txtEmail" id="inputTxtEmail" placeholder="Nhập Email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Điện thoại <span style="color:#C03;">(*)</span></label>
                                <input type="tel" class="form-control" name="txtPhone" id="inputTxtPhone" placeholder="Nhập Số Điện Thoại" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ <span style="color:#C03;">(*)</span></label>
                                <input type="text" class="form-control" name="txtAddress" id="inputTxtAddress" placeholder="Nhập Địa Chỉ Nhận Hàng" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú	</label>
                                <textarea name="txtNote" id="inputTxtNote" name="txtNote" class="form-control" rows="3" placeholder="Ghi chú đơn hàng"></textarea>
                            </div>
                        
                            <button type="submit" name="complete-cart" class="btn btn-primary" id="submitPayment" style="padding:3px 30px; font-weight:bold; font-size:16px; margin-bottom:15px;" >Hoàn Tất Mua Hàng</button>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 infor_cart">
                    	<div class="title_form">
                        	<p style="font-size:22px;padding-bottom: 20px;">Thông tin đơn hàng</p>
                        </div>
                        <br>
                        <div class="table-responsive" id="order_table">  
                               <table class="table table-bordered">  
                                    <tr>  
                                         <th width="60%" style="font-weight: bold;">Sản phẩm</th>  
                                         <th width="40%" style="font-weight: bold;">Đơn giá</th>  
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
                                         <td align="right"><?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?> VNĐ</td>  
                                    </tr>  
                                    <?php  
                                              $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                         }  
                                    ?>  
                                    <tr>  
                                         <td align="left" style="font-weight: bold;">Tổng tiền</td>  
                                         <td align="right" style="font-weight: bold;"><?php echo number_format($total, 2); ?> VNĐ</td>  
                                    </tr>    
                                    <?php  
                                    }  
                                    ?>  
                               </table>  
                          </div>
                        <!-- <a class="btn btn-default pull-right" href="/gio-hang" role="button" style="background-color:#48BD2B; border:none; font-weight:bold; color:#fff;">Mua Hàng Tiếp</a> -->
                    </div>
                </div>
            </div>
               
            </div>
        </div>
    </div>
</div>