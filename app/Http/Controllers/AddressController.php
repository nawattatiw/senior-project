<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use App\AddressUser;
use App\OrderProduct;
use App\Product;
use Carbon\Carbon;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = new AddressUser();
      return view('layout.toPay', ['data'=>$data,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_id = $request->get('order_id');
        $url = "";

        if ($request->hasFile('slip_image')) {
            $image = $request->file('slip_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/slip/');
            $image->move($destinationPath, $name);

            $url = asset('/images/slip')."/".$name;
        }else{
            return  redirect('order/'.$order_id);
        }

        $order = Orders::where("order_id",$order_id)->first();

        $phonenumber = $request->get('phonenumber');
        $ship_plan = $request->get('ship_plan');
        $ship_cost = $request->get('ship_cost');


        $order->phone = $phonenumber;
        $order->ship_plan = $ship_plan;
        $order->ship_cost = $ship_cost;
        $order->slip_image_url = $url;
        $order->total=$order->product_cost+$ship_cost;
        $order->status = "TO CHECK";

        $order->save();

        $address = AddressUser::where("phonenumber",$phonenumber)->first();

        if(!$address){
            $address = new AddressUser();
        }

        $address->name = $request->get('name');
        $address->phonenumber = $phonenumber;
        $address->email = $request->get('email');
        $address->address = $request->get('address');
        $address->sub_district = $request->get('subdistrict');
        $address->district = $request->get('district');
        $address->province = $request->get('province');
        $address->zipcode = $request->get('zipcode');
        $address->save();

      return  redirect('order/'.$order_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::where("order_id",$id)->first();

        if($order){
          if($order->status == "TO PAY"){
              return $this->generateCustomerToPay($order);
          }elseif($order->status == "TO CHECK"){
              return $this->generateCustomerToCheck($order);

          }elseif($order->status == "TO SHIP"){
              return $this->generateCustomerToShip($order);

          }
          elseif($order->status == "COMPLETE"){
              return $this->generateCustomerToComplete($order);
          }
        } else {
          dd('order not found');
        }

    }

    public function generateCustomerToPay($order){
        $order_id = $order->order_id;

        $order_products = OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
            ->select('order_products.*', 'products.name', 'products.sku' )
            ->where("order_products.order_id",$order_id)->get();

        // CALCULATE PRODUCT PRICE
        $product_price = 0 ;

        foreach ($order_products as $product){
            $product_price = $product_price + $product->total;
        }

        $order->product_cost  = $product_price;
        if($order->ship_plan == ""){
            $order->ship_plan = "ไปรษณีย์-ลงทะเบียน";
            $order->ship_cost = "35";
        }
        $order->update();

        if($order){

            $phone_number = $order->phone;

            $address = AddressUser::where("phonenumber",$phone_number)->first();

            if(!$address){
                $address = new AddressUser();
                $address->phonenumber = $phone_number;
                $address->save();
            }
        }else{

            dd( "No order" );
        }

        return view('layout.toPay', ['address'=>$address,"order"=>$order,'orderpd'=>$order_products]);
    }

    public function generateCustomerToCheck($order){
        $order_id = $order->order_id;

        $order_products = OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
            ->select('order_products.*', 'products.name', 'products.sku' )
            ->where("order_products.order_id",$order_id)->get();


        // CALCULATE PRODUCT PRICE
        $product_price = 0 ;

        foreach ($order_products as $product){
            $product_price = $product_price + $product->total;
        }

        $order->product_cost  = $product_price;
        if($order->ship_plan == ""){
            $order->ship_plan = "ไปรษณีย์-ลงทะเบียน";
            $order->ship_cost = "35";
            $order->status = "TO SHIP";
        }
        $order->save();


        if($order){

            $phone_number = $order->phone;

            $address = AddressUser::where("phonenumber",$phone_number)->first();

            if(!$address){
                $address = new AddressUser();
                $address->phonenumber = $phone_number;
                $address->save();
            }
        }else{

            dd( "No order" );
        }

        return view('layout.toCheck', ['address'=>$address,"order"=>$order,'orderpd'=>$order_products]);
    }

    public function generateCustomerToShip($order){
        $order_id = $order->order_id;

        $order_products = OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
            ->select('order_products.*', 'products.name', 'products.sku' )
            ->where("order_products.order_id",$order_id)->get();


        // CALCULATE PRODUCT PRICE
        $product_price = 0 ;

        foreach ($order_products as $product){
            $product_price = $product_price + $product->total;
        }

        $order->product_cost  = $product_price;
        if($order->ship_plan == ""){
            $order->ship_plan = "ไปรษณีย์-ลงทะเบียน";
            $order->ship_cost = "35";
        }
        $order->save();


        if($order){

            $phone_number = $order->phone;

            $address = AddressUser::where("phonenumber",$phone_number)->first();

            if(!$address){
                $address = new AddressUser();
                $address->phonenumber = $phone_number;
                $address->save();
            }
        }else{

            dd( "No order" );
        }

        return view('layout.toShip', ['address'=>$address,"order"=>$order,'orderpd'=>$order_products]);
    }

    public function generateCustomerToComplete($order){
        $order_id = $order->order_id;

        $order_products = OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
            ->select('order_products.*', 'products.name', 'products.sku' )
            ->where("order_products.order_id",$order_id)->get();


        // CALCULATE PRODUCT PRICE
        $product_price = 0 ;

        foreach ($order_products as $product){
            $product_price = $product_price + $product->total;
        }

        $order->product_cost  = $product_price;
        if($order->ship_plan == ""){
            $order->ship_plan = "ไปรษณีย์-ลงทะเบียน";
            $order->ship_cost = "35";
        }
        $order->save();


        if($order){

            $phone_number = $order->phone;

            $address = AddressUser::where("phonenumber",$phone_number)->first();

            if(!$address){
                $address = new AddressUser();
                $address->phonenumber = $phone_number;
                $address->save();
            }
        }else{

            dd( "No order" );
        }

        return view('layout.toComplete', ['address'=>$address,"order"=>$order,'orderpd'=>$order_products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = AddressUser::find($id);
      return view('layout.editaddress',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function list(){

        $page = request()->has('page') ? request()->get('page') : 'all';

        $orders = Orders::join('address', 'orders.phone', '=', 'address.phonenumber')->get();

 //        $data =  $order_products_list =
 //            OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
 //            ->select('order_products.*', 'products.name', 'products.sku' )->get();
         return view('layout.customerlist',[  "page" => $page, "orders" => $orders],compact('orders'));
     }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
