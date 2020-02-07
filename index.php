<?php
require_once("sql.php");
$today = date("Y-m-d");
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
  <!-- Date Picker   -->
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.standalone.css">
  <!-- Icon -->
  <link rel="shortcut icon" href="images/icon/logo_icon.ico" />
  <title>J's Hotel 台北傑斯旅店</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/icon/logo_black.png" width="150" alt="logo_banner"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
        Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="news.php" class="nav-link">最新消息</a></li>
          <li class="nav-item"><a href="rooms.php" class="nav-link">房型資訊</a></li>
          <li class="nav-item"><a href="traffic.php" class="nav-link">交通資訊</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">聯絡我們</a></li>
          <?php
          if (empty($_SESSION['email'])) {
            echo '<li class="nav-item"><a class="nav-link" href="#member_login" data-toggle="modal">會員專區</a></li>';
          } else {
            echo '<li class="nav-item"><a class="nav-link" href="member_backend.php"><i class="fas fa-user mr-2"></i>' . $_SESSION['last_name'] . $_SESSION['first_name'] . '</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Banner + Weather + Search -->
  <div class="container-fluid banner">
    <div class="container h-100">
      <div id="infomation_area" class="row flex-column flex-lg-row ">
        <div class="col-12 col-lg-6 p-3 p-lg-0"></div>
        <div class="col-12 col-lg-6">
          <div id="search_area" class="row flex-column text-white p-4">
            <div id="weather" class="col-12">
              <p class="search_area_text font-weight-bold">Today Weather</p>
              <div class="text-center d-flex justify-content-center flex-column flex-lg-row">
                <img src="" alt="weather" class="pr-3">
                <div class="my-auto">溫度 16~20℃<br> 降雨機率 20%<br></div>
              </div>
            </div>
            <div id="search" class="col-12 mt-3">
              <form>
                <div class="form-row input-daterange" id="datepicker">
                  <div class="form-group col-md-6">
                    <label for="checkout_date">入住日期</label>
                    <input type="text" class="form-control" name="checkin_date" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="checkout_date">退房日期</label>
                    <input type="text" class="form-control" name="checkout_date" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="room_people">入住人數</label>
                  <select class="form-control" id="room_people">
                    <option selected disabled>選擇人數</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <div class="d-flex">
                  <button type="submit" class="btn btn-bluegreen flex-grow-1">搜尋</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

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

  <!-- News Area -->
  <div class="jumbotron_index_news">
    <div class="d-flex justify-content-center service_area_text text-white font-weight-bold">最新消息</div>
  </div>
  <section id="index_news" class="bg-bluewhite">
    <div class="container h-100 d-lg-flex flex-lg-column justify-content-lg-center py-5">
      <?php
      $news_all = select("news", "start_day<='$today' and end_day>='$today' ORDER BY start_day DESC");
      if ($news_all) {
        foreach ($news_all as $news) {
      ?>
          <table class="mt-3 w-100">
            <tr class="border_bottom">
              <td width="20%" class="bg-bluegreen text-white text-center p-2"><?= $news['start_day'] ?></td>
              <td width="80%" class="p-2"><a href="news.php"><?= $news['title'] ?></a></td>
            </tr>
          </table>
        <?php
        }
      } else {
        ?>
        <div class=" h-100 w-100 d-flex justify-content-center align-items-center">
          <img src="images/icon/nonews.png" alt="nonews" class="img-fluid">
        </div>

      <?php
      }
      ?>

    </div>
  </section>


  <div class="jumbotron_index_facility">
    <div class="d-flex justify-content-center service_area_text text-white font-weight-bold">設施服務</div>
  </div>

  <!-- Service Area -->
  <section class="bg-bluewhite section_50">
    <div class="container h-100">
      <div class="h-100 d-flex flex-column justify-content-center">
        <div class="text-center font-weight-bold service_area_text p-4">設施</div>
        <div class="row flex-column flex-lg-row mt-lg-3">
          <div class="col-12 col-lg-6 mb-3 mb-lg-0">
            <a href="#bath_modal" data-toggle="modal"><img src="images/icon/facility_bath.jpg" width="100%" href="#bath_modal" data-toggle="modal"></img></a>
          </div>
          <div class="col-12 col-lg-6 mb-3 mb-lg-0">
            <a href="#restaurent_modal" data-toggle="modal"><img src="images/icon/facility_restaurent.jpg" width="100%"></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Facility of Bath Modal -->
  <div id="bath_modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>三溫暖浴場</h5>
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
                    <img src="images/facility/Bath1.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Bath2.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Bath3.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Bath4.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Bath5.jpg" class="d-block w-100" alt="..." />
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

            </div>

            <div class="col-12 col-lg-6">
              <p>於四樓設有浴場及三溫暖（男女）。可享受與客房不同的沐浴氛圍。結束忙碌的一天，在水氣氤氳中一洗旅途疲勞。
              </p>
              <div class="bg-bluewhite p-2">
                <p class="font-weight-bold">提供設備及衛浴用品</p>
                <ul>
                  <li>鑰匙更衣櫃</li>
                  <li>沐浴乳/洗髮精/潤髮乳/洗面乳/洗手液</li>
                  <li>化妝用品組</li>
                  <li>吹風機</li>
                  <li>飲水機</li>
                </ul>
                備註：毛巾敬請自備，浴場不提供。
              </div>
              <table class="w-100 my-3">
                <tr height="35px">
                  <td class="bg-bluegreen table_border_title_up text-white pl-2" width="15%">開放時間</td>
                  <td class="table_border_content pl-2" width="25%">全日開放(12~14時為清潔時間不開放)</td>
                </tr>
                <tr height="35px">
                  <td class="bg-bluegreen table_border_title_down text-white pl-2" width="15%">費用</td>
                  <td class="table_border_content pl-2">免費(住客專用)</td>
                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Facility of Restaurent Modal -->
  <div id="restaurent_modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>J's餐廳</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div id="carouselExampleControls2" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/facility/Res1.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Res2.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Res3.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Res4.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="images/facility/Res5.jpg" class="d-block w-100" alt="..." />
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>

            <div class="col-12 col-lg-6">
              <p>在三樓的J's餐廳，自助早餐提供豐富多彩的每日更換的麵包、沙拉、湯品、熱食、甜點等約40種菜餚。
                並於每日14:00～23:00，提供迎賓飲料及小點，讓你擁有賓至如歸的感覺。
              </p>
              <div class="bg-bluewhite p-2">
                <p class="font-weight-bold">提供菜單</p>
                <ul>
                  <li>沙拉吧</li>
                  <li>湯品</li>
                  <li>每日麵包</li>
                  <li>熱食</li>
                  <li>甜點</li>
                  <li>飲料吧</li>
                </ul>
              </div>
              <table class="w-100 my-3">
                <tr height="35px">
                  <td rowspan="2" class="bg-bluegreen table_border_title_up text-white pl-2" width="10%">開放時間</td>
                  <td class="table_border_content pl-2" width="10%">早餐</td>
                  <td class="table_border_content pl-2" width="25%">06:00~11:00 (最後進場:10:30)</td>
                </tr>
                <tr height="35px">
                  <td class="table_border_content pl-2" width="10%">迎賓吧</td>
                  <td class="table_border_content pl-2" width="25%">14:00~23:00 (最後進場:22:30)</td>
                </tr>
                <tr height="35px">
                  <td class="bg-bluegreen table_border_title_down text-white pl-2" width="10%">費用</td>
                  <td colspan="2" class="table_border_content pl-2" width="10%">早餐400元/人(需另收10%服務費)</td>

                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Service Area -->
  <section class="bg-bluewhite section_75">
    <div class="container h-100">
      <div class="h-100 d-flex flex-column justify-content-center">
        <div class="text-center font-weight-bold service_area_text p-4">服務</div>
        <div class="row flex-column flex-lg-row mt-lg-3">
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon1.png" width="100%">
            <div>客房免費無線網路</div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon2.png" width="100%">
            <div>宅配收貨服務</div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon3.png" width="100%">
            <div>寄放行李服務</div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon4.png" width="100%">
            <div>館內無障礙空間</div>
          </div>
        </div>
        <div class="row flex-column flex-lg-row mt-lg-3">
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon5.png" width="100%">
            <div>身障專用停車位</div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon6.png" width="100%">
            <div>免費AI翻譯機</div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon7.png" width="100%">
            <div>客房VOD點播系統</div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <img src="images/icon/service_icon8.png" width="100%">
            <div>多國外籍夥伴 讓您溝通無障礙</div>
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
  <!--Date Picker-->
  <script src="plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="plugins/datepicker/js/bootstrap-datepicker.zh-TW.min.js"></script>
  <script>
    $('#datepicker').datepicker({
      startDate: "today",
      format: "yyyy-mm-dd",
      maxViewMode: 3,
      clearBtn: true,
      language: "zh-TW",
      orientation: "bottom left",
      todayHighlight: true,
      toggleActive: true
    });
  </script>

  <!-- CWB API -->
  <script>
    $.getJSON("https://opendata.cwb.gov.tw/fileapi/v1/opendataapi/F-C0032-001?Authorization=CWB-B63271F6-158F-43E4-AF39-957F714B8B74&downloadType=WEB&format=JSON")
      .done(function(re) {
        weather = re.cwbopendata.dataset.location[1];
        let date = new Date(weather.weatherElement[0].time[0].startTime);
        let pic = weather.weatherElement[0].time[0].parameter.parameterValue;
        let min = weather.weatherElement[2].time[0].parameter.parameterName;
        let max = weather.weatherElement[1].time[0].parameter.parameterName;
        let rain = weather.weatherElement[4].time[0].parameter.parameterName;
        let status = (date.getHours() >= 6 && 18 >= date.getHours()+1) ? "day" : "night";
        $('#weather').html(`
          <p class="search_area_text font-weight-bold">Today Weather</p>
          <div class="text-center d-flex justify-content-center flex-column flex-lg-row">
            <img src="images/weather/${status}/${pic}.svg" alt="weather" class="pr-3">
            <div class="my-auto">溫度 ${min}~${max}℃<br> 降雨機率 ${rain}%<br></div>
          </div>
        `)
      })
  </script>
  <!-- change Nav Logo -->
  <script>
    $show=window.innerWidth;
    if($show<991){
      $(".navbar-brand>img").attr("src","images/icon/logo_white.png");
    }
    else{
      $(".navbar-brand>img").attr("src","images/icon/logo_black.png");
    }
  </script>


</body>

</html>