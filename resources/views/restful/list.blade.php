<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QLHS</title>
    <link type="text/css" href="{{ url('restful/css/bootstrap.min.css')}}" rel="stylesheet">
    <style type="text/css">
      .btn {padding:0px;font-weight:bold}
    </style>
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Danh Sách Học Sinh</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Điểm Toán</th>
                <th>Điểm Lý</th>
                <th>Điểm Hóa</th>
                <th>Xóa</th>
                <th>Sửa</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0 ;?>
              @foreach($hocsinh as $hs)
              <?php $i++ ;?>
              <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$hs->hoten}}</td>
                <td>{{$hs->toan}}</td>
                <td>{{$hs->ly}}</td>
                <td>{{$hs->hoa}}</td>
                <th>
                  <a class="delete" href="destroy/{{$hs->id}}">Xoá</a>
                </th>
                <th>
                  <a href="edit/{{$hs->id}}">Sửa</a>
                </th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
   
    <script type="text/javascript" src="restful/js/jquery.min.js"></script>
    <script type="text/javascript" src="restful/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
        $(document).ready(function(){
          $('.delete').click(function(){
            var check = window.confirm('Sure?');
            if(check){
              return true;
            }
            return false
          })
        })
    </script>
  </body>
</html>