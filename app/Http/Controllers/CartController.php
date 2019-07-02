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
        $session_id = Session::getId();
        $user_id=0;
        if(Auth::check()){
            $user_id=Auth::User()->id;
        }
        $status=1;
        if($this->checksessionexists($session_id,$product_id) >0)
        {
            Tempcart::where('session_id',$session_id)->where('product_id',$product_id)->increment('quantity',$quantity);
            return 'Cart updated successfully';
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

            return 'Cart updated successfully';
        }
    }

    public function checksessionexists($session_id,$product_id)
    {
        $exists = Tempcart::where('session_id',$session_id)->where('product_id',$product_id)->count();
        //dd($exists."---".$session_id);
        return $exists;
    }

    
}
