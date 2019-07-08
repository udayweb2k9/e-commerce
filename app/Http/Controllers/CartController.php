<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Shop;
use App\Tempcart;

class CartController extends Controller
{
    public function addcart(Request $request)
    {
        $quantity = $request->get('quantity');
        $product_id = $request->get('product_id');
        $selected_color = $request->get('selected_color');
        $selected_size = $request->get('selected_size');
        //echo $product_id."<br>";
        //echo $selected_size."<br>";
        //exit;
        $session_id = Session::getId();
        $user_id=0;
        if(Auth::check()){
            $user_id=Auth::User()->id;
        }
        $status=1;
        if($this->checksessionexists($session_id,$product_id) >0)
        {
            Tempcart::where('session_id',$session_id)->where('product_id',$product_id)->increment('quantity',$quantity);
            return 'success';
        }
        else
        {
            $tempcart = new Tempcart();
            $tempcart ->product_id= $product_id;
            $tempcart ->size_id= $selected_size;
            $tempcart ->color_id= $selected_color;
            $tempcart ->quantity= $quantity;
            $tempcart ->user_id= $user_id;
            $tempcart ->session_id= $session_id;
            $tempcart ->status= $status;
            $tempcart ->save();

            return 'success';
        }
    }

    public function checksessionexists($session_id,$product_id)
    {
        $exists = Tempcart::where('session_id',$session_id)->where('product_id',$product_id)->count();
        //dd($exists."---".$session_id);
        return $exists;
    }

    public function showcart()
    {
        $session_id = Session::getId();
        $cart_details = Tempcart::where('session_id',$session_id)->get();
        //dd($session_id);
        $cart=[];
        $subtotal =0;
        $delivary_price = 0;
        foreach($cart_details as $details)
        {
           
            $shop = Shop::where('id',$details->product_id)->first();
            $subtotal = $subtotal+$shop->price*$details->quantity;
            $cart[]=[
                'id' => $details->id,
                'product_name' => $shop->name,
                'product_price' => number_format($shop->price,2),
                'product_quantity' => $details->quantity,
                'product_price_total' => number_format(($shop->price*$details->quantity),2),
            ];
        }
       
        $delivary = number_format($delivary_price,2);
        $total = number_format(($subtotal+$delivary_price),2);
        $redirect="login";
        if(Auth::check()){
            $redirect = "checkout";
        }
        return view('cart', [
            'cart'=>$cart, 
            'subtotal' =>number_format($subtotal,2), 
            'delivary'=>$delivary, 
            'total' =>$total, 
            'redirect' =>$redirect
        ]);
    }

    public function checkout()
    {
        $session_id = Session::getId();
        $cart_details = Tempcart::where('session_id',$session_id)->get();
        $cart=[];
        $subtotal =0;
        $delivary_price = 0;
        foreach($cart_details as $details)
        {
           
            $shop = Shop::where('id',$details->product_id)->first();
            $subtotal = $subtotal+$shop->price*$details->quantity;
            $cart[]=[
                'id' => $details->id,
                'product_name' => $shop->name,
                'product_price' => number_format($shop->price,2),
                'product_quantity' => $details->quantity,
                'product_price_total' => number_format(($shop->price*$details->quantity),2),
            ];
        }
       
        $delivary = number_format($delivary_price,2);
        $total = number_format(($subtotal+$delivary_price),2);
        return view('checkout', [
            'cart'=>$cart, 
            'subtotal' =>number_format($subtotal,2), 
            'delivary'=>$delivary, 
            'total' =>$total
        ]);
    }

    
}
