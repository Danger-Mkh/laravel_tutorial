<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categorys = Category::all();

        return view('category.index', compact('Categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'desc' => 'nullable'
        ]);

        Category::create($data);

        $request->session()->flash('message', 'Category successfully Created !!!');

        return redirect()->route('Category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        return view('Category.show', compact('Category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        return view('Category.edit', compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'desc' => 'nullable'
        ]);

        $Category->update($data);

        $request->session()->flash('message', 'Category successfully Updated !!!');

        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category, Request $request)
    {
        $Category->delete();

        $request->session()->flash('message', 'Category successfully Deleted !!!');

        return back();
    }
}
