<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::get();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
            'name' => 'required|max:100'
        ]);

        $author = new Author;
        $author->name = $request->name;
        $author->address = $request->address;

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $profileImage = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/authorimages/', $profileImage);
            $author->picture = url('/authorimages/' . $profileImage);
        }

        $author->save();

        return redirect()->route('authors.index');
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
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
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
        $author = Author::find($id);

        if($request->file('picture') != ''){
            $path = public_path().'/authorimages/';

            if($author->picture != '' || $author->picture != null){
                $pic = substr($author->picture, 35);
                $file_old = $path.$pic;
                unlink($file_old);
            }

            $file = $request->file('picture');
            $profileImage = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/authorimages/', $profileImage);
            $authurl = url('/authorimages/' . $profileImage);
            $author->update(['picture' => $authurl]) ;
        }
        Author::findOrFail($id)->update([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return redirect()->back();
    }
}
