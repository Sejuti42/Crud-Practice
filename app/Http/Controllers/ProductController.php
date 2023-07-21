<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function add ()
    {
        return view('back.product.add');
    }

    public function create (Request $request)
    {
        Product::createProduct($request);
        return back()->with('success','Product created Successfully');
    }

    public function manage ()
    {
        return view('back.product.manage', [
            'products'  => Product::all()
        ]);
    }
    public function edit($id)
    {
        $this->product = Product::find($id);
        return view('back.product.edit',['products'=>$this->product]);

    }
    public function update(Request $request,$id)
    {
        Product::updateProduct($request,$id);
        return redirect()->route('product.manage')->with('success','product updated successfully');

    }
    public function delete($id)
    {
        $this->product = Product::find($id);
        if(file_exists($this->product->image))
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('success','product deleted successfully');
    }
}
