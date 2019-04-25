<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strong Than Ever</title>
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
        <form>
        <section>
        <div align="center">
          <div class="d-flex justify-content-center h-100">
          <div class="image_outer_container">
  				<div class="image_inner_container">
          <img src="\images\cintage.jpg">
          </div>
          <br><br>
        </div>
      </div>
    </div>
    <h2 class ="text-center">Strong Than Ever</h2>
    <p class ="text-center">เลขที่บิล&nbsp;{{$orderpd[0]->orderid}}</p>
    <p class ="text-center">หมดอายุ </p>
    <br><br>
        </section>
      </form>
        <!-- Staus-->
        <div class="text-center">
          <span class="pull-left">รอจ่ายเงิน</span>
          <span>กำลังตรวจสอบ</span>
          <span class="pull-right">จัดส่งแล้ว</span>
        </div>
        <!--สรุปออเดอร์ -->
        <div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
          <h5>สรุปรายการออเดอร์</h5>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
          <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>สินค้า</th>
              <th>จำนวน</th>
              <th>ราคา</th>
          </tr>
          </thead>
          <tbody>

            <tr>
              @foreach($orderpd as $row)
                <td>{{$row->productname}}</td>
                <td>{{$row->amout}}</td>
                 <td>{{$row->price}}</td>
           </form>
           </td>
            </tr>
            @endforeach
        </table>
      </div>
        <hr>
        <!-- ไปรษณีย์ -->
        <div class="text header"><h5>ตัวเลือกการจัดส่ง</h5></div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="Radio" id="NMRadio" value="35" checked>
          <label class="form-check-label" for="NMRadio">
            ไปรษณีย์-ลงทะเบียน
            <br>
            ของจะส่งถึง3-5วัน
          </label>
            <span class="pull-right">35.-</span>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="Radio" id="EMSRadio" value="50">
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
              <div class="container">
                <div class="text-center">
                  <span class="pull-left">{{$orderpd[0]->productname}}</span> <span class="pull-right">{{$orderpd[0]->price}}</span></br>
                  <span class="pull-left">ไปรษณีย์ไทย-ลงทะเบียน</span><span class="pull-right">35.-</span></br>
                  <span class="pull-left">ส่วนลดค่าส่ง</span><span class="pull-right">-</span></br>
                  <span class="pull-left">ส่วนลดค่าสินค้า</span><span class="pull-right">-</span></br>
                  <span class="text-center">ยอดรวมทั้งสิ้น</span><span class="pull-right">385.-</span></br>
                </div>
              </div>
              <hr>
        <!-- ช่องทางการชำระเงิน เสร็จสิ้น -->
        <div class="text header"><h5>ช่องทางการชำระเงิน</h5></div>
        <div class="text-pull-left">
        <img src="\images\logo.png" width="80px" hight="70px" class="rounded float-left" >
        <p> โอนเข้าบีญชีธนาคาร กสิกรไทย
         <br>&nbsp;สาขา จามจุรี
         <br>&nbsp;เลขบัญชี&nbsp;<FONT color="#33D8F9">2037485625</FONT>
         <br>&nbsp;ชื่อบัญชี ชัญญาาาาาา&nbsp;</p>
       </div>
         <hr>
         <!--ปุ่มชำระเงิน ยังไม่มี path ว่าจะไปทางไหน-->
         <input class="btn btn-primary btn-lg btn-block" type="submit" name="gotopage2" value="ชำระเงินช่องทางนี้">
         <hr>
         <!--หน้าที่2-->
                  <!-- สรุปยอดการชำระเงินหน้าที่ 2 รอการแก้ไข -->
         <div class="text header"><h5>สรุปยอดชำระเงิน</h5></div>
               <div class="container">
                 <div class="text-center">
                   <span class="pull-left">{{$orderpd[0]->productname}}</span> <span class="pull-right">{{$orderpd[0]->price}}.-</span></br>
                   <span class="pull-left">ไปรษณีย์ไทย-ลงทะเบียน</span><span class="pull-right">35.-</span></br>
                   <span class="pull-left">ส่วนลดค่าส่ง</span><span class="pull-right">-</span></br>
                   <span class="pull-left">ส่วนลดค่าสินค้า</span><span class="pull-right">-</span></br>
                   <span class="text-center">รวม</span><span class="pull-right">385.-</span></br>
                 </div>
               </div>
               <hr>
               <!-- ช่องทางการชำระเงิน pageที่ 2  สำเร็จแล้ว -->
               <div class="container">
                <div class="form-group">
               <div class="text header"><h5>ช่องทางการชำระเงิน</h5></div>
               <div class="text-pull-left">
               <img src="\images\logo.png" width="80px" hight="70px" class="rounded float-left" >
               <p> โอนเข้าบีญชีธนาคาร กสิกรไทย
                <br>&nbsp;สาขา จามจุรี
                <br>&nbsp;เลขบัญชี&nbsp;<FONT color="#33D8F9">2037485625</FONT>
                <br>&nbsp;ชื่อบัญชี ชัญญาาาาาา&nbsp;</p>
                    </div>
                </div>
              </div>
              <!-- input การโอน -->
            <div class="form-group">
            <label for="exampleFormControlFile1">แนบสลิปที่นี : </label>
              <form method="post" action="{{url('order')}}" enctype="multipart/form-data">
              {{csrf_field()}}
                <table class="table">
                <input type="file" name="payment" class="inputfile inputfile-2">
                </table>
                <hr>
         <div class="text header"><h5>ชื่อ รายละเอียดการจัดส่ง</h5></div>
          <div class="container">
            <br>
            <label>จำนวนเงินที่โอน</label>
           <input class="form-control" type="text" name="transtrade" value="ยอดชำระ: " readonly>
            <label>วันที่โอน</label>
            <input class="form-control" type="text" name="transdate" placeholder="{{date("d/m/Y")}}" value="{{date("d/m/Y")}}" readonly>
            <label>เวลา</label>
            <input class="form-control" type="text" name="transtime" placeholder="{{date("H:i:s")}}" value="{{date("H:i:s")}}"readonly>
          <label>ชื่อและนามสกุล</label>
          <input class="form-control" type="text" name="name" placeholder="" >
          <label>เบอร์ติดต่อ</label>
          <input class="form-control" type="text" name="phonenumber" placeholder="" >
          <label>อีเมลล์</label>
          <input class="form-control" type="text" name="email" placeholder="" >
          <label>ที่อยู่</label>
          <textarea class="form-control" name="address" rows="3"></textarea>
          <label>เขต/อำเภอ</label>
          <input class="form-control" type="text" name="district" placeholder="" >
          <label>จังหวัด</label>
          <input class="form-control" type="text" name="province" placeholder="" >
          <label>รหัสไปรษณีย์</label>
          <input class="form-control" type="text" name="zipcode" placeholder="" >
          <label>ประเทศ</label>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <select name="country" class="form-control">
              <option selected value="Thailand">ไทย</option>
              <option value="Cambodia">กัมพูชา</option>
              <option value="India">อินเดีย</option>
              <option value="China">จีน</option>
              <option value="Japan">ญี่ปุ่น</option>
              <option value="Laos">ลาว</option>
              <option value="Myanmar">พม่า</option>
              <option value="Philippines">ฟิลิปปินส์</option>
              <option value="Singapore">สิงคโปร์</option>
              <option value="SouthKorea">เกาหลีใต้</option>
              <option value="Turkey">ตุรกี</option>
                  </select>
                </div>
            </div>
            <!-- ปุ่มบันทึกข้อมูล -->
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="บันทึกข้อมูล" />
        </form>
    </div>
    <hr>
    <!-- หน้าที่ 3-->
    <!-- สรุปยอดชำระเงิน page3  -->
    <div class="container">
    <div class="row">
    <div class="text header"><h5>สรุปยอดชำระเงิน</h5></div>
          <div class="container">
            <div class="text-center">
              <span class="pull-left">เสื้อสีขาว x1 </span> <span class="pull-right">350.-</span></br>
              <span class="pull-left">ไปรษณีย์ไทย-ลงทะเบียน</span><span class="pull-right">35.-</span></br>
              <span class="pull-left">ส่วนลดค่าส่ง</span><span class="pull-right">-</span></br>
              <span class="pull-left">ส่วนลดค่าสินค้า</span><span class="pull-right">-</span></br>
              <span class="text-center">รวม</span><span class="pull-right">385.-</span></br>
            </div>
          </div>
        </div>
      </div>
          <hr>
          <!-- ชื่อที่อยู่ในการจัดส่ง รับค่ามาจาก DB -->
          <div class="container">
            <div class="row">
          <div class="text header"><h5>ชื่อที่อยู่ในการจัดส่ง</h5></div>&nbsp;&nbsp;
          <div class="pull-left">
          <span class="pull-left">{{ $data->name }}</span><br>
          <span class="pull-left">ที่อยู่ :&nbsp;{{ $data->address }}&nbsp;{{ $data->district }}&nbsp;{{ $data->province }}&nbsp;
            {{ $data->country }}&nbsp;{{ $data->zipcode }}</span></br>
          <span class="pull-left">เบอร์โทรศัพท์:&nbsp;{{ $data->phonenumber }}</span></br>
          <span class="pull-left">อีเมล์ :&nbsp;{{ $data->email }}</br>
        </div>
        </div>
      </div>
          <hr>
          <!-- หลักฐานการโอน -->
          <h5>หลักฐานการโอน</h5>
          <div class="container">
            <div class="row">
          <span class="pull-left">วันที่</span><br>
          <span class="pull-left">เวลา</span><br>
          
          </div>
          </div>
          <hr>
          <!-- ตรวจสอบสถานะการส่ง -->
    </div><!-- </div> container -->
  </body>
  <script>
      $(document).ready(function(){
        console.log("in document");
      $("#NMRadio").click(function(){
        var radioValue = $("input[name='Radio']:checked").val();
        console.log(radioValue);
      });
      $("#EMSRadio").click(function(){
        var radioValue = $("input[name='Radio']:checked").val();
        console.log(radioValue);
      });

      function calculatePrice(){

        var amount =   $("#amount").val();
        var price =   $("#price").val();

        $("#total").val(amount * price);

      }
    })
    </script>
</html>
