<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /* public function __construct()
    {
        $this->middleware('auth');
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);   
        return view('user-pages.user-dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-pages.add-productform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'          => 'required|min:2|max:254',
            'price'                 => 'required|integer',
            'instock'               => 'required|integer',
            'product_description'   => 'required'
        ]);
        /* Generate Unique Stock Keeping Unit (SKU) */
        $rowAddOne = Product::count() + 1;
        $tenDigits = mt_rand(1000000000, 9999999999);
        $fourDigits = mt_rand($rowAddOne, 999);
        $sku = $tenDigits.'-'.$rowAddOne.$fourDigits;
      
        /* Insert Data in the Database */
        $create = Product::create([
            'sku'           => $sku,
            'product_name'  => $request->product_name,
            'description'   => $request->product_description,
            'price'         => $request->price,
            'in_stock'      => $request->instock
        ]);
        if($create){
            return back()->with('success', 'Product created successfully!');
        }
        return back()->with('fail', 'Saving Product went wrong');
    }

     /**
     * Show the information for a given product.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        
        return view('user-pages.show-product',[
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user-pages.show-edit-form',[
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $request->validate([
            'product_name'          => 'required|min:2|max:254',
            'price'                 => 'required|integer',
            'instock'               => 'required|integer',
            'product_description'   => 'required'
        ]);
        
        $prod = $product->find($request->dashboard);
        $prod->product_name = $request->product_name;
        $prod->price        = $request->price;
        $prod->in_stock     = $request->instock;
        $prod->description  = $request->product_description;
        $prod->save();
        
        return back()->with('success', 'Product updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        
        $prod = Product::find($request->dashboard);
        $prod->delete();

        return back()
            ->with('success', 'Product deleted successfully');
    }
}
