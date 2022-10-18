<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create() {
        die('PHOTO/CREATE');
    }
    public function store(Request $request) {

    }
    public function details($id) {
        die($id);
    }
}
