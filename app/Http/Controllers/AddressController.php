<?php

namespace App\Http\Controllers;

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
      return view('layout.order', ['data'=>$data,]);
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
            $address= new addressuser([
      'name' => $request->get('name'),
      'phonenumber' => $request->get('phonenumber'),
      'price' => $request->get('price'),
      'email' => $request->get('email'),
      'address' => $request->get('address'),
      'district' => $request->get('district'),
      'province' => $request->get('province'),
      'zipcode' => $request->get('zipcode'),
      'country' => $request->get('country'),
      'create_at' => $request->get('create_at'),
      ]);
      $address->save();
      return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = AddressUser::find($id);
      if($data){
        $order_products = orderproduct::with("billaddress")->where("billaddress","=","$data->phonenumber")->get();

      }
      return view('layout.order', ['data'=>$data,'orderpd'=>$order_products]);
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
