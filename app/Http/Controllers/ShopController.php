<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    public function products()
    {
        $shop = Shop::where('status',1)->orderBy('id','DESC')->get();
        $product_arr=[];
        foreach($shop as $details)
        {
            $product_arr[]=[
                'id' => $details->id,
                'product_name' => $details->name,
                'status' => $details->status,
                'new_arrival' => $details->new_arrival,
                'product_price' => number_format($details->price,2),
            ];
        }
        return view('shop',['shop'=>$product_arr]);
    }

    public function productdetails($id)
    {
        $shop = Shop::where('status',1)->where('id',$id)->first();
        //dd($shop->toArray());
        //$product_arr=[];
        //foreach($shop as $details)
        //{
            $product_arr=[
                'id' => $shop->id,
                'product_name' => $shop->name,
                'status' => $shop->status,
                'new_arrival' => $shop->new_arrival,
                'product_price' => number_format($shop->price,2),
            ];
        //}
        return view('productdetails',['shop'=>$product_arr]);
    }
}
