<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        if(!$request->file('image')->isValid()) {
            return '';
        }
        $imagePath = uniqid() . '.' . $request->file('image')->extension();
        Storage::putFileAs(
            'public/uploads/product', $request->file('image'), $imagePath
        );
        
        $product = Product::create([
            'name' => $request->name,
            'code' => $request->code,
            'price' => $request->price,
            'gst'  =>$request->gst,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', __('message.product_creation_success'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        
        
        return view('product.edit', [
            'product' => $product,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        if(!$request->file('image')->isValid()) {
            return '';
        }
        $imagePath = uniqid() . '.' . $request->file('image')->extension();
        Storage::putFileAs(
            'public/uploads/product', $request->file('image'), $imagePath
        );

        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'code' => $request->code,
            'price' => $request->price,
            'gst' => $request->gst,
            'image'=>$imagePath,
        ]);

    

        return redirect()->route('products.index')->with('success', __('message.product_updation_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        $product = Product::withTrashed()->find($id);

        if($product->trashed()) {
            return redirect()->route('products.index')->with('success', __('message.product_deletion_success'));
        } else {
            return back()->with('error', __('message.unexpected_error'));
        }
    }
}
