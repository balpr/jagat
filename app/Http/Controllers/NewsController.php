<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            'title' => 'required|max:255'
        ]);

        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        if($request->is_published == null){
            $request->is_published = 0;
        }
        $news->is_published = $request->is_published;

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $profileImage = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/newsimages/', $profileImage);
            $news->picture = url('/newsimages/' . $profileImage);
        }

        $news->save();

        return redirect()->route('news.index');
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
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
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
        $news = News::find($id);

        if($request->file('picture') != ''){
            $path = public_path().'/newsimages/';

            if($news->picture != '' || $news->picture != null){
                $pic = substr($news->picture, 33);
                $file_old = $path.$pic;
                unlink($file_old);
            }

            $file = $request->file('picture');
            $profileImage = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/newsimages/', $profileImage);
            $newsurl = url('/newsimages/' . $profileImage);
            $news->update(['picture' => $newsurl]) ;
        }

        if($request->is_published == null){
            $request->is_published = 0;
        }
        $news->is_published = $request->is_published;
        $news->update(['is_published' => $news->is_published]);

        News::findOrFail($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->back();
    }
}
