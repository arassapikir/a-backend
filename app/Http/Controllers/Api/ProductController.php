<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductShowResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request){
        $per_page = $request->has('per_page') ? $request->get('per_page') : 10;
        $products = Product::query()->where('project_id', $this->project->id);
        if ($request->has('category_id')){
            $products->where('category_id', $request->get('category_id'));
        }
        if ($request->has('q') && strlen($request->get('q') > 2)){
            $q = Str::slug($request->get('q'), '-');
            $products->where('slug', 'like', "%$q%");
        }
        $products = $products->orderBy('order')->paginate($per_page);

        return $this->successResponse([
            'per_page' => $products->perPage(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'total' => $products->total(),
            'blogs' => ProductIndexResource::collection($products)
        ]);
    }

    public function show(Product $product){
        if ($product->project_id != $this->project->id){
            return $this->errorResponse([
                 "message" => "Nädogry haryt belgisi, tapylmady."
            ], 404);
        }
        return $this->successResponse([
            'product' => new ProductShowResource($product)
        ]);
    }
}
