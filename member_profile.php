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
</head>
<body>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-users mr-2"></i>個人資料</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <form id="register" method="POST" action="api.php?go=member_update" onsubmit="return chk()">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$_SESSION['email']?>" disabled >
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="last_name">姓氏</label>
              <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$_SESSION['last_name']?>" disabled >
            </div>
            <div class="form-group col-md-6">
              <label for="first_name">名字</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$_SESSION['first_name']?>" disabled >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gender">性別</label>
              <select disabled id="gender" name="gender" class="form-control" >
                  <?php
                    if($_SESSION['gender']="男"){
                        echo '<option value="男" selected disabled>男性</option>';
                    }
                    else{
                        echo '<option value="女" selected disabled>女性</option>';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group col-md-6 input-daterange " id="datepicker">
              <div>
                <label for="birthday">出生年月日</label>
                <input type="text" class="form-control" id="birthday" name="birthday" value="<?=$_SESSION['birthday']?>" disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="phone">手機號碼</label>
            <input type="hidden" class="form-control" id="old_phone" name="old_phone" value="<?=$_SESSION['phone']?>" >
            <input type="text" class="form-control" id="phone" name="phone" value="<?=$_SESSION['phone']?>" placeholder="請輸入十位數手機號碼" required>
            <b id="phone_alert" style="color:crimson; font-size:10px;"></b>
          </div>
          <div class="form-group">
            <label for="address">地址</label>
            <input type="hidden" class="form-control" id="old_address" name="old_address" value="<?=$_SESSION['phone']?>" >
            <input type="text" class="form-control" id="address" name="address" value="<?=$_SESSION['address']?>" >
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-bluegreen">更新資料</button>
          </div>
        </div>
        </form>
        </div>
    </section>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!--Font Awesome  -->
    <script src="plugins/fontawsome/js/all.min.js"></script>
    <script>
    // 手機格式驗證
      function chk(){
        let phone=document.getElementById('phone').value;
        let regex_phone=/^09\d{8}$/;
        if(!phone.match(regex_phone)){
          document.getElementById('phone_alert').innerText='手機號碼格式錯誤，請重新輸入'
          return false;
        }
    }
  </script>
</body>
</html>