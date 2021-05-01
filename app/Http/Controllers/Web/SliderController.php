<?php

namespace App\Http\Controllers\Web;

use App\Helpers\File;
use App\Helpers\Input;
use App\Helpers\Variable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();
        return view("others.sliders.index", compact("sliders"));
    }

    public function store(SliderRequest $request){
        Slider::create([
            'project_id' => Variable::projectId(),
            'action_type' => $request->get('action_type'),
            'action_id' => $request->get('action_id'),
            'image' => File::storeImage($request->file('image'), $this->project->subdomain, 'sliders', "slider"),
        ]);
    }

    public function update(SliderRequest $request, Slider $slider){
        $slider->update([
            'action_type' => $request->get('action_type'),
            'action_id' => $request->get('action_id'),
            'image' => $request->has('image') ? File::storeImage($request->file('image'), $this->project->subdomain, 'sliders', "slider") : $category->image
        ]);
        return $this->updated();
    }

    public function destroy(Slider $slider){
        $slider->delete();
        return $this->deleted();
    }
}
