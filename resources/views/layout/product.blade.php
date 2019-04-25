<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <div class="container ">
      <br>
      <h3 align="center">บันทึกรายการอาหาร</h3>
      <div class="row">
      <form method="post" action="{{url('product')}}">
      {{ csrf_field() }}
      <div class="form-group">
      <label>ชื่อสินค้า</label>
      <input type="text" name="name" class="form-control" />
      </div>
      <div class="form-group">
      <label>ราคา</label>
      <input type="text" name="price" class="form-control" />
      </div>
      <br>
      <div class="form-group">
      <input type="submit" class="btn btn-primary" value="บันทึก" />
      </div>
    </form>
    </div>
  </div>
  </body>
</html>
