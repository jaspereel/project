<?php
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawsome/css/fontawesome.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css" />
</head>

<body>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <h1><i class="nav-icon fas fa-comment-dots mr-2"></i>訊息管理</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <table id="contact" class="w-100 table table-striped table-hover row-border">
        <thead>
          <tr>
            <th width="10%">訊息狀態</th>
            <th width="10%">訊息日期</th>
            <th width="15%">姓名</th>
            <th width="20%">Email</th>
            <th width="10%">回覆日期</th>
            <th width="15%">回覆人員</th>
            <th width="20%">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $contact = select('contact', '1 ORDER BY id DESC');
          foreach ($contact as $message) {
          ?>
            <tr>
              <td>
                <?php
                if ($message['reply_flag'] == 0) {
                  echo '<p style="color:red;">新留言</p>';
                } else if ($message['reply_flag'] == 1) {
                  echo '<p style="color:blue;">已回覆</p>';
                }
                ?>
              </td>
              <td><?= $message['customer_date'] ?></td>
              <td><?= $message['customer_name'] ?></td>
              <td><?= $message['customer_email'] ?></td>
              <td><?= $message['reply_date'] ?></td>
              <td><?= $message['reply_person'] ?></td>
              <td>
                <input type="hidden" value="<?= $message['id'] ?>">
                <button class="btn btn-bluegreen mt-2" onclick="op(this)">內容</button>
                <button class="btn btn-red mt-2" onclick="del(<?= $message['id'] ?>)">刪除</button>
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


  <!-- 留言資料修改 -->
  <div id="admin_contact_mdy" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>留言管理</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form id="admin_contact_mdy_form" method="POST" action="admin_mail.php" onsubmit="flag()">
            <input type="hidden" name="id" value="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="reply_flag">訊息狀態</label>
                <input type="text" class="form-control" id="reply_flag" name="reply_flag" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="reply_flag">訊息日期</label>
                <input type="text" class="form-control" id="customer_date" name="customer_date" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="customer_name">姓名</label>
              <input type="text" class="form-control" id="customer_name" name="customer_name" readonly>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="customer_email">Email</label>
                <input type="text" class="form-control" id="customer_email" name="customer_email" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="customer_phone">聯絡電話</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="customer_require">留言內容</label>
              <textarea class="form-control" id="customer_require" name="customer_require" rows="5" readonly></textarea>
            </div>
            <hr>
            <div class="form-group">
              <label for="reply_content">回覆內容</label>
              <textarea class="form-control" id="reply_content" name="reply_content" rows="3"></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="reply_date" name="reply_date" value="<?= $today ?>">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="reply_person" name="reply_person" value="<?= $_SESSION['name'] ?>">
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

  <!-- Data Table -->
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $('#contact').DataTable();
  </script>
  <!-- sweet alert2 -->
  <script src="plugins/sweetalert2/js/sweetalert2.all.min.js"></script>

  <script>
    var data;

    function op(e) {
      $('#admin_contact_mdy').modal()
      let contact_id = $(e).parents('td').find('input:hidden').val()
      $.post("api.php?go=admin_contact_select", {
        contact_id
      }, function(re) {
        data = JSON.parse(re);
        $('#admin_contact_mdy_form').find('input').eq(0).val(data[0].id)
        if (data[0].reply_flag == 0) {
          $('#admin_contact_mdy_form').find('input').eq(1).val('未回覆')
        } else if (data[0].reply_flag == 1) {
          $('#admin_contact_mdy_form').find('input').eq(1).val('已回覆')
          $('#admin_contact_mdy_form').find('textarea').eq(1).attr('disabled',true)
          $('#admin_contact_mdy_form').find('button').eq(0).attr('disabled',true)
        }
        $('#admin_contact_mdy_form').find('input').eq(2).val(data[0].customer_date)
        $('#admin_contact_mdy_form').find('input').eq(3).val(data[0].customer_name)
        $('#admin_contact_mdy_form').find('input').eq(4).val(data[0].customer_email)
        $('#admin_contact_mdy_form').find('input').eq(5).val(data[0].customer_phone)
        $('#admin_contact_mdy_form').find('textarea').eq(0).val(data[0].customer_require)
        $('#admin_contact_mdy_form').find('textarea').eq(1).val(data[0].reply_content)
      });
    }

    function del(e) {
      Swal.fire({
        title: '是否確定刪除?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2e5266',
        cancelButtonColor: '#ff5a5f',
        confirmButtonText: '刪除',
        cancelButtonText: '取消'
      }).then((result) => {
        if (result.value) {

          Swal.fire({
            title: '刪除成功!',
            icon: 'success',
            confirmButtonText: '確定'
          }).then((result) => {
            document.location.href = 'api.php?go=admin_contact_del&del=' + e;
          })

        }
      })
    }

    function flag() {
      if ($('#reply_content')) {
        $('#reply_flag').val(1)
      }
    }
  </script>

</body>

</html>