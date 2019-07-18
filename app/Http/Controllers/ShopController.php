<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shop;
use App\Productcolor;
use App\Productsize;
use Carbon\Carbon;

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
        //dd(Shop::where('status',1)->where('id',$id)->first());
        $shop = Shop::where('status',1)->where('id',$id)->first();
        //dd($shop->toArray());
        $color_arr=[];
        if(Productcolor::where('product_id',$id)->count()>0)
        {
            $productcolor = Productcolor::where('product_id',$id)->get();
            foreach($productcolor as $color)
            {
                $color_arr[]=[
                    'id' => $color->id,
                    'product_id' => $color->product_id,
                    'color_code' => $color->color_code,
                ];
            }
        }
        
        $size_arr=[];
        if(Productcolor::where('product_id',$id)->count()>0)
        {
            $productsize = Productsize::where('product_id',$id)->get();
            foreach($productsize as $size)
            {
                $size_arr[]=[
                    'id' => $size->id,
                    'product_id' => $size->product_id,
                    'size_value' => $size->size_value,
                ];
            }
        }
        
        //dd($size_arr);
        $product_arr=[
            'id' => $shop->id,
            'product_name' => $shop->name,
            'status' => $shop->status,
            'new_arrival' => $shop->new_arrival,
            'product_description' => $shop->product_description,
            'product_price' => number_format($shop->price,2),
            'product_manufacturer' => $shop->product_manufacturer
        ];
        //}
        return view('productdetails',['shop'=>$product_arr, 'product_color'=>$color_arr, 'product_size'=>$size_arr]);
    }
}
