<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    private string $photos_table = 'photos';


    public function create($gallery_id)
    {
        if (Auth::guest())
        {
            return \Redirect::route('gallery.index')->with('message', 'Only logged in users can upload photos!');
        }
        return view('photo/create', compact('gallery_id'));
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $galleryId = $request->input('gallery_id');
        $ownerId = 1;

        if ($image)
        {
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('photos/'.$galleryId), $fileName);

            DB::table($this->photos_table)->insert([
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image' => $fileName,
                'gallery_id' => $galleryId,
                'owner_id' => $ownerId
            ]);
            return \Redirect::route('gallery.show',[$galleryId])->with('message', 'Upload was successfully!');
        }
        else
        {
            return \Redirect::route('gallery.show',[$galleryId])->with('message', 'Upload was NOT successfully!');
        }
    }

    public function details($id)
    {
        $photo = DB::table($this->photos_table)->where('id',$id)->first();

        return view('photo/details', compact( 'photo'));
    }
}
