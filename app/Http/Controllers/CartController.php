<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Shop;
use App\Tempcart;

class CartController extends Controller
{
    public function addcart(Request $request)
    {
        $quantity = $request->get('quantity');
        $product_id = $request->get('product_id');
        $session_id = Session::getId();
        if($this->checksessionexists($session_id) >0)
        {
            Tempcart::where('session_id',$session_id)->increment('quantity',$quantity);
            return 'Cart updated successfully';
        }
        else
        {
            $tempcart = new Tempcart();
            $tempcart ->product_id= $product_id;
            $tempcart ->size_id= $product_id;
            $tempcart ->color_id= $product_id;
            $tempcart ->quantity= $quantity;
            $tempcart ->user_id= $product_id;
            $tempcart ->session_id= $session_id;
            $tempcart ->status= $product_id;
            $tempcart ->save();

            return 'Cart updated successfully';
        }
    }

    public function checksessionexists($session_id)
    {
        $exists = Tempcart::where('session_id',$session_id)->count();
        //dd($exists."---".$session_id);
        return $exists;
    }

    
}
