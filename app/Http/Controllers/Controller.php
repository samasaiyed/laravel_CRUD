<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\product;
use Illuminate\Http\Request; // added for store method

class Controller extends BaseController
{
    public function index()
    {
        return view('products.index',['products'=> product::get()]);
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:10000'

        ]);


        // upload image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;

        $product->save();

        return back()->withSuccess('Product Created !!!');
    }
    public function edit($id)
    {
        $product = product::where('id',$id)->first();
        return view('products.edit',['product' => $product]);
    }
    public function update(Request $request,$id)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg,jpeg,png,gif|max:10000'

        ]);

        $product = product::where('id',$id)->first();
        if(isset($request->image))
        {
             // upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
             $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
       
        $product->save();

        return back()->withSuccess('Product Updated !!!');
    }
    public function delete($id)
    {
        $product = product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !!!');
    }
}
