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
  <link rel="stylesheet" href="/css/custom.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
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

    <button class="btn btn-primary" id="back-button">
      ย้อนกลับ
    </button>

    <div class="container-fluid">
      <div class="container ">
        <br>
        <div class="row">
          <div class="col-md-10">
        <h3 align="center">สร้างรายการขาย</h3>
      </div>
            <div class="col-md-2">
          <a class="btn btn-primary pull-right" href="/orderproduct" role="button">สร้างรายการใหม่</a>
        </div>
      </div>
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
                <div class="row">
              <div class="col  ">
                <label for="productid" style="width:100%;">สินค้า</label>
                <select class="custom-select" name="product_id">
                  @foreach($products as $product)
                    <option  value="{{$product->no}}">{{$product->name}}</option>
                  @endforeach
                </select>
                </div>
                <div class="col ">
                  <label for="amount">จำนวน</label>
                  <input type="number"  id="amount"  class="form-control" name="amount">
                </div>
              </div>
              <form class ="form-inline">
              <div class="row">
                <div class="col-md-4">
                  <label for="price">ราคาต่อชิ้น</label>
                  <input type="number" id="price" class="form-control" name="price">
                </div>
                <div class="col-md-4">
                  <label for="price">ราคารวม</label>
                  <input type="text"  id="total"  class="form-control" name="total"></input>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary"style="margin-top: 2rem;">เพิ่มรายการ</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-4">
                <label for="inputAddress">Onelink</label>
                <input type="text" class="form-control"  name="link" value="{{ URL("order/$order->order_id") }}" readonly>
              </div>
                <div class="col-md-4">
              <button type="button" id="button-done" class="btn btn-primary" style="margin-top: 2rem;"data-toggle="modal" data-target="#popup">เสร็จสิ้น</button>
            </div>
            </div>

                <!-- popup -->

                  <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class ="container">
                          <div class ="row">
                          <h5 class="modal-title" id="exampleModalLongTitle">สร้างรายการขายสำเร็จ</h5>
                          <span class="form-control-plaintext" id="staticEmail">รายการขาย &nbsp;{{$order->created_at}}</span>
                        </div>
                        </div>
                      </div>
                        <div class="modal-body">
                          <div class="input-group col-mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon3">ออร์เดอร์ที่ {{$order->order_id}}</span>
                            </div>
                              <button  onclick="copylink()">คัดลอกลิงค์</button>
                          </div>
                          <input type="text" class="form-control"  id="link"name="link" value="{{ URL("order/$order->order_id") }}" >
                        </div>
                        <div class="modal-footer">
                          <a href="{{ url("orderlist") }}" class="btn btn-primary">รายการขาย</a>
                          <button type="submit" class="btn btn-primary" data-dismiss="modal">ตกลง</button>
                        </div>
                      </div>
                    </div>
                  </div>
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
              <th>ลำดับ</th>
              <th>Product id</th>
              <th>ชื่อ</th>
              <th>ราคา</th>
              <th>จำนวน</th>
              <th>รวม</th>
              <th>ลบบิล</th>
            </tr>
            </thead>
            <tbody>

            <tr>
              @php $index = 1; $total = 0; @endphp
              @foreach($orderpd as $row)
                @php  $total = $row->total + $total; @endphp
                <td>{{$index++}}</td>
                <td>{{$row->sku}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->price}}</td>
                <td>{{$row->amount}}</td>
                <td>{{$row->total}}</td>
                <td>
                  <form method="post" class ="delete_form " action="{{action('OrderProductController@destroy',$row->id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />
                    <input  type="hidden" name="order_product_id" value="{{$row->id}}" />
                    <button type ="hidden" class="btn btn-danger">DELETE</button>
                  </form>
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="5" style="background-color: #9fcdff; text-align: right;">ยอดรวมทั้งสิ้น</td>
                <td  id="total_cost" >{{$total}}</td>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>




<!-- $order -->
<script type ="text/javascript">


    $("#back-button").click(function () {
        window.location.replace("{{url("orderlist")}}");
    });

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
       $('.custom-select').select2();
        $('.delete_form').on('submit', function(){
            if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                return true;
            }
            else {
                return false;
            }
        });
    });
    function copylink() {
      var copyText = document.getElementById("link");
      copyText.select();
      document.execCommand("copy");
      alert("คัดลอกลิงค์: " + copyText.value);
    }
</script>
</body>
</html>
