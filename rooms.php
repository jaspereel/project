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
  <title>房型資訊 - J's Hotel 台北傑斯旅店</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/icon/logo_black.png" width="150" alt="logo_banner"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"><span class="oi oi-menu"></span> Menu</button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="news.php" class="nav-link">最新消息</a></li>
          <li class="nav-item active"><a href="rooms.php" class="nav-link">房型資訊</a></li>
          <li class="nav-item"><a href="traffic.php" class="nav-link">交通資訊</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">聯絡我們</a></li>
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

  <div class="jumbotron_rooms jumbotron-fluid">
    <div class="container">
      <h1 class="display-4" style="text-shadow: #2e5266 3px 3px 3px;">房型資訊</h1>
      <p class="lead" style="text-shadow: #2e5266 3px 3px 3px;">Rooms</p>
    </div>
  </div>

  <section class="bg-bluewhite py-5">
    <div class="container">
      <ul class="list-unstyled">
        <?php
        $rooms = select("room", "1");
        foreach ($rooms as $room) {
        ?>
          <li class="media d-flex flex-column flex-lg-row my-3">
            <img src="images/room/<?= $room['picture_url_1'] ?>" class="mr-3 room_img" alt="..." />
            <div class="media-body d-flex flex-column">
              <h5 class="mt-2 mt-lg-0 mb-1"><?= $room['name'] ?></h5>
              <p class="flex-grow-1"><?= $room['introduction'] ?></p>
              <div class="text-right">
                <input type="hidden" name="id" value="<?= $room['id'] ?>">
                <button type="button" class="btn btn-bluegreen" onclick="op(this)">詳細介紹</button>
              </div>
            </div>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </section>

  <div class="room_introduction"></div>

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

  <!--Room introduction Modal Page  -->
  <script>
    var data;

    function op(e) {
      let room_id = $(e).prev('input:hidden').val()
      $.post("api.php?go=room_select", {
        room_id
      }, function(re) {
        data = JSON.parse(re);

        $('.room_introduction').html(`
        <div id="room_modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>${data[0].name}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div id="carouselExampleControls" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/room/${data[0].picture_url_1}" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/room/${data[0].picture_url_2}" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/room/${data[0].picture_url_3}" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/room/${data[0].picture_url_4}" class="d-block w-100" alt="..." />
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <table class="w-100 my-3">
                <tr>
                  <td class="bg-bluegreen table_border_title_up text-white pl-2" width="15%">入住人數</td>
                  <td class="table_border_content pl-2" width="25%">${data[0].max_person}人</td>
                  <td class="bg-bluegreen table_border_title_up text-white pl-2" width="15%">客房大小</td>
                  <td class="table_border_content pl-2" width="25%">${data[0].room_size}</td>
                </tr>
                <tr>
                  <td class="bg-bluegreen table_border_title_down text-white pl-2" width="15%">客房數</td>
                  <td class="table_border_content pl-2">${data[0].total_stock}間</td>
                  <td class="bg-bluegreen table_border_title_down text-white pl-2" width="15%">床鋪尺寸</td>
                  <td class="table_border_content pl-2">${data[0].bed_size}</td>
                </tr>
              </table>
            </div>

            <div class="col-12 col-lg-6">
              <h6>客房設備</h6>
              <ul>
                <li>浴缸</li>
                <li>電視</li>
                <li>萬用轉接頭</li>
                <li>礦泉水、茶包</li>
                <li>牙刷組(牙膏/牙刷/牙線)</li>
                <li>梳妝組(化妝棉/棉棒組/梳子/髮圈)</li>
                <li>沐浴組(沐浴/洗髮/潤髮/洗面)</li>
                <li>擦澡巾</li>
                <li>萬用轉接頭</li>
                <li>礦泉水</li>
                <li>茶包</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
        `)
        $('#room_modal').modal()
      });
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