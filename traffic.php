<?php
require_once("sql.php");
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
  <title>交通資訊 - J's Hotel 台北傑斯旅店</title>
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
          <li class="nav-item active">
            <a href="traffic.php" class="nav-link">交通資訊</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">聯絡我們</a>
          </li>
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

  <div class="jumbotron_traffic jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" style="text-shadow: #2e5266 3px 3px 3px;">
        交通資訊
      </h1>
      <p class="lead" style="text-shadow: #2e5266 3px 3px 3px;">
        Transporation
      </p>
    </div>
  </div>

  <section id="section_100" class="bg-bluewhite">
    <div class="container h-100 d-flex justify-content-lg-center align-items-lg-center py-5">
      <div class="row">
        <div class="col-12 col-lg-5">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7080213498575!2d121.41714895088255!3d25.043980983889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7bec9ad74b1%3A0xa639904a89f26435!2z5Yue5YuV6YOo5Yue5YuV5Yqb55m85bGV572y5YyX5Z-65a6c6Iqx6YeR6aas5YiG572y5rOw5bGx6IG35qWt6KiT57e05aC0!5e0!3m2!1szh-TW!2stw!4v1577175412482!5m2!1szh-TW!2stw" width="400" height="0" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-12 col-lg mt-3 mt-lg-0">
          <div class="media d-flex flex-column align-items-center flex-lg-row align-items-lg-start ">
            <div class="text-center">
              <img src="images/icon/traffic-train.png" class="align-self-start" alt="traffic-train" style="width: 100px" />
              <h5 class="mt-0">大眾運輸</h5>
            </div>
            <div class="media-body ml-3 border border-bluegreen p-2">
              <h5>從桃園機場出發</h5>
              <p class="p-2">
                搭乘桃園捷運機場線至 A6泰山貴和站 下車後可步行或轉搭公車抵達本旅店
              </p>
              <h5>從台北市區出發</h5>
              <p class="p-2">
                搭乘台北捷運至台北車站或北門站轉乘桃園捷運機場線至 A6泰山貴和站 下車後可步行或轉搭公車抵達本旅店
              </p>
              <p class="p-2">
                A.步行：<br />
                往明志路三段方向步行15分鐘後於工專路左轉即可抵達
              </p>
              <p class="p-2">
                B.轉搭公車：<br />
                於捷運泰山貴和站(明志路)站牌處轉搭公車637.638.797.798.801.858.880.883.1503於明志科技大學站下車
              </p>
            </div>
          </div>
          <div class="media d-flex flex-column align-items-center flex-lg-row mt-3">
            <div class="text-center">
              <img src="images/icon/traffic-car.png" class="align-self-start" alt="traffic-train" style="width: 100px" />
              <h5 class="mt-0">自行開車</h5>
            </div>
            <div class="media-body ml-3 border border-bluegreen p-2">
              <h5>高速公路</h5>
              <p class="p-2">
                中山高速公路(國道一號)於五股交流道下，右轉楓江路並於明志路一段路口左轉，沿明志路開至工專路口右轉即可抵達。
              </p>
            </div>
          </div>
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