<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    private string $galleries_table = 'galleries';
    private string $photos_table = 'photos';

    public function index()
    {
        $galleries = DB::table($this->galleries_table)->get();
        return view('gallery/index', compact('galleries'));
    }

    public function create()
    {
        if (Auth::guest())
        {
            return \Redirect::route('gallery.index')->with('message', 'Only logged in users can create gallery!');
        }
        return view('gallery/create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $coverImage = $request->file('cover_image');
        $ownerId = 1;

        if ($coverImage)
        {
            $fileName = $coverImage->getClientOriginalName();
            $coverImage->move(public_path('coverImages'), $fileName);
        }
        else
        {
            $fileName = 'noCoverImage.png';
        }
        DB::table($this->galleries_table)->insert([
           'name' => $name,
           'description' => $description,
           'cover_image' => $fileName,
           'owner_id' => $ownerId
        ]);

        return \Redirect::route('gallery.index')->with('message', 'Successfully created '.$name);
    }

    public function show($id)
    {
        $gallery = DB::table($this->galleries_table)->where('id',$id)->first();
        $photos = DB::table($this->photos_table)->where('gallery_id',$id)->get();

        return view('gallery/show', compact('gallery', 'photos'));
    }
}
