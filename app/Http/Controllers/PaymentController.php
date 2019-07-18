<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Userbilling;
use App\Usershipping;
use App\Preorder;
use App\Tempcart;
use App\Shop;
use DB;

class PaymentController extends Controller
{
    public function placeorder(Request $request)
    {
        $session_id = Session::getId();

        $country = $request->get('country');
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $companyname = $request->get('companyname');
        $address = $request->get('address');
        $address2 = $request->get('address2');
        $towncity = $request->get('towncity');
        $stateprovince = $request->get('stateprovince');
        $zippostalcode = $request->get('zippostalcode');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $payment_method = $request->get('payment_method');
        $order_id = $request->get('order_id');
        $order_total = str_replace(',','',trim($request->get('order_total'),'$'));
        $user_id = Auth::User()->id;
        

        DB::beginTransaction();
        try {
            $usershipping = new Usershipping();
            $usershipping ->user_id= $user_id;
            $usershipping ->fname= $fname;
            $usershipping ->lname= $lname;
            $usershipping ->address1= $address;
            $usershipping ->address2= $address2;
            $usershipping ->city= $towncity;
            $usershipping ->state= $stateprovince;
            $usershipping ->postal_code= $zippostalcode;
            $usershipping ->email= $email;
            $usershipping ->phone= $phone;
            $usershipping ->status= '1';
            $usershipping ->save();
            $shipping_id = $usershipping->id;

            $userbilling = new Userbilling();
            $userbilling ->user_id= $user_id;
            $userbilling ->fname= $fname;
            $userbilling ->lname= $lname;
            $userbilling ->address1= $address;
            $userbilling ->address2= $address2;
            $userbilling ->city= $towncity;
            $userbilling ->state= $stateprovince;
            $userbilling ->postal= $zippostalcode;
            $userbilling ->email= $email;
            $userbilling ->phone= $phone;
            $userbilling ->status= '1';
            $userbilling ->save();
            $billing_id = $userbilling->id;

            $tempcart = Tempcart::where('session_id',$session_id)->where('user_id',$user_id)->get();
            $data=[];
            foreach($tempcart as $details)
            {
                $shop = Shop::where('id',$details->product_id)->first();
                $data[]=[
                    'user_id' =>$user_id,
                    'order_id' =>$details->order_id,
                    'product_id' =>$details->product_id,
                    'product_name' =>$shop->name,
                    'shipping_id' =>$shipping_id,
                    'billing_id' =>$billing_id,
                    'payment_name' =>$payment_method,
                    'order_total' =>$order_total,
                    'order_status' =>'1',
                    'created_at' =>date("Y-m-d H:i:s"),
                    'updated_at' =>date("Y-m-d H:i:s")
                ];
            }
            Preorder::insert($data);
            DB::commit();

            return 'success';
        }catch (\Exception $e) {				
            DB::rollback();
            return 'fail';
        //return Redirect::to('success');
        }
        
    }

    
}
