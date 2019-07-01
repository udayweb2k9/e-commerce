<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contentabout;
use Response;

class ContentAboutController extends Controller
{
    //
	public function about()
    {
        $contentabout = Contentabout::where('page_title','about-us')->first();
        return view('about');
    }

    public function addabout()
    {
        return view('addabout');
    }

    public function storeabout(Request $request)
    {
        $status = 1;
        $page_title = 'about-us';
        
        $contentabout=new Contentabout();
        $contentabout->page_title = $page_title;
        $contentabout->display_title = $request->get('display_title');
        $contentabout->page_content = $request->get('page_content');
        $contentabout->status = $status;        
        $contentabout->save();

        $success_array = ['success' => 'true','error_code' => 200, 'msg' => 'Data Added Successfully.'];
			
        return Response::json($success_array);

    }
}
