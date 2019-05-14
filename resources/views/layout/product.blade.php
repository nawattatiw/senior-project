<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>ProductList</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("css/simple-sidebar.css")}}">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>






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
            <div class="container">
                <div class="row">
                    <h3 align="center">รายการสินค้า</h3>
                </div>
                <div class="row">
                    <table id="product" class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>รหัสสินค้า</th>
                            <th>sku</th>
                            <th>ชื่อสินค้า</th>
                            <th>ชนิดสินค้า</th>
                            <th>ราคาทุน</th>
                            <th>คงเหลือ</th>
                            <th>ปริมาณสินค้าขั้นต่ำ</th>
                            <th>รูปภาพ</th>
                            <th>วันที่แก้ไข</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($products as $row)

                                <td>{{$row->id}}</td>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->product_type}}</td>
                                <td>{{$row->default_price}}</td>
                                <td>{{$row->remaining}}</td>
                                <td>{{$row->min_stock}}</td>
                                <th><a href="#" data-toggle="modal" data-target="#myModal"><img width="150px" src="http://shop.kisrasprint.com{{($row->image_url)}}" alt=""></a></th>
                                <td>{{$row->updated_at}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
<script>
$(document).ready( function () {
    $('#product').DataTable();
} );
</script>
</div>
</body>
</html>
