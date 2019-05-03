<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Order List</title>
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


            <a href="{{url("orderlist?page=all")}}"> <button class="btn btn-outline-info"> All </button> </a>
            <a href="{{url("orderlist?page=check")}}"><button class="btn btn-outline-info" > To Check </button></a>
            <a href="{{url("orderlist?page=ship")}}"> <button class="btn btn-outline-info"> To Ship </button></a>

            <div class="container">
                <div class="row">
                    <h3 align="center">รายการขาย</h3>
                </div>
                <div class="row">
                    <table id="ordertable" class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Phone</th>
                            <th>ชื่อ</th>
                            <th>วันที่แก้ไข</th>
                            <th>sku</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            @foreach($orderpd as $row)
                                <td><a href="{{url("order")."/".$row->order_id}}">

                                        {{$row->order_id}}

                                    </a> </td>
                                <td>{{$row->billaddress}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->updated_at}}</td>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->price}}</td>
                                <th>
                                    @if($page == "all")
                                        999/99 ถนน พหลโยธิน ลาดยาว ดอนเมือง กรุงเทพ 10210
                                    @elseif($page == "check")

                                        <img width="150px" src="{{asset("images/slip.jpg")}}" alt="">

                                    @elseif($page == "ship")
                                        999/99 ถนน พหลโยธิน ลาดยาว ดอนเมือง กรุงเทพ 10210
                                    @endif




                                </th>
                                <td>
                                    @if($page == "all")
                                       Completed
                                    @elseif($page == "check")

                                        To Check

                                    @elseif($page == "ship")

                                        To Ship
                                    @endif
                                </td>
                                <td>
                                    @if($page == "all")
                                        <button type ="button" class="btn btn-primary">EDIT</button>
                                    @elseif($page == "check")

                                        <select class="status_select">
                                            <option>Pending</option>
                                            <option>Approve</option>
                                            <option>Reject</option>
                                        </select>
                                        <button type ="button" class="btn btn-primary">EDIT</button>

                                    @elseif($page == "ship")

                                        <select class="status_select">
                                            <option>To Ship</option>
                                            <option>Sent</option>
                                        </select>
                                        <button type ="button" class="btn btn-primary">EDIT</button>
                                    @endif





                                    {{--<form method="post" class ="delete_form" action="{{action('OrderProductController@destroy',$row['id'])}}">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<input  type="hidden" name="_method" value="CONFIRM" />--}}
                                    {{--<button type ="hidden" class="btn btn-danger">Reject</button>--}}
                                    {{--</form>--}}

                                    {{--<form method="post" class ="delete_form" action="{{action('OrderProductController@destroy',$row['id'])}}">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<input  type="hidden" name="_method" value="DELETE" />--}}
                                    {{--<button type ="hidden" class="btn btn-danger">DELETE</button>--}}
                                    {{--</form>--}}
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

        $('#ordertable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel'
            ]
        });

    });

    $(".status_select").change(function () {

        alert("Are you sure?");
    })


</script>
</body>
</html>
