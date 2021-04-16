<?php

namespace App\Http\Controllers\Web;

use App\Helpers\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\FontRequest;
use App\Models\Font;

class FontController extends Controller
{
    public function index(){
        $fonts = Font::latest()->get();
        return view("projects.fonts.index", compact("fonts"));
    }

    public function update(FontRequest $request, Font $font){
        $font->update([
            "title" => $request->get('title'),
            "image" => $request->file('image') ? File::storeImage($request->file('image'), $request->get('title'), 'fonts') : $font->image
        ]);
        return $this->updated();
    }

    public function destroy(Font $font){
        $font->delete();
        return $this->deleted();
    }
}
