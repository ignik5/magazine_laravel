<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\product;
use App\Category;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\productrequest;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $products = product::paginate(10);
        return view('auth.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        return view('auth.products.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\productrequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productrequest $request)
    {
         
        $path = $request->file('image')->store('product');
        $params=$request->all();
        
        $params['image'] = $path;
     
        product::create($params);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('auth.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $categories=Category::get();
        
        return view('auth.products.form',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\productrequest  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(productrequest $request, product $product)
    {


        $params=$request->all();
         if(!is_null($request->file('image'))){
       Storage::delete($product->image);
    
        $path = $request->file('image')->store('product');
        $params['image'] = $path;
    }
    foreach(['new','hit','recommend'] as $fieldName ){
        if(!isset($params[$fieldName])){
                $params[$fieldName] = 0;
            }
    }
        $product->update($params);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        
        return redirect()->route('products.index');
    }
}
