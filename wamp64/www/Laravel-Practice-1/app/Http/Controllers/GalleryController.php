<?php

namespace App\Http\Controllers;

class GalleryController extends Controller
{

    public function index()
    {
        return view('gallery.index', ['cssName' => 'gallery', 'title' => 'Galleries']);
    }

    public function create()
    {
        return view('gallery/create', ['cssName' => 'gallery', 'title' => 'Create Gallery']);
    }
}
