<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Validator;

class Products extends Controller
{
    function save(Request $req)
    {

        $validate = Validator::make($req->all(), [
          'name' => "required"
        ]);

        if($validate->fails()){
            return response()->json(['error'=>$validate->errors()],401);
        }

        $product = New Product;
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;

        if($product->save()){
            return "Product has been saved";
        }
    }

    function update(Request $req){
        $product = Product::find($req->id);
        $product->category = $req->category;
        if($product->save()){
            return ['Result' => "success","msg" => "data is updated"];
        }
    }

}
