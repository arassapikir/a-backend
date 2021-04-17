<?php

namespace App\Http\Controllers\Web;

use App\Helpers\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::latest()->get();
        return view("projects.colors.index", compact("colors"));
    }

    public function update(ColorRequest $request, Color $color){
        $color->update([
            "title" => $request->get('title'),
            "image" => $request->file('image') ? File::storeImage($request->file('image'), $request->get('title'), 'fonts') : $color->image
        ]);
        return $this->updated();
    }

    public function destroy( Color $color){
        $color->delete();
        return $this->deleted();
    }
}
