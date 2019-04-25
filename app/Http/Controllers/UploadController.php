<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
  function index(){
    return view('upload');
  }
  function upload(Request $request){
  dump($request->payment,$request->hasFile('payment'));
    $this->validate($request,
    ['payment' => 'required|image|mimes:jpg,jpeg,png,gif']);
    if ($request->hasFile('payment')) {
      $image = $request->file('payment');
      $name = time().'_'.$phonenumber.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $image->move($destinationPath, $name);
      return back()->with('success','Image Upload successfully');
    } else {
      return back()->with('success','Image Upload fail');
    }
  }
}
