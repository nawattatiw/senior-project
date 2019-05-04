<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Onelink Shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
<div class="container">
    <!-- PROFILE -->
    <section>
        <div align="center">
            <div class="d-flex justify-content-center h-100">
                <div class="image_outer_container">
                    <div class="image_inner_container">
                        <img src="{{ asset("/images/cintage.jpg") }}">
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
        <h2 class ="text-center">CINTAGE SHOP</h2>
        <p class ="text-center">เลขที่บิล&nbsp;{{$order->order_id}}</p>
        {{--<p class ="text-center">หมดอายุ </p>--}}
        <div class="text-center">
            <h5>สถานะของรายการซื้อ</h5>
            <span style="font-size: 30px">จัดส่งสำเร็จแล้ว</span>
            {{--<span>กำลังตรวจสอบ</span>--}}
            {{--<span >จัดส่งแล้ว</span>--}}
        </div>
    </section>
    <!-- สรุปยอดชำระเงิน     รอแก้ไข     -->
    <div class="text header"><h5>สรุปยอดชำระเงิน</h5></div>

    <div class="col-xs-12">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>สินค้า</th>
                <th>จำนวน</th>
                <th>ราคา</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orderpd as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->amount}}</td>
                        <td>{{$row->total}}</td>
                    </tr>
                @endforeach
                <tr>

                    <td id="ship_text">ไปรษณีย์ไทย-ลงทะเบียน</td>
                    <td>1</td>
                    <td id="ship_cost">35</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: #9fcdff; text-align: right;">ยอดรวมทั้งสิ้น</td>
                      <td  id="total_cost" >{{$order->total}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <!--ชื่อที่อยู่ในการจัดส่ง  tocheck-->
    <h5>ชื่อที่อยู่ในการจัดส่ง</h5>
    <div class="container">

        <div class="row">
            <div class="pull-left">
                <span class="pull-left">{{$address->name}}</span><br>
                <span class="pull-left">ที่อยู่ :&nbsp;{{$address->address}}&nbsp;{{$address->sub_district}}&nbsp;{{$address->district}}&nbsp;
                    {{$address->province}}&nbsp;{{ $address->zipcode }}</span></br>
                <span class="pull-left">เบอร์โทรศัพท์:&nbsp;{{$address->phonenumber}}</span></br>
                <span class="pull-left">อีเมล์ :&nbsp;{{$address->email}}</br>
            </div>
        </div>
    </div>
    <hr>
    <!-- หลักฐานการโอน  -->
    <h5>หลักฐานการโอน</h5>
    <div class="container">
      <br>
      <div class="text-pull-left">
          <img src="{{ asset("/images/logo.png") }}" width="80px" hight="70px" class="rounded float-left" >
          <p> โอนเข้าบีญชีธนาคาร กสิกรไทย
              <br>&nbsp;สาขา จามจุรี
              <br>&nbsp;เลขบัญชี&nbsp;<FONT color="#33D8F9">2037485625</FONT>
              <br>&nbsp;ชื่อบัญชี บริษัท ชัญญา จำกัด</p>
            </div>
            @foreach($orderpd as $row)
              <span class="pull-left"> จำนวนเงินที่โอน :&nbsp;</span>
              <h2 class="pull-right"><FONT color="#33FF6B">{{$order->total}}</h2></FONT><td>
          @endforeach
            <br><br>
            <span class="pull-left"> วันเวลาที่โอน :&nbsp;</span>
             <span class="pull-right">{{$address->updated_at}}</span><br><br>
             <span class="pull-left"> สลิป :&nbsp;</span><br>
            <img  class="img-center" id="preview_image"  src="{{$order->slip_image_url}}" alt=""/>
    </div>
    <hr>
    <!-- ตรวจสอบสถานะการส่ง -->
</div><!-- </div> container -->
</body>
<script>
    $(document).ready(function(){

        var ship_text =  $("#ship_text");
        var ship_cost =  $("#ship_cost");
        var total_cost =  $("#total_cost");
        var summary_cost =  $("#summary_cost");
        var ship_plan_input =  $("#ship_plan_input");
        var ship_cost_input =  $("#ship_cost_input");

        var product_price = {{$order->product_cost}};
        var ship_plan = "{{$order->ship_plan}}";
        var ship_price = {{$order->ship_cost}};
        var total_price = product_price + ship_price;

        calculatePayment();

        $("#NMRadio").click(function(){

            ship_price = 35;
            ship_plan = "ไปรษณีย์ไทย-ลงทะเบียน";

            calculatePayment();

        });
        $("#EMSRadio").click(function(){

            ship_price = 50;
            ship_plan = "ไปรษณีย์ไทย-EMS";

            calculatePayment();

        });

        function calculatePayment() {
            total_price = product_price + ship_price;
            ship_text.html(ship_plan);
            ship_cost.html(ship_price);
            total_cost.html(total_price);
            summary_cost.val(total_price);
            ship_plan_input.val(ship_plan);
            ship_cost_input.val(ship_price);
        }

        function D(){

            var amount =   $("#amount").val();
            var price =   $("#price").val();

            $("#total").val(amount * price);

        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    })
</script>
</html>
