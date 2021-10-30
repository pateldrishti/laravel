<?php

namespace App\Http\Controllers;

use App\Blog;

use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $data = Blog::onlyTrashed()->get();
        return view('Trash', compact('data'));
    }

    public function trashrec($id)
    {
        Blog::withTrashed()->find($id)->restore();
        return redirect()->route('blogs.index')->with('retrive','Your data is successfully retrive');
    }

    public function destroy($id)
    {
        Blog::where('id',$id)->forcedelete();
        return redirect()->route('trash.index')->with('success','Your data is successfully deleted');
    }
}
