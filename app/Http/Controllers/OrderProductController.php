<?php

namespace App\Http\Controllers;


use App\Orders;
use Illuminate\Http\Request;
use App\OrderProduct;
use App\Product;
use Carbon\Carbon;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $order = new Orders();
        $data = new OrderProduct();
        $products = Product::all();
        $order->order_id = Carbon::now()->timestamp;
        $data->billaddress = "";
        $order_products = [];

        return view('layout.orderproduct',['order'=>$order,'order_products'=>$data, 'products' => $products , 'orderpd'=>$order_products],compact('data'));
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

        $product_id = $request->get('product_id');
        $order_id = $request->get('order_id');
        $amount = $request->get('amount');
        $price = $request->get('price');
        $total = $request->get('total');
        $billaddress = $request->get('billaddress');

       //Check Order Exist
        $order = Orders::where("order_id",$order_id)->first();
        if(!$order){
            $order = new Orders();
            $order->order_id = $order_id;

        }
        $order->phone = $billaddress;
        $order->save();


        //Check product is already added?
        $order_products = OrderProduct::where("order_id",$order_id)->
                                where("product_id",$product_id)->first();

        if(!$order_products){
            $order_products = new OrderProduct();
            $order_products->order_id = $order_id;
            $order_products->product_id = $product_id;
        }

        $order_products->billaddress = $billaddress;
        $order_products->amount = $amount;
        $order_products->price = $price;
        $order_products->total = $total;
        $order_products->save();


        return redirect('orderproduct/'.$order_id);
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


        $order_products = OrderProduct::where("order_id",$id)->first();

        if ($order_products == null){
            $order_products = new OrderProduct();
            $products = Product::all();
            $order_products->order_id = $id;
            $order_products->billaddress = "";
            $order_products_list = [];
        }else{
            $order_products_list = OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
                ->select('order_products.*', 'products.name', 'products.sku' )
                ->where("order_products.order_id",$id)->get();
        }



        $products = Product::all();

        return view('layout.orderproduct',['order'=>$order,  'products' => $products , 'orderpd'=>$order_products_list]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $order_products = orderproduct::find($id);
        $order_products->delete();
        return redirect()->route('orderproduct.index')->with('success', 'ลบข้อมูลเรียบร้อย');
      }


    public function list(){

       $page = request()->has('page') ? request()->get('page') : 'all';

        $data =  $order_products_list =
            OrderProduct::join('products', 'order_products.product_id', '=', 'products.no')
            ->select('order_products.*', 'products.name', 'products.sku' )->get();

        return view('layout.orderlist',[ 'orderpd'=>$data, "page" => $page],compact('data'));
    }

    public function statistic(){


        return view('layout.statistic');
    }
}
