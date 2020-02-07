<?php
require_once("sql.php");
if (!empty($_SESSION['member'])) plo("index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawsome/css/fontawesome.css">
  <!-- 日期選單套件   -->
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.standalone.css">
  <!-- Icon -->
  <link rel="shortcut icon" href="images/icon/logo_icon.ico" />
  <title>註冊會員 - J's Hotel 台北傑斯旅店</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/icon/logo_black.png" width="150" alt="logo_banner"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"><span class="oi oi-menu"></span> Menu</button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="news.php" class="nav-link">最新消息</a>
          </li>
          <li class="nav-item">
            <a href="rooms.php" class="nav-link">房型資訊</a>
          </li>
          <li class="nav-item ">
            <a href="traffic.php" class="nav-link">交通資訊</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">聯絡我們</a>
          </li>
          <?php
          if (empty($_SESSION['member'])) {
            echo '<li class="nav-item"><a class="nav-link" href="#member_login" data-toggle="modal"><i class="fas fa-user mr-2"></i>會員專區</a></li>';
          } else {
            echo '<li class="nav-item"><a class="nav-link" href="member_backend.php"><i class="fas fa-user mr-2"></i>' . $_SESSION['member'] . '</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Member Login Modal Page  -->
  <div class="modal fade bd-example-modal-lg" id="member_login" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            會員註冊/登入
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row flex-column flex-sm-row">
            <div class="col-12 col-lg-6 order-2 order-lg-1 py-5 px-5 d-flex flex-column" style="border-right: rgb(228, 230, 222) 0.3px solid;">
              <div class="text-center ">
                <img src="images/icon/register.png" alt="register_icon" style="width: 100px;" />
                <span class="mx-3 font-weight-bold">我還不是會員</span>
              </div>
              <div class="text-center py-4 flex-grow-1">
                J's Hotel 傑斯旅店<br />
                擁有高品質的住宿環境<br />
                以及一覽臺北夜景的絕佳地理位置<br />
                想要給自己放個假嗎?<br />
                趕快點擊下方的註冊會員<br />
                挑選你所喜愛的房型下訂吧!<br />
              </div>
              <div class="text-center d-flex">
                <button type="button" class="btn btn-bluegreen flex-grow-1" data-dismiss="modal" onclick="location.href='register.php'">註冊會員</button>
              </div>
            </div>
            <div class="col-12 col-lg-6 order-1 order-lg-2 py-5 px-5 flex-column">
              <form method="POST" action="api.php?go=member_login">
                <div class="text-center">
                  <img src="images/icon/login.png" alt="login_icon" style="width: 100px;" />
                  <span class="mx-3 font-weight-bold">我已經是會員</span>
                </div>
                <div class="form-group py-4">
                  <label for="member_login_email">Email</label>
                  <input type="text" class="form-control" id="member_login_email" name="member_login_email" placeholder="請輸入Email" />
                </div>
                <div class="form-group">
                  <label for="member_login_password">密碼</label>
                  <input type="password" class="form-control" id="member_login_password" name="member_login_password" placeholder="請輸入密碼" />
                </div>
                <div class="text-right d-flex">
                  <button type="submit" class="btn btn-bluegreen flex-grow-1">
                    登入
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Admin Login Modal Page  -->
  <div id="admin_login" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>管理者登入</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class=" py-5 px-5 flex-column">
            <form method="POST" action="api.php?go=admin_login">
              <div class="text-center">
                <img src="images/icon/admin.png" alt="admin_icon" style="width: 100px;" />
              </div>
              <div class="form-group py-4">
                <label for="admin_login_id">帳號</label>
                <input type="text" class="form-control" id="admin_login_id" name="admin_login_id" placeholder="請輸入帳號" />
              </div>
              <div class="form-group">
                <label for="admin_login_password">密碼</label>
                <input type="password" class="form-control" id="admin_login_password" name="admin_login_password" placeholder="請輸入密碼" />
              </div>
              <div class="text-right d-flex">
                <button type="submit" class="btn btn-bluegreen flex-grow-1">登入</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="jumbotron_register jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" style="text-shadow: #2e5266 3px 3px 3px;">
        會員註冊
      </h1>
      <p class="lead" style="text-shadow: #2e5266 3px 3px 3px;">
        Register
      </p>
    </div>
  </div>

  <section class="bg-bluewhite section_75">
    <div class="container h-100 d-lg-flex flex-lg-column justify-content-lg-center py-5">
      <form id="register" method="POST" action="api.php?go=member_register" onsubmit="return chk()">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="請輸入Email" required>
          <b id="chkemail" style="color:crimson; font-size:10px;"></b>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="password">密碼</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入英數字混合八位數密碼" required>
            <b id="password_alert" style="color:crimson; font-size:10px;"></b>
          </div>
          <div class="form-group col-md-6">
            <label for="checkpwd">確認密碼</label>
            <input type="password" class="form-control" id="checkpwd" placeholder="請再輸入一次密碼" required>
            <b id="check_alert" style="color:crimson; font-size:10px;"></b>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="last_name">姓氏</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="請輸入姓氏" required>
          </div>
          <div class="form-group col-md-6">
            <label for="first_name">名字</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="請輸入名字" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="gender">性別</label>
            <select required id="gender" name="gender" class="form-control">
              <option value="" selected disabled hidden>請選擇性別</option>
              <option value="男">男性</option>
              <option value="女">女性</option>
            </select>
          </div>
          <div class="form-group col-md-6 input-daterange " id="datepicker">
            <div>
              <label for="birthday">出生年月日</label>
              <input type="text" class="form-control" id="birthday" name="birthday" placeholder="請點選日期" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="phone">手機號碼</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="請輸入十位數手機號碼" required>
          <b id="phone_alert" style="color:crimson; font-size:10px;"></b>
        </div>
        <div class="form-group">
          <label for="address">地址</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="請輸入地址" required>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-bluegreen">註冊</button>
        </div>
    </div>

    </form>

    </div>
  </section>
  <footer class="bg-midnight py-4 text-white">
    <div class="container d-flex justify-content-between">
      <ul class="list-unstyled">
        <li>J's Hotel Taipei 台北傑斯旅店</li>
        <li>243 新北市泰山區致遠新村55之1號</li>
        <li>T 02-2901-8274</li>
      </ul>
      <ul class="list-unstyled">
        <li>
          <a href="#admin_login" data-toggle="modal"><img src="images/icon/logo_circle.png" alt="service" style="width: 70px;"></img></a>
        </li>
      </ul>
    </div>
  </footer>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!--Font Awesome  -->
  <script src="plugins/fontawsome/js/all.min.js"></script>
  <!-- 日期選單套件   -->
  <script src="plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="plugins/datepicker/js/bootstrap-datepicker.zh-TW.min.js"></script>


  <script>
    // 日期選單套件
    $('#datepicker').datepicker({
      format: "yyyy-mm-dd",
      endDate: "yesterday",
      maxViewMode: 3,
      clearBtn: true,
      language: "zh-TW",
      orientation: "bottom left",
      todayHighlight: true,
      toggleActive: true
    });
    // 帳號密碼格式驗證
    function chk() {
      let flag = 0;
      let acc = document.getElementById('email').value;
      let pwd = document.getElementById('password').value;
      let chk = document.getElementById('checkpwd').value;
      let phone = document.getElementById('phone').value;
      let regex_password = /.*[a-z]+.*[0-9]+.*/;
      let regex_phone = /^09\d{8}$/; //開頭和結尾都需是數字

      $.post("api.php?go=checkemail", {
        acc
      }, function(re) {
        flag = (re.length == 0) ? 1 : 0;
        document.getElementById('chkemail').innerText = re;
      });

      if (pwd.length < 8) {
        document.getElementById('password_alert').innerText = '密碼請為英數字共八位數，請重新輸入'
        return false;
      } else if (!pwd.match(regex_password)) {
        document.getElementById('password_alert').innerText = '密碼請為英數字共八位數，請重新輸入'
        return false;
      } else if (pwd != chk) {
        document.getElementById('check_alert').innerText = '密碼輸入錯誤，請重新輸入'
        return false;
      } else if (!phone.match(regex_phone)) {
        document.getElementById('phone_alert').innerText = '手機號碼格式錯誤，請重新輸入'
        return false;
      } else if (flag == 0) {
        return false;
      } else if (flag == 1) {
        return true;
      }
    }
  </script>
  <!-- change Nav Logo -->
  <script>
    $show = window.innerWidth;
    if ($show < 991) {
      $(".navbar-brand>img").attr("src", "images/icon/logo_white.png");
    } else {
      $(".navbar-brand>img").attr("src", "images/icon/logo_black.png");
    }
  </script>

</body>

</html>