<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $paginate = 10;
     
    public function index()
    {
        $products = Product::paginate($this->paginate); // si pas de paginate ->get()
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        return view('back.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'string',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'url_image' => 'image',
            'status' => 'required|in:Publié,Brouillon',
            'code' => 'required|string',
            'reference' => 'required|string',
            'category_id' => 'required|integer'
        ]);
        
        $product = Product::create($request->all());

        return redirect()->route('admin.index')->with('message', 'Le produit a bien été ajouté');
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
        $categories = Category::pluck('title', 'id')->all();
        return view('back.product.edit', ['product' => $product, 'categories' => $categories]);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'string',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'url_image' => 'image',
            'status' => 'in:publié,brouillon',
            'code' => 'string',
            'reference' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('admin.index')->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.index')->with('message', 'success delete');
    }
}
