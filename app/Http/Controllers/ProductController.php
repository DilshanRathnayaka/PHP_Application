<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    function insert(Request $req){
        $name = $req->get('name');
        $price = $req->get('price');
        $status = $req->get('status');
        $image = $req->file('image')->getClientOriginalName();
        //move uploaded files
        $req->image->move(public_path('images'),$image);

        $prod =new product();
        $prod->name =$name;
        $prod->price =$price;
        $prod->status=$status;
        $prod->image =$image;
        $prod->save();
        return redirect('dashboard');
    }

  
    function readdata(){
        $pdata = product::all();
        return view('table',['data'=>$pdata]);
    }

    function updateordelete(Request $req){
           $id =$req->get('id');
           $name =$req->get('name');
           $price =$req->get('price');
           $status =$req->get('status');
           if($req->get('update')=='Update'){
              return view('update',['id'=>$id,'name'=>$name,'price'=>$price,'status'=>$status]);
           }
           else{
            echo $prod = product::find($id);
            $prod->delete();
           }
           return redirect('table');

    }
    
    function update(Request $req){
        $ID =$req->get('id');
        $Name =$req->get('name');
        $Price =$req->get('price');
        $Status =$req->get('status');
        $prod = product::find($ID);
        $prod ->name=$Name;
        $prod ->price=$Price;
        $prod ->status=$Status;
        $prod->save();
        return redirect('table');
    }
}
