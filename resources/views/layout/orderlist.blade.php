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
        </nav>

        <div class="container-fluid">


            <a href="{{url("orderlist?page=all")}}"> <button class="btn btn-outline-info"> ทั้งหมด </button> </a>
            <a href="{{url("orderlist?page=check")}}"><button class="btn btn-outline-info" > ตรวจสอบ </button></a>
            <a href="{{url("orderlist?page=ship")}}"> <button class="btn btn-outline-info"> จัดส่ง </button></a>

            <div class="container">
                <div class="row">
                    <h3 align="center">รายการขาย</h3>
                </div>
                <div class="row">
                    <table id="ordertable" class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>วันที่เปิดบิล</th>
                            <th>วันที่แก้ไข</th>
                            <th>ยอดรวม</th>
                            <th>หลักฐานการโอน</th>
                            <th>สถานะ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            @foreach($orders as $row)
                                <td><a href="{{url("order")."/".$row->order_id}}">

                                        {{$row->order_id}}

                                    </a> </td>
                                <td>{{$row->phone}}</td>
                                <!-- updated_at -->
                                <td>{{$row->product_cost}}</td>
                                <td>{{$row->ship_cost}}</td>
                                <th>
                                    @if($page == "all")
                                        {{ $row->address." ".$row->sub_district." ".$row->district." ".$row->province." ".$row->zipcode }}
                                    @elseif($page == "check")

                                      <a href="#" data-toggle="modal" data-target="#myModal"><img width="150px" src="{{asset($row->slip_image_url)}}" alt=""></a>

                                    @elseif($page == "ship")
                                        {{ $row->address." ".$row->sub_district." ".$row->district." ".$row->province." ".$row->zipcode }}
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
                                    <a href="{{url("orderproduct")."/".$row->order_id}}">
                                      <button type ="button" class="btn btn-primary">แก้ไข</button>
                                    </a>
                                    @elseif($page == "check")

                                        <select class="status_select">
                                            <option>รอตรวจสอบ</option>
                                            <option>ผ่าน</option>
                                            <option>ไม่ผ่าน</option>
                                        </select>
                                        <a href="{{url("orderproduct")."/".$row->order_id}}"><br>
                                          <button type ="button" class="btn btn-primary">แก้ไข</button>
                                        </a>
                                    @elseif($page == "ship")

                                        <select class="status_select">
                                            <option>To Ship</option>
                                            <option>Sent</option>
                                        </select>
                                        <a href="{{url("orderproduct")."/".$row->order_id}}">
                                          <button type ="button" class="btn btn-primary">แก้ไข</button>
                                        </a>
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
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-body">
                <img width="450px" src="{{asset($row->slip_image_url)}}"  class="img-responsive">
        </div>
      </div>
    </div>
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

        confirm("บันทึกการเปลี่ยนแปลงใช่หรือไม่ ?");
    })


</script>
</body>
</html>
