<?php
    //session_start();
    if($acc->isLoginAdmin()){
        $acc->redirect('index.php');
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<!-- Latest compiled and minified CSS & JS -->

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
    $(function(){
        $("#formLogin").on("submit",function(e){
            e.preventDefault();
            var form = $(this);
            var formdata = false;
            if (window.FormData){
                formdata = new FormData(form[0]);
            }
            $.ajax({
                url:"ajax.php",
                type:"post",
                data: formdata ? formdata : form.serialize(),
                cache       : false,
                contentType : false,
                processData : false,
                dataType:"json",
                success:function(json){
                    if (json['success']) {
                        alert(json['success']);
                        window.location.href = json['url'];
                    }
                    if(json['error']){
                        alert(json['error']);
                    }
                }
            });
        });
    })
</script>
</head>
<body>  
<div id="divWrapper">
    <div class="coverFormLogin">
        <form method="post" class="formLogin" id="formLogin">
            <input type="hidden" name="action" value="loginAdmin">
            <img src="image/logo.png" alt="GoldBridge" class="logoLogin" /> 
            <div class="boxForm">
                <img src="image/userLogin.jpg" class="iconLogin" />
                <input type="text" placeholder="Tên tài khoản..." class="txtLogin" name="accountLogin" required/>
            </div>          
            <div class="boxForm">
                <img src="image/passLogin.jpg" class="iconLogin" />
                <input type="password" value="" placeholder="Mật khẩu" class="txtLogin" name="passwordLogin" required/>
            </div>
            <div class="rowForm">
                <input type="checkbox" class="ckbForm" name="remember"/><label>Duy trì đăng nhập</label>              
            </div>          
            <button type="submit" class="btnLogin" value="1" name="btnLogin">Đăng nhập</button>
        </form>
        <p class="endLogin">Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam<br /><em style="text-decoration:underline;">Điện thoại:</em> <strong>0437.666.777</strong> - <em style="text-decoration:underline;">Hotline:</em> <strong>01667.666.777</strong><br /><em style="text-decoration:underline;">Website:</em> goldbridgevn.com - laptrinhweb.net.vn</p>
    </div><!--end coverFormLogin-->    
</div><!--end divWrapper-->
</body>
</html>

