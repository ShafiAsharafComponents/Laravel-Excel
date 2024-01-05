<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PriceUpdateImport;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name')->paginate(5);
        return view('welcome',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function excelImport(Request $request)
    {
        $file = $request->file('excel_file');
        Excel::import(new ProductsImport, $file);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

    }

    public function excelUpdate(Request $request, Product $product)
    {
        $file = $request->file('excel_file');
        Excel::import(new PriceUpdateImport, $file);

        return response('Prices updated successfully!', 200)
        ->header('Content-Type', 'text/plain');

        // try{
        //     Excel::import(new PriceUpdateImport, $file);

        //     return response('Prices updated successfully!', 200)
        //         ->header('Content-Type', 'text/plain');

        // }catch(\Exception $e){

        //     return $e;

        //     // You can customize the error response based on your needs
        //     return response($e->getMessage(), 500)
        //     ->header('Content-Type', 'text/plain');

        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
