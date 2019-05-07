<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Bill Product</title>
  <link rel="stylesheet" href="/css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset("css/simple-sidebar.css")}}">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  @include('layout.menu')


  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle">Menu</button>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--<ul class="navbar-nav ml-auto mt-2 mt-lg-0">--}}
          {{--<li class="nav-item active">--}}
            {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
          {{--</li>--}}
          {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">Link</a>--}}
          {{--</li>--}}
          {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
              {{--Dropdown--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
              {{--<a class="dropdown-item" href="#">Action</a>--}}
              {{--<a class="dropdown-item" href="#">Another action</a>--}}
              {{--<div class="dropdown-divider"></div>--}}
              {{--<a class="dropdown-item" href="#">Something else here</a>--}}
            {{--</div>--}}
          {{--</li>--}}
        {{--</ul>--}}
      {{--</div>--}}
    </nav>

    <div class="container-fluid">
      <div class="container ">
        <br>
        <h3 align="center">สร้างรายการขาย</h3>
        <form method="post" action="{{url('orderproduct')}}">
          {{ csrf_field() }}
            <div class="row">
              <div class="col">
                <label for="inputAddress">บิลเลขที่</label>
                <input type="text" class="form-control" name="order_id" value="{{$order->order_id}}">
              </div>
              <div class="col">
                <label for="inputAddress">เบอร์โทรติดต่อลูกค้า</label>
                <input type="text" class="form-control" name="billaddress" value="{{$order->phone}}">
              </div>
                </div>
                <br>
            <div class="form-row">
              <div class="form-group">
                <label for="productid" style="width:100%;">สินค้า</label>
                <select class="custom-select" name="product_id">
                  @foreach($products as $product)
                    <option  value="{{$product->no}}">{{$product->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="amount">จำนวน</label>
                <input type="number" id="amount" class="form-control" name="amount" >
              </div>
              <div class="form-group col-md-4">
                <label for="price">ราคาต่อชิ้น</label>
                <input type="number" id="price" class="form-control" name="price" >
              </div>
              <div class="form-group col-md-4">
                <label for="total">ราคารวม</label>
                <input type="text"  id="total"  class="form-control" name="total" >
              </div>
            </div>
            <div class="form-group col-md-5">
              <div class="row">
                <label for="inputAddress">Onelink</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control"  name="link" value="{{ URL("order/$order->order_id") }}" readonly>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">เพิ่มรายการ</button>
          </form>
        </form>
        <hr>
        <!-- show Order-->
      </div>
      <div class="container">
        <div class="row">
          <h3 align="center">รายการสินค้าในรายการขาย</h3>
        </div>
        <div class="row">
          <table class="table table-bordered table-striped" style="width: 100%">
            <thead>
            <tr>
              <th>ชื่อ</th>
              <th>sku</th>
              <th>จำนวน</th>
              <th>ราคา</th>
              <th>ลบบิล</th>
            </tr>
            </thead>
            <tbody>

            <tr>
              @foreach($orderpd as $row)
                <td>{{$row->name}}</td>
                <td>{{$row->sku}}</td>
                <td>{{$row->amount}}</td>
                <td>{{$row->price}}</td>
                <td>
                  <form method="post" class ="delete_form" action="{{action('OrderProductController@destroy',$row['id'])}}">
                    {{csrf_field()}}
                    <input  type="hidden" name="_method" value="DELETE" />
                    <button type ="hidden" class="btn btn-danger">DELETE</button>
                  </form>
                </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>




<!-- $order -->
<script type ="text/javascript">


    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    $("#amount").change(function(){

        calculatePrice();
    });

    $("#price").change(function(){

        calculatePrice();
    });

    function calculatePrice(){

        var amount =   $("#amount").val();
        var price =   $("#price").val();

        $("#total").val(amount * price);

    }
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                return true;
            }
            else {
                return false;
            }
        });
    });
</script>
</body>
</html>
