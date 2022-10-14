<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {

        $movies = Movie::all();

        return view('welcome', ['movies' => $movies]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {

        $movie = new Movie;

        $movie->name = $request->name;

        $data = $request->all();
        $rules = [
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:5000|required'
        ];
        $validator = Validator($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('msg', 'Tamanho ou extensão inválida!');
        } else {
            $requestVideo = $request->video;

            $extension = $requestVideo->extension();

            $videoName = md5($requestVideo->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $videoSize = number_format($requestVideo->getSize() / 1048576, 2);

            $request->video->move(public_path('video/movies'), $videoName);

            $movie->video = $videoName;

            $movie->size = $videoSize;
        }

        $movie->save();

        return redirect('/')->with('msg', 'Upload feito com sucesso!');
    }
}
