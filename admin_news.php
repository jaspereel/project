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
  <!-- Date Picker   -->
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.standalone.css">
  <!-- Summer Note -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
</head>

<body>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <h1><i class="nav-icon far fa-newspaper mr-2"></i>新聞管理</h1>
        </div>
        <div class="col-6 text-right">
          <button class="btn btn-bluegreen" href="#admin_news_new" data-toggle="modal">新增文章</button>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <table id="news" class="w-100 table table-striped table-hover row-border">
        <thead>
          <tr>
            <th width="15%">標題圖片</th>
            <th width="25%">標題名稱</th>
            <th width="15%">開始日期</th>
            <th width="15%">結束日期</th>
            <th width="15%">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $news_all = select('news', '1 ORDER BY start_day DESC');
          foreach ($news_all as $news) {
          ?>
            <tr>
              <td><img src="images/news/<?= $news['title_picture_url'] ?>" width="100px"></td>
              <td><?= $news['title'] ?></td>
              <td><?= $news['start_day'] ?></td>
              <td><?= $news['end_day'] ?></td>
              <td>
                <input type="hidden" value="<?= $news['id'] ?>">
                <button class="btn btn-bluegreen mt-2" onclick="op(this)">修改</button>
                <button class="btn btn-red mt-2" onclick="del(<?= $news['id'] ?>)">刪除</button>
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
  <!-- 文章新增 -->
  <div id="admin_news_new" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>新增文章</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form id="admin_room_new_form" method="POST" action="api.php?go=admin_news_insert" enctype="multipart/form-data">
            <div class="form-group">
              <label for="new_title">文章標題</label>
              <input type="text" class="form-control" id="new_title" name="title" placeholder="請輸入標題" required>
            </div>
            <div class="form-row input-daterange input-group" id="new_datepicker">
              <div class="form-group col-md-6">
                <label for="new_start_day">開始日期</label>
                <input type="text" class="form-control" id="new_start_day" name="start_day" required>
              </div>
              <div class="form-group col-md-6">
                <label for="new_end_day">結束日期</label>
                <input type="text" class="form-control" id="new_end_day" name="end_day" required>
              </div>
            </div>
            <div class="form-group">
              <label for="new_content">文章內容</label>
              <textarea class="form-control textarea" id="new_content" name="content" required></textarea>
            </div>

            <div class="form-group">
              <label for="new_title_picture_url">標題圖片</label>
              <input type="file" class="form-control" id="new_title_picture_url" name="title_picture_url" required>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-bluegreen">新增資料</button>
            </div>

        </div>

        </form>
      </div>
    </div>
  </div>
  </div>


  <!-- 文章資料修改 -->
  <div id="admin_news_mdy" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>個別文章管理</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form id="admin_news_mdy_form" method="POST" action="api.php?go=admin_news_update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="">
            <div class="form-group">
              <label for="mdy_title">文章標題</label>
              <input type="text" class="form-control" id="mdy_title" name="title" placeholder="請輸入標題" required>
            </div>
            <div class="form-row input-daterange input-group" id="mdy_datepicker">
              <div class="form-group col-md-6">
                <label for="mdy_start_day">開始日期</label>
                <input type="text" class="form-control" id="mdy_start_day" name="start_day" required>
              </div>
              <div class="form-group col-md-6">
                <label for="mdy_end_day">結束日期</label>
                <input type="text" class="form-control" id="mdy_end_day" name="end_day" required>
              </div>
            </div>
            <div class="form-group">
              <label for="mdy_content">文章內容</label>
              <textarea class="form-control textarea" id="mdy_content" name="content"></textarea>
            </div>

            <div class="form-group">
              <label for="title_picture_url">標題圖片</label>
              <div>
                <img src="" width="160px">
              </div>
              <input type="file" class="form-control mt-2" id="new_title_picture_url" name="title_picture_url">
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-bluegreen">更新文章</button>
            </div>
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
    $('#news').DataTable();
  </script>
  <!-- Sweet Alert2 -->
  <script src="plugins/sweetalert2/js/sweetalert2.all.min.js"></script>

  <!-- Date Picker   -->
  <script src="plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="plugins/datepicker/js/bootstrap-datepicker.zh-TW.min.js"></script>

  <script>
    $('#new_datepicker').datepicker({
      startDate: "today",
      format: "yyyy-mm-dd",
      maxViewMode: 3,
      clearBtn: true,
      language: "zh-TW",
      orientation: "bottom left",
      todayHighlight: true,

    });
    $('#mdy_datepicker').datepicker({
      startDate: "today",
      format: "yyyy-mm-dd",
      maxViewMode: 3,
      clearBtn: true,
      language: "zh-TW",
      orientation: "bottom left",
      todayHighlight: true,

    });
  </script>

  <!-- Summer Note -->
  <script src="plugins/summernote/summernote-bs4.js"></script>
  <script>
    $('#new_content').summernote()
    $('#mdy_content').summernote()
    $('.dropdown-toggle').dropdown()
  </script>


  <script>
    var data;

    function op(e) {
      // $('#admin_news_mdy').modal()
      $(e).parents('td').find('input:hidden').val()
      let news_id = $(e).parents('td').find('input:hidden').val()
      $.post("api.php?go=admin_news_select", {
        news_id
      }, function(re) {
        data = JSON.parse(re);
        $('#admin_news_mdy_form').find('input').eq(0).val(data[0].id)
        $('#admin_news_mdy_form').find('input').eq(1).val(data[0].title)
        $('#admin_news_mdy_form').find('input').eq(2).val(data[0].start_day)
        $('#admin_news_mdy_form').find('input').eq(3).val(data[0].end_day)
        $('#admin_news_mdy_form').find('p').eq(1).html(data[0].content)
        $('#admin_news_mdy_form').find('#mdy_content').val(data[0].content)
        $('#admin_news_mdy_form').find('img').eq(0).attr('src', `images/news/${data[0].title_picture_url}`)
        $('#admin_news_mdy').modal()
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
            document.location.href = 'api.php?go=admin_news_del&del=' + e;
          })

        }
      })
    }
  </script>

</body>

</html>