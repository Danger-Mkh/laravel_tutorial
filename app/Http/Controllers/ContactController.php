<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Contacts = Contact::all();

        return view('Contact.index', compact('Contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();

        return view('Contact.create', compact('categorys'));
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
            'mobile' => 'required',
            'img' => 'image',
        ]);

        $data = $request->all();

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('avatar', 'public');
        }

        Contact::create($data);

        $request->session()->flash('message', 'Contact successfully Created !!!');

        return redirect()->route('Contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $Contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $Contact)
    {
        return view('Contact.edit', compact('Contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $Contact)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'img' => 'image',
        ]);

        $data = $request->all();

        if ($request->hasFile('img')) {
            if (File::exists('storage/' . $Contact->img)) {
                File::delete('storage/' . $Contact->img);
            }
            $data['img'] = $request->file('img')->store('avatar', 'public');
        }

        $Contact->update($data);

        $request->session()->flash('message', 'Contact successfully Updated !!!');

        return redirect()->route('Contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $Contact, Request $request)
    {
        if (File::exists('storage/' . $Contact->img)) {
            File::delete('storage/' . $Contact->img);
        }

        $Contact->delete();

        $request->session()->flash('message', 'Contact successfully Deleted !!!');

        return back();
    }
}
