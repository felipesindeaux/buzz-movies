<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\User;
use App\Models\Tag;

class MovieController extends Controller
{
    public function index()
    {

        $button = request('order');

        if ($button === 'asc') {

            $movies = Movie::all()->sortBy('name');
        } else if ($button === 'desc') {

            $movies = Movie::all()->sortByDesc('name');
        } else {

            $movies = Movie::all();
        }


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

        $user = auth()->user();
        $movie->user_id = $user->id;

        $movie->save();

        $tagsArray = explode(" ", $request->tags);

        foreach ($tagsArray as $tagName) {

            $tag = Tag::firstOrCreate(['name' => $tagName]);

            $movie->tags()->attach($tag->id);
        }

        return redirect('/')->with('msg', 'Upload feito com sucesso!');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        $movieOwner = User::where('id', $movie->user_id)->first();

        $user = auth()->user();

        return view('movies.show', ['movie' => $movie, 'movieOwner' => $movieOwner, 'user' => $user]);
    }

    public function destroy($id)
    {
        Movie::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Filme excluído com sucesso!');
    }

    public function edit($id)
    {

        $movie = Movie::findOrFail($id);

        $user = auth()->user();

        if ($user->id != $movie->user->id) {
            return redirect('/');
        }


        return view('movies.edit', ['movie' => $movie, 'user' => $user]);
    }

    public function update(Request $request)
    {

        $movie = Movie::findOrFail($request->id);

        $movie->update(['name' => $request->name]);

        $tagsArray = explode(" ", $request->tags);

        foreach ($tagsArray as $tagName) {

            $tag = Tag::firstOrCreate(['name' => $tagName]);

            $movie->tags()->attach($tag->id);
        }

        return redirect('/')->with('msg', 'Filme editado com sucesso!');
    }

    public function addTag($movieId, $tagId)
    {

        $movie = Movie::findOrFail($movieId);
        $tag = Tag::findOrFail($tagId);

        $validation = true;

        foreach ($movie->tags as $element) {
            if ($tag->id == $element->id) {
                $validation = false;
            }
        }

        if (!$validation) {
            return redirect()->back()->with('msg', 'Tag já existente neste filme!');
        } else {

            $movie->tags()->attach($tagId);

            return redirect()->back()->with('msg', 'Tag ' . $tag->name . ' adicionada ao filme ' . $movie->name . '!');
        }
    }

    public function removeTag($movieId, $tagId)
    {

        $movie = Movie::findOrFail($movieId);
        $tag = Tag::findOrFail($tagId);

        $validation = true;

        foreach ($movie->tags as $element) {
            if ($tag->id == $element->id) {
                $validation = false;
            }
        }

        if (!$validation) {
            $movie->tags()->detach($tagId);

            return redirect()->back()->with('msg', 'Tag ' . $tag->name . ' removida do filme ' . $movie->name . '!');
        }
    }
}
