<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search')) {
            return $this->search(request());
        }
        $legos = Product::all();
        return view('admin.index', compact('legos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:1024',
            'author' => 'required|max:255',
            'price' => 'required|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');

            // Validate file extension and MIME type
            $validExtensions = ['jpeg', 'png', 'jpg', 'gif'];
            $validMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

            if (!in_array($image->getClientOriginalExtension(), $validExtensions) || !in_array($image->getMimeType(), $validMimeTypes)) {
                // Invalid file type
                return redirect()->back()->withErrors(['image_url' => 'The product image must be a file of type: jpeg, png, jpg, gif.']);
            }

            // Store the file
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $storeData['image_url'] = $imageName;
            $legos = Product::create($storeData);
        }
        return redirect()->route('dashboard.index')->with('completed', 'New one has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $legos = Product::findOrFail($id);
        return view('admin.update', compact('legos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:1024',
            'author' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        Product::whereId($id)->update($updateData);

        return redirect()->route('dashboard.index')->with('completed', 'This product has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = Product::findOrFail($id);
        $news->delete();
        return redirect()->route('dashboard.index')->with('completed', 'This product has been deleted');
    }
    public function search(Request $request)
    {
        $search = strtolower($request->input('search'));

        $legos = Product::where('name', 'like', "%$search%")->get();
        return view('admin.index', compact('legos'));
    }
    public function find($id) {
        $new = DB::table('legos')
            ->where('id', $id)
            ->first();
        return response()->json($new);
    }
}
