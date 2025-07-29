<?php
    if(isset($_SESSION['user_name_gbvn'])){
        echo '<script type="text/javascript">window.location.href = "/";</script>';
    }
?>
<?php 
    $message = "";

    function dangky () {
        global $conn_vn;
        global $message;
        if (isset($_POST['register'])) {
            $check = 'true';
            $name = ($_POST['name']==NULL) ? '' : trim($_POST['name']);
            $email = ($_POST['email']==NULL) ? '' : $_POST['email'];
            $phone = ($_POST['phone']==NULL) ? '' : $_POST['phone'];
            $birthday = ($_POST['birthday']==NULL) ? '' : $_POST['birthday'];
            $pass1 = ($_POST['pass1']==NULL) ? '' : $_POST['pass1'];
            $pass2 = ($_POST['pass2']==NULL) ? '' : $_POST['pass2'];
            $time = date('Y-m-d H:i:s');
            $ask = password_hash(trim($_POST['ask']), PASSWORD_DEFAULT);

            // Check email isset
            $sql_email = "SELECT * FROM user Where user_email = '$email'";
            $result_email = mysqli_query($conn_vn, $sql_email);
            $row_email = mysqli_num_rows($result_email);

            if ($row_email > 0) {
                $check = "false";
                $message .= "<div class='alert alert-danger'>Email đã tồn tại</div>";
            }

            if ($pass1 != $pass2) {
                $check = "false";
                $message .= "<div class='alert alert-danger'>Mật khẩu không khớp</div>";
            }

            if ($check == "true") {
                $pass = password_hash($pass1, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user (user_name, user_email, user_phone, user_birthday, user_password, time, ask) VALUES ('$name', '$email', '$phone', '$birthday', '$pass', '$time', '$ask')";
                $result = mysqli_query($conn_vn, $sql) or die('error :');
                $sql_user = "SELECT * FROM user Where user_email = '$email'";
                $result_user = mysqli_query($conn_vn, $sql_user);
                $row_user = mysqli_fetch_assoc($result_user);
                $_SESSION['user_id_gbvn'] = $row_user['user_id'];
                $_SESSION['user_email_gbvn'] = $row_user['user_email'];
                $_SESSION['user_name_gbvn'] = $row_user['user_name'];
                echo '<script type="text/javascript">alert(\'Bạn đã đăng ký thành công! Mời bạn đăng nhập\'); window.location.href = "/dang-nhap";</script>';
            }
        }
    }

    dangky();
?>
<?php 
    $message_login = '';

    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    function dangnhap () {
        global $conn_vn;
        global $message_login;
        if (isset($_POST['login'])) {
            $email = ($_POST['email']==NULL) ? '' : $_POST['email'];
            $pass = ($_POST['pass']==NULL) ? '' : $_POST['pass'];

            $sql = "SELECT * FROM user Where user_email = '$email'";
            $result = mysqli_query($conn_vn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 0) {
                $message_login = "<div class='alert alert-danger'>Mật khẩu hoặc Tên đăng nhập không đúng</div>";
            } else {
                $row = mysqli_fetch_assoc($result);
                $pass_hash = $row['user_password'];
                if (password_verify($pass, $pass_hash)) {
                    $_SESSION['user_id_gbvn'] = $row['user_id'];
                    $_SESSION['user_name_gbvn'] = $row['user_name'];
                    $_SESSION['session_id'] = session_id();
                    if (isset($_POST['rememberme'])) {
                        $identify = randomString(20);
                        $token = randomString(30);
                        $cooki = $identify . ':' . $token;

                        setcookie('user_id_trichdan', $cooki, time() + 2592000);
                        $sql_me = "UPDATE user SET remember_me_identify = '$identify', remember_me_token = '$token' Where user_id = " . $row['user_id'];
                        $result_me = mysqli_query($conn_vn, $sql_me);
                    }
                    echo '<script type="text/javascript">alert(\'Bạn đã đăng nhập thành công!\'); window.location.href = "/";</script>';
                } else {
                    $message_login = "<div class='alert alert-danger'>Mật khẩu hoặc Tên đăng nhập không đúng</div>";
                }
            }
        }
    }

    dangnhap();
?>
<?php 
  function forgetPass () {
    global $conn_vn;
    if (isset($_POST['forget'])) {
      $email = $_POST['email'];
      $ask = $_POST['ask'];
      $sql = "SELECT * FROM user WHERE user_email = '$email'";
      $result = mysqli_query($conn_vn, $sql);
      $num = mysqli_num_rows($result);
      if ($num == 0) {
         echo '<script type="text/javascript">alert(\'Tài khoản này không tồn tại.\');</script>';
         return false;
      } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['ask'] == '') {
          echo '<script type="text/javascript">alert(\'Tài khoản này không hợp lệ.\');</script>';
        } else {
          $ask_hash = $row['ask'];
          if (password_verify($ask, $ask_hash)) {
            $_SESSION['user_id_gbvn'] = $row['user_id'];
            $_SESSION['user_name_gbvn'] = $row['user_name'];
            echo '<script type="text/javascript">alert(\'Mời bạn đổi mật khẩu.\');window.location.href = "/doi-mat-khau";</script>';
          } else {
            echo '<script type="text/javascript">alert(\'Thông tin nhập vào không hợp lệ.\');</script>';
          }
        }
      }
    }
  }
  forgetPass();
?>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '237778183823450',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.0' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      // statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', {fields: 'email,name,last_name,birthday'}, function(response) {
      var json = JSON.stringify(response);
      console.log('Successful login for: ' + response.name);
      // document.getElementById('status').innerHTML =
      //   'Thanks for logging in, ' + json + '!';

      var id = response.id;
      var name = response.name;
      var email = response.email;
      // alert(name);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var bien = this.responseText;
         // alert(bien);
         if (bien == 'ok') {
          alert('Login thành công.');
          window.location.href = "/";
         } else if (bien == 'has') {
          alert('Xin lỗi, Email đã tồn tại.');
         } else {
          alert('Login lỗi');
         }
        }
      };
      xhttp.open("GET", "/functions/ajax/login-fb.php?id="+id+"&name="+name+"&email="+email, true);
      xhttp.send();
      
        });
  }
</script>
<div class="gb-register_excel">
    <div class="gb-register_excel-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="gb-register_excel-top-right">
                        <form action="" method="post">
                            <div class="row">
                                <?= $message_login ?>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox"> Ghi nhớ tài khoản
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="pass" class="form-control" placeholder="Nhập password" required>
                                    </div>
                                    <div class="form-group">
                                        <a href="#0" data-toggle="modal" data-target="#khoiphucmatkhau">Quên mật khẩu?</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-dangnhap_excel" name="login">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gb-dangky_tour">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="gb-dangky_tour-left">
                        <img src="/images/AVA.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="gb-dangky_tour-right">
                        <div class="gb-dangky_tour-right-top">
                            <p>Hoặc đăng nhập bằng tài khoản sau:</p>
                            <!-- <ul>
                                <li><a href="" class="btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                <li><a href="" class="btn-google"><i class="fa fa-google-plus" aria-hidden="true"></i> Google +</a></li>
                            </ul> -->
                            <ul>
                                <li>
                                    <!-- <a href="" class="btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a> -->
                                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                                    </fb:login-button>
                                </li>
                                <li><a href="/login-go.html" class="btn-google"><i class="fa fa-google-plus" aria-hidden="true"></i> Google +</a></li>
                            </ul>
                        </div>
                        <div class="gb-form-dangky">
                            <h3>Đăng ký</h3>
                            <form action="" method="post">
                                <?= $message ?>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại" value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : '' ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="birthday" class="form-control" placeholder="Ngày sinh" value="<?= (isset($_POST['birthday'])) ? $_POST['birthday'] : '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass1" class="form-control" placeholder="Nhập mật khẩu" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass2" class="form-control" placeholder="Nhập lại mật khẩu" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Câu hỏi bảo mật: Bạn thích con gì?" name="ask" required="" value='<?php if(isset($_POST['ask']) && $_POST['ask'] != NULL){ echo $_POST['ask']; } ?>' >
                                </div>
                                <div class="form-group">
                                    <p>Bằng cách nhấp vào Tạo tài khoản, bạn đồng ý với <a href="#0"  data-toggle="modal" data-target="#product_view">Điều khoản & dịch vụ</a> của chúng tôi</p>
                                </div>
                                <div class="form-group">
                                    <button name="register" class="btn btn-taotaikhoan">Tạo tài khoản</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODAL DDIEEFU KHAIORN-->
<div class="gb-quickview_noithat">
    <div class="modal fade product_view" id="product_view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <div class="modal-body">
                    <div class="uni-single-car-gallery-images">
                        <p>
                            Về tài khoản sử dụng (TKSD): Khi đăng ký tài khoản Lakita ID, người sử dụng (NSD) phải cung cấp đầy đủ và chính xác thông tin về Tên, Email, Số điện thoại, Mật khẩu. Đây là những thông tin bắt buộc liên quan tới việc hỗ trợ NSD trong quá trình sử dụng dịch vụ tại Lakita.com.vn. Vì vậy khi có những rủi ro, mất mát sau này, chúng tôi chỉ tiếp nhận những trường hợp điền đúng và đầy đủ những thông tin trên. Những trường hợp điền thiếu thông tin hoặc thông tin sai sự thật sẽ không được giải quyết. Những thông tin này sẽ được dùng làm căn cứ để hỗ trợ giải quyết.
                            <br>

                            Nếu NSD cung cấp bất kỳ thông tin nào không trung thực hoặc không chính xác, hoặc nếu chúng tôi có cơ sở để nghi ngờ rằng thông tin đó không phải là thông tin trung thực hoặc không chính xác, chúng tôi có quyền đình chỉ tạm thời để xác minh hoặc chấm dứt việc sử dụng Tài khoản của NSD và từ chối toàn bộ việc sử dụng Dịch vụ (hoặc bất kỳ phần nào của Dịch vụ) tại thời điểm hiện tại hoặc sau này mà không phải chịu bất cứ trách nhiệm nào đối với NSD.
                            <br>
                            Mật khẩu của tài khoản (MKTK): Trong phần quản lý tài khoản, đối với một tài khoản, NSD sẽ có một mật khẩu. Mật khẩu được sử dụng để đăng nhập vào các website và các dịch vụ trong hệ thống của Lakita.vn. NSD có trách nhiệm phải tự mình bảo quản mật khẩu, nếu mật khẩu bị lộ ra ngoài dưới bất kỳ hình thức nào, Lakita.com.vn sẽ không chịu trách nhiệm về mọi tổn thất phát sinh.
                            <br>
                            Tuyệt đối không sử dụng bất kỳ chương trình, công cụ hay hình thức nào khác để can thiệp vào các dịch vụ, khóa học trong hệ thống Lakita.com.vn. Mọi vi phạm khi bị phát hiện sẽ bị xóa tài khoản và có thể xử lý theo quy định của pháp luật.
                            <br>
                            Nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt động nào nhằm can thiệp, phá hoại hay xâm nhập vào dữ liệu của các dịch vụ, khóa học trong hệ thống của Lakita.com.vn. Nghiêm cấm việc sử dụng chung tài khoản. Việc trên 2 người cùng sử dụng chung một tài khoản khi bị phát hiện sẽ bị xóa tài khoản ngay lập tức.
                            <br>
                            Nghiêm cấm việc phát tán nội dung các bài học trên hệ thống của Lakita.com.vn ra bên ngoài. Mọi vi phạm khi bị phát hiện sẽ bị xóa tài khoản và có thể xử lý theo quy định của pháp luật về việc vi phạm bản quyền.
                            <br>
                            Không được có bất kỳ hành vi nào nhằm đăng nhập trái phép hoặc tìm cách đăng nhập trái phép cũng như gây thiệt hại cho hệ thống máy chủ của Lakita.com.vn và các dịch vụ, khóa học trong hệ thống. Mọi hành vi này đều bị xem là những hành vi phá hoại tài sản của người khác và sẽ bị tước bỏ mọi quyền lợi đối với tài khoàn cũng như sẽ bị truy tố trước pháp luật nếu cần thiết.
                            <br>
                            Khi giao tiếp với người dùng khác trong hệ thống dịch vụ của Lakita.com.vn, NSD không được quấy rối, chửi bới, làm phiền hay có bất kỳ hành vi thiếu văn hoá nào đối với người khác. Tuyệt đối nghiêm cấm việc xúc phạm, nhạo báng người khác dưới bất kỳ hình thức nào (nhạo báng, chê bai, kỳ thị tôn giáo, giới tính, sắc tộc...).
                            <br>
                            Tuyệt đối nghiêm cấm mọi hành vi mạo nhận hay cố ý làm người khác tưởng lầm mình là một người sử dụng khác trong hệ thống dịch vụ của Lakita.com.vn. Mọi hành vi vi phạm sẽ bị xử lý hoặc xóa tài khoản.
                            <br>
                            Khi phát hiện những vi phạm như vi phạm bản quyền, hoặc những lỗi vi phạm quy định khác, Lakita.com.vn có quyền sử dụng những thông tin mà NSD cung cấp khi đăng ký tài khoản để chuyển cho Cơ quan chức năng giải quyết theo quy định của pháp luật.
                            <br>
                            Trong những trường hợp bất khả kháng như chập điện, hư hỏng phần cứng, phần mềm, hoặc do thiên tai .v.v. NSD phải chấp nhận những thiệt hại nếu có.
                            <br>
                            Tuyệt đối nghiêm cấm mọi hành vi tuyên truyền, chống phá và xuyên tạc chính quyền, thể chế chính trị, và các chính sách của Nhà nước... Trường hợp phát hiện, không những bị xóa bỏ tài khoản mà chúng tôi còn có thể cung cấp thông tin của NSD đó cho các cơ quan chức năng để xử lý theo pháp luật.
                            <br>
                            Tuyệt đối không bàn luận về các vấn đề chính trị, kỳ thị tôn giao, kỳ thị sắc tộc. Không có những hành vi, thái độ làm tổn hại đến uy tín của các sản phẩm, dịch vụ, khóa học trong hệ thống Lakita.com.vn dưới bất kỳ hình thức nào, phương thức nào. Mọi vi phạm sẽ bị tước bỏ mọi quyền lợi liên quan đối với tài khoản hoặc xử lý trước pháp luật nếu cần thiết. Mọi thông tin cá nhân của NSD sẽ được chúng tôi bảo mật, không tiết lộ ra ngoài. Chúng tôi không bán hay trao đổi những thông tin này với bất kỳ một bên thứ ba nào khác. Như trên đã nói, mọi thông tin đăng ký của NSD sẽ được bảo mật, nhưng trong trường hợp cơ quan chức năng yêu cầu, chúng tôi sẽ buộc phải cung cấp những thông tin này cho các cơ quan chức năng.
                            <br>
                            Lakita.com.vn có toàn quyền xóa, sửa chữa hay thay đổi các dữ liệu, thông tin tài khoản của NSD trong các trường hợp người đó vi phạm những qui định kể trên mà không cần sự đồng ý của người sử dụng.
                            <br>
                            Lakita.com.vn có thể thay đổi, bổ sung hoặc sửa chữa thỏa thuận này bất cứ lúc nào và sẽ công bố rõ trên Website hoặc các kênh truyền thông chính thức khác của Lakita.com.vn.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--KHÔI PHỤC MẬT KHẨU-->
<div class="gb-quickview_noithat">
    <div class="modal fade product_view" id="khoiphucmatkhau">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Khôi phục mật khẩu</h3>
                    <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <p>Nhập email vào ô bên dưới để tiếp tục</p>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
                        </div>
                        <p>Nhập câu hỏi bảo mật vào ô bên dưới</p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="ask" placeholder="Bạn thích con gì nhất" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-xacnhan" name="forget">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>