
<table id="ordertable" class="table table-bordered table-striped" style="width: 100%">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>เบอร์โทรศัพท์</th>
        <th>วันที่เปิดบิล</th>
        <th>วันที่แก้ไข</th>
        <th>ยอดรวม</th>
        <th>รายละเอียด</th>
        <th>สถานะ</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        @foreach($orders as $row)
            <td>
                <a href="{{url("order")."/".$row->order_id}}">
                     {{$row->order_id}}
                </a>
            </td>
            <td>{{$row->phone}}</td>
            <!-- updated_at -->
            <td>{{$row->created_at}}</td>
            <td>{{$row->updated_at}}</td>
            <td>{{$row->total}}</td>

            <td>
                @php $products = $list_orderpd[$row->order_id] @endphp
               @foreach($products as $orderProduct )
                   {{$orderProduct->name}} x {{$orderProduct->amount}} <br>
                @endforeach
            </td>
            <td>
            {{$row->statusName}}
            <td>
                    <input type="text" name="tracking_no" value="{{$row->tracking_no}}" id="tracking_no_{{$row->order_id}}">
                    <select class="status_select_ship" data="{{$row->order_id}}">
                        <option value='TO SHIP'>To Ship</option>
                        <option value='COMPLETE'>Sent</option>
                    </select>
                    <a href="{{url("orderproduct")."/".$row->order_id}}">
                        <button type ="button" class="btn btn-primary">แก้ไข</button>
                    </a>
            </td>
    </tr>
    @endforeach
</table>

<script>
    $(".status_select_ship").change(function () {

        var id = $(this).attr("data");
        var value = $(this).val();
        var tracking_no_input = "#tracking_no_"+id;
        alert(tracking_no_input);
        var tracking_no = $(tracking_no_input).val();
        alert(tracking_no);

        var url = "{{url('update')}}" + "?id=" + id  + "&status=" + value + "&tracking_no=" + tracking_no;

        var retVal = confirm("บันทึกการเปลี่ยนแปลงใช่หรือไม่ ?");
        if( retVal == true ) {
            window.location = url;
        }

    });


</script>