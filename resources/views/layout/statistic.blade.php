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
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>


<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
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


    </nav>

    <div class="container-fluid">
      <div class="container ">
        <br>
        <div class="row">
            <h3 align="center">รายงานการขาย</h3>
          </div>
          <div class="col-sm-3">
            {{--<label for="Datestatistic">Date :</label>--}}
              {{--<input type="date" class="form-control" id="Date-statistic">--}}
            </div>
            <br>
          <div class="row">
            <div class="col-sm-2">
              <div class="card border-dark shadow text-black">
                <div class="card-body ">
                  <h5 class="card-title">ยอดขายรวม</h5>
                  <p class="card-text">{{$total}} บาท </p>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="card border-info shadow text-black">
                <div class="card-body">
                  <h5 class="card-title">ชำระเงิน</h5>
                  <p class="card-text">{{$pay}} รายการ </p>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="card border-info shadow text-black">
                <div class="card-body">
                  <h5 class="card-title">ตรวจสอบ</h5>
                  <p class="card-text">{{$check}} รายการ </p>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="card border-success shadow text-black ">
                <div class="card-body">
                  <h5 class="card-title">จัดส่ง</h5>
                  <p class="card-text">{{$ship}} รายการ</p>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="card border-warning shadow text-black">
                <div class="card-body">
                  <h5 class="card-title">สำเร็จ</h5>
                  <p class="card-text">{{$complete}} รายการ</p>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div ="container">
          <label for="tableorder">รายการขายที่ดีสุด :</label>
          <div class ="row">
          <table class="table col-8">
            <br>
              <thead>
              <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อสินค้า</th>
                  <th>จำนวน</th>
                  <th>ยอดขาย</th>
              </tr>
              </thead>
              <tbody>
                  @php $index = 1 @endphp
                  @foreach($rank as $data)
                      <tr>
                          <td>{{$index++}}</td>
                          <td>{{$data->product_name}}</td>
                          <td>{{$data->amount}}</td>
                          <td>{{$data->total}}</td>
                      </tr>
                    @endforeach
              </tbody>
              </table>
            </div>
          </div>


          <!-- Chart -->
          {{--<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>--}}
        <!-- show Order-->
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
          $(function () {
                     $('#datetimepicker1').datetimepicker();
                 });

                 // Chart
                 Highcharts.chart('container', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'ยอดขายตามชนิดสินค้า'
          },
          subtitle: {
              text: 'ยอดขายของแต่ละเดือน'
          },
          xAxis: {
              categories: [
                  'Jan',
                  'Feb',
                  'Mar',
                  'Apr',
                  'May',
                  'Jun',
                  'Jul',
                  'Aug',
                  'Sep',
                  'Oct',
                  'Nov',
                  'Dec'
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'ยอดขาย'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'ชนิดที่ 1',
              data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
            }, {
             name: 'ชนิดที่ 2',
             data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
          }]
      });
</script>
</body>
</html>
