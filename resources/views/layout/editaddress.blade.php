<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>editaddress</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    @if(count($errors) > 0)
      <div class="alert alert-danger">
      <ul> @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
      </ul>
      </div>
    @endif
    <br>
    <div class="text header text-center"><h5>แก้ไขรายชื่อและรายละเอียดการจัดส่ง</h5></div>
   <form method="post" action="{{url('user')}}">
     {{ csrf_field() }}
     <div class="container">
     <div class="row">
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
             <br>
             <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล" />
           </div>
         </div>
       </div>
     </form>
  </form>
    </body>
</html>
