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
    <!-- shopheader -->
    @include('layout.component.shopheader')


    <!--สรุปออเดอร์ -->
    <div class="col-xs-12">
        <h5>สรุปรายการออเดอร์</h5>
    </div>
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
                        <td>{{$row->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <!-- ไปรษณีย์ -->
    <div class="text header"><h5>ตัวเลือกการจัดส่ง</h5></div>
    <div class="form-check">
        <input @if($order->ship_plan == "ไปรษณีย์-ลงทะเบียน") checked @endif class="form-check-input" type="radio" name="Radio" id="NMRadio" value="35"  >
        <label class="form-check-label" for="NMRadio">
            ไปรษณีย์-ลงทะเบียน
            <br>
            ของจะส่งถึง3-5วัน
        </label>
        <span class="pull-right">35.-</span>
    </div>
    <div class="form-check">
        <input @if($order->ship_plan == "ไปรษณีย์-EMS") checked @endif class="form-check-input" type="radio" name="Radio" id="EMSRadio" value="50">
        <label class="form-check-label" for="EMSRadio">
            ไปรษณีย์-EMS
            <br>
            ของจะส่งถึง1-2วัน
        </label>
        <span class="pull-right">50.-</span>
    </div>
    <hr>
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
                        <td>{{$row->price}}</td>
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
    <!-- ช่องทางการชำระเงิน pageที่ 2  สำเร็จแล้ว -->
    <div class="container">
        <div class="form-group">
            <div class="text header"><h5>ช่องทางการชำระเงิน</h5></div>
            <div class="text-pull-left list-group-item list-group-item-action list-group-item-secondary">
                <img src="{{ asset("/images/logo.png") }}" width="80px" hight="70px" class="rounded float-left" >
                <p> โอนเข้าบัญชีธนาคาร กสิกรไทย
                    <br>&nbsp;สาขา จามจุรี
                    <br>&nbsp;เลขบัญชี&nbsp;<FONT color="#33D8F9">2037485625</FONT>
                    <br>&nbsp;ชื่อบัญชี บริษัท ชัญญา จำกัด</p>
            </div>
        </div>
        <!-- input data  -->
        <div class="form-group">
            <label for="exampleFormControlFile1">แนบสลิปที่นี : </label>
            <form method="post" action="{{url('order')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="table">
                    <input type='file'  name="slip_image" id="imgInp" class="inputfile inputfile-2"/>
                    <img id="preview_image" width="150px" src="{{$order->slip_image_url}}" alt="" />
                </table>
        <label>จำนวนเงินที่โอน</label>
        <input id="summary_cost" class="form-control" type="text" name="transtrade" value="" readonly>
        <label>เวลาที่โอน</label>
        <input class="form-control" type="datetime" name="transdate"  value="{{date("d/m/Y H:i:s")}}" readonly >
    </div>
            <hr>
            <div class="text header"><h5>ชื่อ รายละเอียดการจัดส่ง</h5></div>
            <div class="container">
                <br>

                <input class="form-control" type="hidden" name="order_id" value="{{$order->order_id}}" >
                <input class="form-control" type="hidden" name="ship_plan" id="ship_plan_input" value="{{$order->ship_plan}}" >
                <input class="form-control" type="hidden" name="ship_cost" id="ship_cost_input" value="{{$order->ship_cost}}" >
                <input class="form-control" type="hidden" name="total" id="total" value="{{$order->total}}" >


               <label>ชื่อ และ นามสกุล</label>
                <input value="{{$address->name}}" class="form-control" type="text" name="name" placeholder="" >
                <label>เบอร์ติดต่อ</label>
                <input value="{{$address->phonenumber}}" class="form-control" type="text" name="phonenumber" placeholder=""value="{{$order->phonenumber}}">
                <label>อีเมลล์</label>
                <input value="{{$address->email}}" class="form-control" type="text" name="email" placeholder="" >
                <label>ที่อยู่</label>
                <input value="{{$address->address}}" class="form-control" type="text" name="address" placeholder="" >
                <label>แขวง/ตำบล</label>
                <input value="{{$address->sub_district}}" class="form-control" type="text" name="subdistrict" placeholder="" >
                <label>เขต/อำเภอ</label>
                <input value="{{$address->district}}" class="form-control" type="text" name="district" placeholder="" >
                <label>จังหวัด</label>
                <input value="{{$address->province}}"  class="form-control" type="text" name="province" placeholder="" >
                <label>รหัสไปรษณีย์</label>
                <input value="{{$address->zipcode}}"  class="form-control" type="text" name="zipcode" placeholder="" >
                <br>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="บันทึกข้อมูล" />
            </div>
            <!-- ปุ่มบันทึกข้อมูล -->

        </form>
    </div>
    <hr>
    <!-- หน้าที่ 3-->
    <!-- สรุปยอดชำระเงิน page3  -->
    <hr>
    <!-- ชื่อที่อยู่ในการจัดส่ง รับค่ามาจาก DB -->
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="text header"><h5>ชื่อที่อยู่ในการจัดส่ง</h5></div>&nbsp;&nbsp;--}}
            {{--<div class="pull-left">--}}
                {{--<span class="pull-left">{{ $data->name }}</span><br>--}}
                {{--<span class="pull-left">ที่อยู่ :&nbsp;{{ $data->address }}&nbsp;{{ $data->district }}&nbsp;{{ $data->province }}&nbsp;--}}
                    {{--{{ $data->country }}&nbsp;{{ $data->zipcode }}</span></br>--}}
                {{--<span class="pull-left">เบอร์โทรศัพท์:&nbsp;{{ $data->phonenumber }}</span></br>--}}
                {{--<span class="pull-left">อีเมล์ :&nbsp;{{ $data->email }}</br>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--<!-- หลักฐานการโอน  -->--}}
    {{--<h5>หลักฐานการโอน</h5>--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<span class="pull-left">วันที่</span><br>--}}
            {{--<span class="pull-left">เวลา</span><br>--}}

        {{--</div>--}}
    {{--</div>--}}
    {{--<hr>--}}
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
