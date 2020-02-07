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
          <h1><i class="nav-icon fas fa-bed mr-2"></i>房型管理</h1>
        </div>
        <div class="col-6 text-right">
          <button class="btn btn-bluegreen" href="#admin_room_new" data-toggle="modal">新增房型</button>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <table id="room" class="w-100 table table-striped table-hover row-border">
        <thead>
          <tr>
            <th width="10%">房型圖片預覽</th>
            <th width="10%">房型名稱</th>
            <th width="8%">每晚價格</th>
            <th width="40%">房型介紹</th>
            <th width="12%">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rooms = select('room', '1');
          foreach ($rooms as $room) {
          ?>
            <tr>
              <td><img src="images/room/<?= $room['picture_url_1'] ?>" width="100px"></td>
              <td><?= $room['name'] ?></td>
              <td><?= $room['price'] ?></td>
              <td><?= $room['introduction'] ?></td>
              <td>
                <input type="hidden" value="<?= $room['id'] ?>">
                <button class="btn btn-bluegreen mt-2" onclick="op(this)">修改</button>
                <button class="btn btn-red mt-2" onclick="del(<?= $room['id'] ?>)">刪除</button>
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
  <!-- 房型資料新增 -->
  <div id="admin_room_new" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>新增房型資料</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form id="admin_room_new_form" method="POST" action="api.php?go=admin_room_insert" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="new_name">房型名稱</label>
                <input type="text" class="form-control" id="new_name" name="name" placeholder="請輸入房型名稱" required>
              </div>
              <div class="form-group col-md-6">
                <label for="new_total_stock">房型數量</label>
                <input type="text" class="form-control" id="new_total_stock" name="total_stock" placeholder="請輸入房型數量(數字)" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="new_price">每晚價格</label>
                <input type="text" class="form-control" id="new_price" name="price" placeholder="請輸入每晚價格(數字)" required>
              </div>
              <div class="form-group col-md-6">
                <label for="new_max_person">房型人數</label>
                <select id="new_max_person" name="max_person" class="form-control">
                  <option disabled selected>請選擇房型人數</option>
                  <option value="1">1人</option>
                  <option value="2">2人</option>
                  <option value="3">3人</option>
                  <option value="4">4人</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="new_room_size">房型大小</label>
                <input type="text" class="form-control" id="new_room_size" name="room_size" value="　㎡~　㎡" required>
              </div>
              <div class="form-group col-md-6">
                <label for="new_bed_size">床鋪大小</label>
                <input type="text" class="form-control" id="new_bed_size" name="bed_size" value="　㎝~　㎝" required>
              </div>
            </div>
            <div class="form-group">
              <label for="new_equipment">房型設備</label>
              <textarea class="form-control" id="new_equipment" name="equipment" rows="3" placeholder="請輸入房型設備" required></textarea>
            </div>
            <div class="form-group">
              <label for="new_introduction">房型介紹</label>
              <textarea class="form-control" id="new_introduction" name="introduction" rows="3" placeholder="請輸入房型介紹" required></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="new_picture_url_1">房型照片1</label>
                <input type="file" class="form-control" id="new_picture_url_1" name="picture_url_1" required>
              </div>
              <div class="form-group col-md-6">
                <label for="new_picture_url_2">房型照片2</label>
                <input type="file" class="form-control" id="new_picture_url_2" name="picture_url_2" required>
              </div>
            <!-- </div>
            <div class="form-row"> -->
              <div class="form-group col-md-6">
                <label for="new_picture_url_3">房型照片3</label>
                <input type="file" class="form-control" id="new_picture_url_3" name="picture_url_3" required>

              </div>
              <div class="form-group col-md-6">
                <label for="new_picture_url_4">房型照片4</label>
                <input type="file" class="form-control" id="new_picture_url_4" name="picture_url_4" required>
              </div>
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


  <!-- 房型資料修改 -->
  <div id="admin_room_mdy" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            <h5>個別房型管理</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form id="admin_room_mdy_form" method="POST" action="api.php?go=admin_room_update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="room">房型名稱</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group col-md-6">
                <label for="total_stock">房型數量</label>
                <input type="text" class="form-control" id="total_stock" name="total_stock">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="price">每晚價格</label>
                <input type="text" class="form-control" id="price" name="price">
              </div>
              <div class="form-group col-md-6">
                <label for="max_person">房型人數</label>
                <select id="max_person" name="max_person" class="form-control">
                  <option value="1">1人</option>
                  <option value="2">2人</option>
                  <option value="3">3人</option>
                  <option value="4">4人</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="room_size">房型大小</label>
                <input type="text" class="form-control" id="room_size" name="room_size">
              </div>
              <div class="form-group col-md-6">
                <label for="bed_size">床鋪大小</label>
                <input type="text" class="form-control" id="bed_size" name="bed_size">
              </div>
            </div>
            <div class="form-group">
              <label for="introduction">房型介紹</label>
              <textarea class="form-control" id="introduction" name="introduction" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="equipment">房型設備</label>
              <textarea class="form-control" id="equipment" name="equipment" rows="3"></textarea>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="picture_url_1">房型照片1</label>
                <input type="hidden" class="form-control" id="old_picture_url_1" name="old_picture_url_1">
                <img src="images/room/A1.jpg" width="160px" >
                <input type="file" class="form-control mt-2" id="picture_url_1" name="picture_url_1">
              </div>
              <div class="form-group col-md-3">
                <label for="picture_url_2">房型照片2</label>
                <input type="hidden" class="form-control" id="old_picture_url_2" name="old_picture_url_2">
                <img src="images/room/A1.jpg" width="160px" >
                <input type="file" class="form-control mt-2" id="picture_url_2" name="picture_url_2">
              </div>
              <div class="form-group col-md-3">
                <label for="picture_url_3">房型照片3</label>
                <input type="hidden" class="form-control" id="old_picture_url_3" name="old_picture_url_3">
                <img src="images/room/A1.jpg" width="160px" >
                <input type="file" class="form-control mt-2" id="picture_url_3" name="picture_url_3">
              </div>
              <div class="form-group col-md-3">
                <label for="picture_url_4">房型照片4</label>
                <input type="hidden" class="form-control" id="old_picture_url_4" name="old_picture_url_4">
                <img src="images/room/A1.jpg" width="160px" >
                <input type="file" class="form-control mt-2" id="picture_url_4" name="picture_url_4">
              </div>
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
    $('#room').DataTable();
  </script>
  <!-- sweet alert2 -->
  <script src="plugins/sweetalert2/js/sweetalert2.all.min.js"></script>

  <script>
    var data;

    function op(e) {
      $('#admin_room_mdy').modal()
      $(e).parents('td').find('input:hidden').val()
      let room_id = $(e).parents('td').find('input:hidden').val()
      $.post("api.php?go=admin_room_select", {
        room_id
      }, function(re) {
        data = JSON.parse(re);
        $('#admin_room_mdy_form').find('input').eq(0).val(data[0].id)
        $('#admin_room_mdy_form').find('input').eq(1).val(data[0].name)
        $('#admin_room_mdy_form').find('input').eq(2).val(data[0].total_stock)
        $('#admin_room_mdy_form').find('input').eq(3).val(data[0].price)
        $('#admin_room_mdy_form').find('input').eq(4).val(data[0].room_size)
        $('#admin_room_mdy_form').find('input').eq(5).val(data[0].bed_size)
        $('#admin_room_mdy_form').find('input').eq(6).val(data[0].picture_url_1)
        $('#admin_room_mdy_form').find('input').eq(8).val(data[0].picture_url_2)
        $('#admin_room_mdy_form').find('input').eq(10).val(data[0].picture_url_3)
        $('#admin_room_mdy_form').find('input').eq(12).val(data[0].picture_url_4)
        $('#admin_room_mdy_form').find('textarea').eq(0).val(data[0].introduction)
        $('#admin_room_mdy_form').find('textarea').eq(1).val(data[0].equipment)
        $('#admin_room_mdy_form').find('select').eq(0).val(data[0].max_person)
        $('#admin_room_mdy_form').find('img').eq(0).attr('src',`images/room/${data[0].picture_url_1}`)
        $('#admin_room_mdy_form').find('img').eq(1).attr('src',`images/room/${data[0].picture_url_2}`)
        $('#admin_room_mdy_form').find('img').eq(2).attr('src',`images/room/${data[0].picture_url_3}`)
        $('#admin_room_mdy_form').find('img').eq(3).attr('src',`images/room/${data[0].picture_url_4}`)
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
            document.location.href = 'api.php?go=admin_room_del&del=' + e;
          })

        }
      })
    }
  </script>

</body>

</html>