<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories =Category::all();
        return view('products.create', compact('categories'));
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
            'name' => 'required|max:100',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|max:500',
            'category_id' => 'required|integer',
           ]);
        //    dd($request->all());
           $imageName = time().'.'.$request->image->extension();  
           $request->image->move(public_path('img/products'), $imageName);

           $product = Product::create([
            'name'=>$request->name,
            'image'=>$imageName,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
         

        ]);
        return redirect()->route('products.index')->with('success','Product Added Successfully');
  

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
        $product = Product::where('id',$id)->first();
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'nullable|image',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|max:500',
            'category_id' => 'required|integer',
           ]);

           $product = Product::where('id',$id)->first();
           if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/products'), $imageName);
            $product->image = $imageName;
           }
           $product->name = $request->name;
           $product->price = $request->price;
           $product->quantity = $request->quantity;
           $product->description = $request->description;
           $product->save();
           return redirect()->route('products.index')->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Product::where('id', $id)->delete();
        return redirect()->route('products.index')->with('success','Product Removed Successfully'); 
    }


    public function getProductsByCategory(Request $request, $category)
{
    // Find the category by its slug or any unique identifier
    $category = Category::where('slug', $category)->first();

    if (!$category) {
        return response()->json(['error' => 'Category not found'], 404);
    }

    // Retrieve products based on the category ID
    $products = Product::where('category_id', $category->id)->get();

    // Return the products as a JSON response
    return response()->json($products);
}
}
