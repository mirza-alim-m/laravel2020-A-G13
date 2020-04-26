<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::when($request->search, function($query)use($request){
            $query->where('category_name', 'LIKE', "%{$request->search}%");
        })->paginate(3);
        // $categories = Category::all();
        return view('pages.category.index', compact('categories'));
    }

    public function create(){
        return view('pages.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'category_name' => 'required|string'
        ]);

        $categories = Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.index');
    }

    public function show($category){
        $categories = Category::find($category);

        return view('pages.category.show', compact('categories'));
    }

    public function edit(Request $request, $category){
        $categories = Category::find($category);
        return view('pages.category.edit', compact('categories'));
    }

    public function update(Request $request, $category){
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $categories = Category::findOrFail($category);
        $categories->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('category.index');
    }

    public function destroy($category){
        $categories = Category::findOrFail($category);
        // dd($categories);
        $categories->delete();

        return redirect()->route('category.index');
    }
}
