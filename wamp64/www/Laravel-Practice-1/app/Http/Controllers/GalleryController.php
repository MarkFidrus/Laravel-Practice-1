<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = DB::table('galleries')->get();
        return view('gallery.index', ['cssName' => 'gallery', 'title' => 'Galleries'], compact('galleries'));
    }

    public function create()
    {
        return view('gallery/create', ['cssName' => 'gallery', 'title' => 'Create Gallery']);
    }

    public function showGallery(int $id)
    {
        $gallery = DB::table('galleries')->where('id', $id)->first();
        $photos = DB::table('galleries')->where('gallery_id', $id)->get();
        return view('gallery.show', ['cssName' => 'gallery', 'title' => '' .$gallery->name .''], compact('gallery', 'photos'));
    }

    public function editGallery(int $gallery)
    {

    }

    public function set(string $where, int $id)
    {

    }
}
