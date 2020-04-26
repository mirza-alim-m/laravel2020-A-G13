<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', "%{$request->search}%");
        })->sortable()->paginate(3);
        return view('pages.product.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        
        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('product.index');

    }

    public function edit($product){
        $products = Product::find($product);
        return view('pages.product.edit', compact('products'));
    }

    public function update(Request $request, $product){
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $products = Product::findOrFail($product);
        $products->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('product.index');
    }

    public function destroy($product){
        $products = Product::findOrFail($product);
        $products->delete();
        return redirect()->route('product.index');
    }

    public function show($product){
        $products = Product::find($product);
        return view('pages.product.show', compact('products'));
    }
    
}
