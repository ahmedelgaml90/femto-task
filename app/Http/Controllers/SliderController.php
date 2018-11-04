<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//=========== add by my ==========//
use App\Http\Requests\SliderRequest;  //============ request for this controller ==========//
use App\Slider;   //========= admin model =============//

class SliderController extends Controller {

    //=======  request and model and view file =============//
    public function __construct(SliderRequest $request, Slider $model) {
        $this->request = $request;
        $this->model = $model;
        $this->view = 'admin/slider/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (is_null($this->request->value)) {
            $slider = $this->model->paginate(25);
        } else {
            $this->request->flash();
            $slider = Slider::where('title', 'like', "%{$this->request->value}%")
                    ->paginate(25);
        }
        $slider->setPath('slider');
        if ($this->request->ajax()) {
            return response()->json(view($this->view . 'loop', compact('slider'))->render());
        }
        return View($this->view . 'index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *  
     * @return Response
     */
    public function store() {
        $insert = $this->model->create($this->request->all());
        if ($insert) {
            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' =>"Done .. This Add Process Done Successfully"));
            return redirect()->back()->with('success', trans('lang.addedsuccessfully'));
        }
        else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('lang.addedfailed')));
            return redirect()->back()->with('failed', trans('lang.addedfailed'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
         $admin = $this->model->find($id);
         if ($admin) {
            return View($this->view . 'edit', compact('admin'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $update = $this->model->find($id)->update($this->request->all());
        if ($update) {
            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' =>"Done .. This Update Process Done Successfully"));

            return redirect()->back()->with('success', trans('message.updatedsuccessfully'));
        }else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', 'message' => trans('lang.updatedfailed')));

            return redirect()->back()->with('failed', trans('message.updatedfailed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $delete = $this->model->destroy($id);
        if ($delete) {
            if ($this->request->ajax())
                return response()->json(array('status' => 'true', 'message' => trans('lang.deletedsuccessfully')));

            return redirect()->back()->with('failed', trans('lang.deletedsuccessfully'));
        }
        else {
            if ($this->request->ajax())
                return response()->json(array('status' => 'false', trans('lang.deletedfailed')));
            return redirect()->back()->with('failed', trans('lang.deletedfailed'));
        }
    }

}
