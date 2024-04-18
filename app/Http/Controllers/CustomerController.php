<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search')) {
            return Product::search(request());
        }
        $legos = Product::all();
        foreach ($legos as $lego) {
            $lego->price = number_format($lego->price, 0, '.', ',');
            $lego->price = $lego->price.' VND';
        }
        return view('index', compact('legos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    public function store(Request $request)
    {

    }
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product['price'] = number_format($product['price'],0,'.',',');
        $product['price'] = $product['price'].' VND';
        return view('product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
    public function search(Request $request)
    {
        $search = strtolower($request->input('search'));

        $legos = Product::where('name', 'like', "%$search%")->get();
        return view('index', compact('legos'));
    }
    public function find($id) {
        $legos = DB::table('legos')
            ->where('id', $id)
            ->first();
        return response()->json($legos);
    }
}
