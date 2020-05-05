<?php

namespace App\Http\Controllers;

use App\TellBook;
use Illuminate\Http\Request;

class TellBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tellBooks = TellBook::all();

        return view('TellBook.index', compact('tellBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TellBook.create');
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
            'fullName' => 'required',
            'email' => 'required|email',
            'mobile' => 'required'
        ]);

        TellBook::create($request->all());

        $request->session()->flash('message', 'Contact successfully Created !!!');

        return redirect()->route('TellBook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TellBook  $tellBook
     * @return \Illuminate\Http\Response
     */
    public function show(TellBook $tellBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TellBook  $tellBook
     * @return \Illuminate\Http\Response
     */
    public function edit(TellBook $TellBook)
    {
        return view('TellBook.edit', compact('TellBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TellBook  $tellBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TellBook $TellBook)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'mobile' => 'required'
        ]);

        $TellBook->update($request->all());

        $request->session()->flash('message', 'Contact successfully Updated !!!');

        return redirect()->route('TellBook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TellBook  $tellBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(TellBook $TellBook, Request $request)
    {
        $TellBook->delete();

        $request->session()->flash('message', 'Contact successfully Deleted !!!');

        return back();
    }
}
