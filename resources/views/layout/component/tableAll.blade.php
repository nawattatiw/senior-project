
<table id="ordertable" class="table table-bordered table-striped" style="width: 100%">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>เบอร์โทรศัพท์</th>
        <th>วันที่เปิดบิล</th>
        <th>วันที่แก้ไข</th>
        <th>ยอดรวม</th>
        <th>รายละเอียด</th>
        <th>หลักฐานการโอน</th>
        <th>tracking_no</th>
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
            <td>{{$row->created_at}}</td>
            <td>{{$row->updated_at}}</td>
            <td>{{$row->product_cost}}</td>
            <td>
                @php $products = $list_orderpd[$row->order_id] @endphp
               @foreach($products as $orderProduct )
                   {{$orderProduct->name}} x {{$orderProduct->amount}} <br>
                @endforeach
            </td>

            <th>
                <a href="#" data-toggle="modal" data-target="#myModal" >
                    <img class="image-click" width="150px" src="{{asset($row->slip_image_url)}}" alt="">
                </a>
            </th>
            <td>
                {{$row->tracking_no}}
            </td>
            <td>
                {{$row->statusName}}
            </td>
            <td>
                <a href="{{url("orderproduct")."/".$row->order_id}}">
                    <button type ="button" class="btn btn-primary">แก้ไข</button>
                </a>

            </td>
    </tr>
    @endforeach
</table>
