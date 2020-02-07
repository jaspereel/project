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
  <!-- Data Table -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css" />
</head>

<body>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-users mr-2"></i>會員管理</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <table id="profile" class="w-100 table table-striped table-hover row-border">
        <thead>
          <tr>
            <th>Email</th>
            <th>姓氏</th>
            <th>名字</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $profiles = select('member', '1');
          foreach ($profiles as $person) {
          ?>
            <tr>
              <td><?= $person['email'] ?></td>
              <td><?= $person['last_name'] ?></td>
              <td><?= $person['first_name'] ?></td>
              <td>
                <input type="hidden" value="<?= $person['id'] ?>">
                <button class="btn btn-bluegreen" onclick="op(this)">修改</button>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <div class="pb-3"></div>
  <div id="admin_member_mdy" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>個別會員管理</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form id="admin_member_mdy_form" method="POST" action="api.php?go=admin_member_update" onsubmit="return chk()">
            <input type="hidden" name="id" value="">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="" disabled>

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
                <select disabled id="gender" name="gender" class="form-control">
                  <option value="男">男性</option>
                  <option value="女">女性</option>
                </select>
              </div>
              <div class="form-group col-md-6 input-daterange " id="datepicker">
                <div>
                  <label for="birthday">出生年月日</label>
                  <input type="text" class="form-control" id="birthday" name="birthday" placeholder="請點選日期" disabled>
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
              <button type="submit" class="btn btn-bluegreen">更新資料</button>
            </div>

        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>

  <!--Font Awesome  -->
  <script src="plugins/fontawsome/js/all.min.js"></script>


  <!-- 手機格式驗證 -->
  <script>
    function chk() {
      let phone = document.getElementById('phone').value;
      let regex_phone = /^09\d{8}$/;

      if (!phone.match(regex_phone)) {
        document.getElementById('phone_alert').innerText = '手機號碼格式錯誤，請重新輸入'
        return false;
      }
    }
  </script>
  <!-- Data Table -->
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $('#profile').DataTable();
  </script>

  <script>
    var data;

    function op(e) {
      $('#admin_member_mdy').modal()
      $(e).parents('td').find('input:hidden').val()
      let member_id = $(e).parents('td').find('input:hidden').val()

      $.post("api.php?go=admin_member_select", {
        member_id
      }, function(re) {
        data = JSON.parse(re);
        $('#admin_member_mdy_form').find('input').eq(0).val(data[0].id)
        $('#admin_member_mdy_form').find('input').eq(1).val(data[0].email)
        $('#admin_member_mdy_form').find('input').eq(2).val(data[0].last_name)
        $('#admin_member_mdy_form').find('input').eq(3).val(data[0].first_name)
        $('#admin_member_mdy_form').find('input').eq(4).val(data[0].birthday)
        $('#admin_member_mdy_form').find('input').eq(5).val(data[0].phone)
        $('#admin_member_mdy_form').find('input').eq(6).val(data[0].address)
        $('#admin_member_mdy_form').find('select').eq(0).val(data[0].gender)
      });
    }
  </script>

</body>

</html>