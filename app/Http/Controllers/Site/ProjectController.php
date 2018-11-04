<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//========= admin model =============//
use App\Main;
use App\Slider;
use App\Meta;
use App\Project;
use App\Cat;
use App\BlogCat;
use App\Blog;
use App\Process;
use App\Productsbenefits;

class ProjectController extends Controller {
    
    public function index() {
        
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(3);
        $process = Process::all();
        $projects = Project::where('projects', 1)->orderBy('id', 'desc')->get();
        return view('site.projects', compact('slider', 'meta', 'projects', 'main','process'));
    }

    public function portfolio() {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(2);
        $projects = Project::where('portfolio', 1)->orderBy('id', 'desc')->paginate(10);

        $cats=Cat::All();
        return view('site.portfolio', compact('slider', 'meta', 'projects', 'main','cats'));
    }
    

    public function singlecase($id) {
        
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $meta = Meta::find(2);
        $projects = Project::where('id', $id)->first();
       
        
        $related = Project::where('cat_id', $projects->cat_id)->where('id', '<>', $projects->id)->get()->take('6');
        $cats=Cat::All();
        return view('site.Single_case', compact('slider', 'meta', 'projects', 'main','cats','related'));
    }
    
    public function blogcat() {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $cat = BlogCat::all();
        $meta = $cat;

        if (!empty($cat)) {
            $blogs = Blog::select('id', 'photo', 'title', 'created_at', 'photo_alt','custom_url','desc')->orderBy('id','desc')->where('status',1)->where('cat_id',$cat->id)->get();
            return view('site.cat', compact('blogs', 'cat', 'main', 'cats', 'slider', 'meta'));
        } else {
            abort(404);
        }
    }
    
     public function singleblog($id) {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $blog= Blog::where('custom_url', $id)->get()->first();
      //  $meta = $cat;
        $cat = BlogCat::all();
        $latest =Blog::where('status',1)->orderby('id','desc')->paginate(4);

           // $blogs = Blog::select('id', 'photo', 'title', 'created_at', 'photo_alt','custom_url','desc')->orderBy('id','desc')->where('status',1)->where('cat_id',$cat->id)->get();
            return view('site.singleblog', compact('blogs','blog', 'main', 'cat', 'slider', 'meta','latest'));
        
    }
    
     public function blog() {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $blog =Blog::paginate(5);
        $latest =Blog::where('status',1)->orderby('id','desc')->paginate(4);


        $cat = BlogCat::all();
        $meta = $blog;
         if (!empty($blog)) {
        // $relateds=Blog::select('id','title','photo','photo_alt','custom_url','created_at','cat_id')->ere('status',1)->where('id','<>',$blog->id)->where('cat_id',$blog->cat_id)->orderBy('created_at','desc')->get()->take(3);
             return view('site.blog', compact('blog', 'main', 'cat', 'slider', 'meta','relateds','latest'));
        } else {
            abort(404);
        }
    }
    public function project($id) {
        $main = Main::find(1);
        $slider = Slider::where('status', 1)->get();
        $blog = Project::where('custom_url', $id)->get()->first();
        $products = Productsbenefits::where('product_id',$blog->id)->get();

        $meta = $blog;
         if (!empty($blog)) {
        // $relateds=Blog::select('id','title','photo','photo_alt','custom_url','created_at','cat_id')->where('status',1)->where('cat_id',$blog->cat_id)->orderBy('created_at','desc')->get()->take(3);
             return view('site.project', compact('blog', 'main', 'cats', 'slider', 'meta','relateds','products'));
        } else {
            abort(404);
        }
    }

}
