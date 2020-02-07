<?php
require_once("sql.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawsome/css/fontawesome.css">
  <!-- 日期選單套件   -->
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.standalone.css">
  <!-- Icon -->
  <link rel="shortcut icon" href="images/icon/logo_icon.ico" />
  <title>聯絡我們 - J's Hotel 台北傑斯旅店</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/icon/logo_black.png" width="150" alt="logo_banner"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="news.php" class="nav-link">最新消息</a></li>
          <li class="nav-item"><a href="rooms.php" class="nav-link">房型資訊</a></li>
          <li class="nav-item"><a href="traffic.php" class="nav-link">交通資訊</a></li>
          <li class="nav-item active"><a href="contact.php" class="nav-link">聯絡我們</a></li>
          <?php
          if (empty($_SESSION['member'])) {
            echo '<li class="nav-item"><a class="nav-link" href="#member_login" data-toggle="modal">會員專區</a></li>';
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

  <div class="jumbotron_contact jumbotron-fluid">

    <div class="container">
      <h1 class="display-4" style="text-shadow: #2e5266 3px 3px 3px;">聯絡我們</h1>
      <p class="lead" style="text-shadow: #2e5266 3px 3px 3px;">Contact Us</p>
    </div>
  </div>


  <section class="bg-bluewhite section_75">
    <div class="container h-100 d-lg-flex flex-lg-column justify-content-lg-center">
      <div class="row flex-column flex-lg-row">
        <div class="col-12 col-lg-5 text-center p-4 p-lg-0">
          <img src="images/icon/service.png" alt="service" style="width: 200px;">
        </div>
        <div class="col-12 col-lg-7 pt-3 p-3 pt-lg-0">

          <form method="POST" action="customer_mail.php">
            <p>感謝您對J's Hotel 台北傑斯旅店的支持!如有需要為您服務的地方或建議，歡迎留言讓我們知道，謝謝!</p>
            <div class="form-group">
              <label for="customer_name">姓名</label>
              <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="請輸入姓名" required>
            </div>
            <div class="form-group">
              <label for="customer_email">電子信箱</label>
              <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="請輸入電子信箱" required>
            </div>
            <div class="form-group">
              <label for="customer_phone">聯絡電話</label>
              <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="請輸入聯絡電話" required>
            </div>
            <div class="form-group">
              <label for="customer_require">需求內容</label>
              <textarea class="form-control" id="customer_require" name="customer_require" rows="3" placeholder="請輸入需求內容" required></textarea>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-bluegreen">送出</button>
            </div>
          </form>
        </div>
      </div>
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