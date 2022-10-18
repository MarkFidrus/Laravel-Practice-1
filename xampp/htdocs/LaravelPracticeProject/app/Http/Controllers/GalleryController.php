<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return View('gallery/index');
    }
    public function create() {
        return View('gallery/create');
    }
    public function store(Request $request) {
        die('Hello!');
    }
    public function show($id) {
        die($id);
    }
}
