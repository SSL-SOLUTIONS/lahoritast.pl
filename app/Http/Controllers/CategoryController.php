<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
        
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
             'title'=>'required|max:40',
             'description'=>'required|max:500',
             'image'=>'required|image',
             
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img/categories'), $imageName);
        $category = Category::create([
            'title'=>$request->title,
            'image'=>$imageName,
            'description'=>$request->description,
        ]);
        return redirect()->route('categories.index')->with('success','Category Added Successfully');
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
        $category=Category::find($id);
        return view('categories.edit', compact('category'));
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
        'title' => 'required|max:100',
        'image' => 'nullable|image',
        'description' => 'required|max:500',
    ]);
           $category = Category::where('id',$id)->first();
           if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/categories'), $imageName);
            $category->image = $imageName;
           }
           $category->title = $request->title;
           $category->description = $request->description;
           $category->save();
           return redirect()->route('categories.index')->with('success','Category Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
         public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('categories.index')->with('success','Category Removed Successfully');
    }
}
