<?php

namespace App\Http\Controllers\Web;

use App\Helpers\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\LayoutRequest;
use App\Models\Layout;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index(){
        $layouts = Layout::latest()->get();
        return view("projects.layouts.index", compact("layouts"));
    }

    public function update(LayoutRequest $request, Layout $layout){
        $layout->update([
            "group" => $request->get('group'),
            "title" => $request->get('title'),
            "image" => $request->file('image') ? File::storeImage($request->file('image'), $request->get('title'), 'layouts') : $layout->image
        ]);
        return $this->updated();
    }

    public function destroy(Layout $layout){
        $layout->delete();
        return $this->deleted();
    }
}
