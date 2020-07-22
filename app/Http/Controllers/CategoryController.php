<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Storage;
use DateTime;

class CategoryController extends Controller
{

    public function index(Request $request){
    
        $categories = Category::when($request->search, function($query)use($request){
            $query->where('category_name', 'LIKE', "%{$request->search}%");
        })->sortable()->paginate(3);
    
        // $categories = Category::all();
        return view('pages.category.index', compact('categories'));
    
    }

    public function create()
    {
    
        return view('pages.category.create');
    
    }

    public function store(Request $request)
    {
    
        $this->validate($request,[
            'category_name' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif',
            'category_pdf' => 'mimes:pdf'
        ]);

        $now = new DateTime("NOW");
        $imagename = NULL;
        $pdfname = NULL;
        
        if($request->category_image != null){
            $imagename = $now->format('Y-m-d__H-i-s').$request->category_image->getClientOriginalName();
            $request->category_image->storeAs('image', $imagename, 'public');
        }
        
        if($request->category_pdf != null){
            $pdfname = $now->format('Y-m-d__H-i-s').$request->category_pdf->getClientOriginalName();
            $request->category_pdf->storeAs('pdf', $pdfname, 'public');
        }
        
        Category::create([
            'category_name'=>$request->category_name,
            'category_image'=>$imagename,
            'category_pdf'=>$pdfname
        ]);

        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        
        return view('pages.category.show', compact('category'));
    
    }

    public function edit(Category $category)
    {
        
        return view('pages.category.edit', compact('category'));
    
    }

    public function update(Request $request, $category)
    {
        
        $this->validate($request, [
            'category_name' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif',
            'category_pdf' => 'mimes:pdf'
        ]);

        $now = new DateTime("NOW");
        $imagename = NULL;
        $pdfname = NULL;
        
        if($request->oldimage!=NULL){
            $imagename=$request->oldimage;
        }
        
        if($request->oldpdf!=NULL){
            $pdfname=$request->oldpdf;
        }

        if($request->category_image != null){
            Storage::disk('public')->delete('image/'.$request->oldimage);
            $imagename = $now->format('Y-m-d__H-i-s').$request->category_image->getClientOriginalName();
            $request->category_image->storeAs('image', $imagename, 'public');
        }

        if($request->category_pdf != null){
            Storage::disk('public')->delete('pdf/'.$request->oldpdf);
            $pdfname = $now->format('Y-m-d__H-i-s').$request->category_pdf->getClientOriginalName();
            $request->category_pdf->storeAs('pdf', $pdfname, 'public');
        }        

        Category::where('id', $category)
          ->update([
            'category_name'=>$request->category_name,
            'category_image'=>$imagename,
            'category_pdf'=>$pdfname
        ]);
                
        return redirect()->route('category.index');

        // $this->validate($request, [
        //     'category_name' => 'required'
        // ]);

        // $categories = Category::findOrFail($category);
        // $categories->update([
        //     'category_name' => $request->category_name
        // ]);

        // return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        
        // $categories = Category::findOrFail($category);
        // $categories->delete();

        Category::destroy($category->id);

        return redirect()->route('category.index');
    
    }
}
