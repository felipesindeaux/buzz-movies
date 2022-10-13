<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index() {

        $movies = Movie::all();

        return view('welcome', ['movies' => $movies]);
    }

    public function create() {
        return view('movies.create');
    }
}
