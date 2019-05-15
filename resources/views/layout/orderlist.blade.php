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
                    <h3 align="center">รายการขาย
                        @if($page == "all")
                           ทั้งหมด
                        @elseif($page == "check")
                         รอตรวจสอบ
                        @elseif($page == "ship")
                            รอจัดส่ง
                        @endif
                    </h3>
                </div>
                <div class="row">
                    @if($page == "all")
                        @include('layout.component.tableAll')
                    @elseif($page == "check")
                        @include('layout.component.tableCheck')
                    @elseif($page == "ship")
                        @include('layout.component.tableShip')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-body">
                <img width="450px" src=""  id="image-modal" class="img-responsive">
        </div>
      </div>
    </div>
</div>




<!-- $order -->
<script type ="text/javascript">


    $(".image-click").click(function () {

        var image_link = $(this).attr('src');
        $("#image-modal").attr('src',image_link);
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });



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






</script>
</body>
</html>
