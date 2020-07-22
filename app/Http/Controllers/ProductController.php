<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Storage;
use DateTime;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    
        $products = Product::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', "%{$request->search}%");
        })->sortable()->paginate(3);
    
        return view('pages.product.index', compact('products'));
    
    }

    public function create(Category $category)
    {
    
        $category = Category::all();
        
        return view('pages.product.create', compact('category'));
    
    }

    public function store(Request $request)
    {
    
        // $this->validate($request,[
        //     'name' => 'required',
        //     'price' => 'required',
        //     'category_id' => 'required'
        // ]);
        
        // $products = Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id
        // ]);

        $this->validate($request, [
            'product_name'=>'required',
            'product_price'=>'required',
            'product_image'=>'image|mimes:jpeg,png,jpg,gif',
            'product_pdf'=>'mimes:pdf'
        ]);

        $now = new DateTime("NOW");
        $imagename = NULL;
        $pdfname = NULL;
        
        if($request->product_image != null){
            $imagename = $now->format('Y-m-d__H-i-s').$request->product_image->getClientOriginalName();
            $request->product_image->storeAs('image', $imagename, 'public');
        }
        
        if($request->product_pdf != null){
            $pdfname = $now->format('Y-m-d__H-i-s').$request->product_pdf->getClientOriginalName();
            $request->product_pdf->storeAs('pdf', $pdfname, 'public');
        }
        
        Product::create([
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_category'=>$request->product_category,
            'product_image'=>$imagename,
            'product_pdf'=>$pdfname
        ]);

        return redirect()->route('product.index');

    }

    public function show(Product $product)
    {
    
        // $products = Product::find($product);
    
        return view('pages.product.show', compact('product'));
    
    }

    public function edit(Product $product, Category $category)
    {
    
        // $products = Product::find($product);

        $category = Category::all();
    
        return view('pages.product.edit', compact('product', 'category'));
    
    }

    public function update(Request $request, $product)
    {
    
        // $this->validate($request,[
        //     'name' => 'required',
        //     'price' => 'required',
        //     'category_id' => 'required'
        // ]);

        // $products = Product::findOrFail($product);
        // $products->update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id
        // ]);

        $this->validate($request, [
            'product_name'=>'required',
            'product_price'=>'required',
            'product_image'=>'image|mimes:jpeg,png,jpg,gif',
            'product_pdf'=>'mimes:pdf'
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

        if($request->product_image != null){
            Storage::disk('public')->delete('image/'.$request->oldimage);
            $imagename = $now->format('Y-m-d__H-i-s').$request->product_image->getClientOriginalName();
            $request->product_image->storeAs('image', $imagename, 'public');
        }

        if($request->product_pdf != null){
            Storage::disk('public')->delete('pdf/'.$request->oldpdf);
            $pdfname = $now->format('Y-m-d__H-i-s').$request->product_pdf->getClientOriginalName();
            $request->product_pdf->storeAs('pdf', $pdfname, 'public');
        }        

        Product::where('id', $product)
          ->update([
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_category'=>$request->product_category,
            'product_image'=>$imagename,
            'product_pdf'=>$pdfname
        ]);

        return redirect()->route('product.index');
    }

    public function destroy(Product $product){
        
        // $products = Product::findOrFail($product);
        // $products->delete();
        
        Product::destroy($product->id);

        return redirect()->route('product.index');
    
    }
    
}
