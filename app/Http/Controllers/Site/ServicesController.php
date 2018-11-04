<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactusRequest;
//========= admin model =============//
use App\Main;
use App\Slider;
use App\Meta;
use App\Service;
use App\ServicesTools;
use App\Photo;
use App\Process;
use App\Offer;
use App\Contactus;
use App\TopServices;
use App\Subscribe;
use Mail;


class ServicesController extends Controller {

    public function index() {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(4);
        $services = Service::all();
        $process = Process::all();
        $offers = Offer::all();
        $photoes = Photo::all();
        $topservices =TopServices::all();
        
        return view('site.services', compact('slider', 'meta', 'services', 'process', 'offers', 'photoes', 'main','topservices'));
    }

  public function singleservice($id) {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(4);
        $services = Service::where('custom_url',$id)->first();
        $singleservice = ServicesTools::where('service_id', $services->id)->get();
        $process = Process::all();
        $offers = Offer::all();
        $photoes = Photo::all();
        return view('site.singleservice', compact('slider', 'meta', 'services', 'process', 'offers', 'photoes', 'main','singleservice'));
    }

    public function contact() {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(5);
        $services = Service::all();
        $process = Process::all();
        $offers = Offer::all();
        $photoes = Photo::all();
        return view('site.contactus', compact('slider', 'meta', 'services', 'process', 'offers', 'photoes', 'main'));
    }

    public function submitcontactus(ContactusRequest $request) {
        $model = new Contactus();
        $insert = $model->create($request->all());
        if ($insert) {
        
        $name = $request->get('name');
        $email = $request->get('email');
        $subject= $request->get('subject');
        $content= $request->get('message');
         Mail::send('emails.index', compact('name', 'email', 'subject', 'content'), function ($message) {
            $message->to('projects@mm4web.net')
                ->from('no-replay@jobs.com', 'ContactUs Message');
        });
            if ($request->ajax())
                return response()->json(array('status' => 'true', 'message' => "Done Successfully, Your Message is Sent"));
            return redirect()->back()->with('success', "Done Successfully, Your Message is Sent");
        }
        else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('lang.addedfailed')));
            return redirect()->back()->with('failed', trans('lang.addedfailed'));
        }
    }
    public function subscribe(Request $request) {
            // return response()->json(array('status' => 'true', 'message' => "Service is pending"));

        $insert = new Subscribe();
        $insert->email=$request->email;
        $insert->save();
        if ($insert) {
    
        $email = $request->get('email');
        
         Mail::send('emails.subscribe', compact('email'), function ($message) {
            $message->to('projects@mm4web.net')
                ->from('no-replay@jobs.com', 'New Subscribe From Website');
        });
            if ($request->ajax())
                return response()->json(array('status' => 'true', 'message' => "Done Successfully,Thanks For Your Subscription"));
            return redirect()->back()->with('success', "Done Successfully, Your Message is Sent");
        }
        else {
            if ($request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('lang.addedfailed')));
            return redirect()->back()->with('failed', trans('lang.addedfailed'));
        }
    }

}
