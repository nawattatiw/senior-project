<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;
use App\Product;
use Carbon\Carbon;

class OrderproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new OrderProduct();
        $products = Product::all();
        $data->order_id = Carbon::now()->timestamp;
        $order_products = orderproduct::all();

        return view('layout.OrderProduct',['order'=>$data, 'products' => $products , 'orderpd'=>$order_products],compact('data'));
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

      $order_products = new OrderProduct(
      [
      'orderid' => $request->get('orderid'),
      'productid' => $request->get('productid'),
      'amout' => $request->get('amout'),
      'price' => $request->get('price'),
      'total' => $request->get('total')
      ]
          );
      $order_products->save();
      return redirect()->route('orderproduct.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = OrderProduct::find($id);
      if( $data == null ){
        $data = new OrderProduct();
      }
      return view('layout.OrderProduct', ['data'=>$data,]);
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
}
