<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//========= admin model =============//
use App\Main;
use App\Slider;
use App\Meta;
use App\Skill;
use App\Aboutus;
use App\Teamwork;
use App\Client;
use App\Service;
use App\Project;
use App\Photo;
use App\Process;
use App\Offer;
use App\Cat;
use App\BlogCat;
use App\Blog;
use App\Customers;
use App\Slider2;
use App\Timelines;

class AboutusController extends Controller {

    public function index() {
        
        
        $main=Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(1);
        $skills = Skill::all();
        $team = Teamwork::all();
        $features = Aboutus::all();
        $customers = Customers::all();
        $slider2 = Slider2::where('status', 1)->get();

        $services = Service::all();
        $process = Process::all();
        $offers = Offer::all();
        $projects = Project::where('projects', 1)->get();
        
         $blogs = Blog::select('id', 'photo', 'title', 'created_at', 'photo_alt','custom_url','desc')->orderBy('id','desc')->where('status',1)->get();
        $clients=  Client::all();
        return view('site.home', compact('slider', 'meta', 'skills', 'team','features','clients','main','services','offers','projects','blogs','process','customers','slider2'));
    }
      public function aboutus() {
        $main=Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(1);
        $skills = Skill::all();
        $team = TeamWork::all();
        $features = Aboutus::all();
        $process = Process::all();
        $timeline =Timelines::all();
        $customers = Customers::all();
        $clients=  Client::all();
        return view('site.aboutus', compact('slider', 'meta', 'skills', 'team','features','clients','main','process','customers','timeline'));
    }

}
