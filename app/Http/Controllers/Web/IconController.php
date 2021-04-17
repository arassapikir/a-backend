<?php

namespace App\Http\Controllers\Web;

use App\Helpers\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\IconRequest;
use App\Models\Icon;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function index(){
        $icons = Icon::latest()->get();
        return view("projects.icons.index", compact("icons"));
    }

    public function update(IconRequest $request, Icon $icon){
        $icon->update([
            "title" => $request->get('title'),
            "image" => $request->file('image') ? File::storeImage($request->file('image'), $request->get('title'), 'fonts') : $icon->image
        ]);
        return $this->updated();
    }

    public function destroy( Icon $icon){
        $icon->delete();
        return $this->deleted();
    }
}
