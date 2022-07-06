<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MoviesCollection;
use App\Http\Resources\MoviesResource;
use App\Models\Movie;
use Symfony\Component\HttpFoundation\Response;


class MoviesController extends Controller
{
    public function index() {
        return [
            'movies' => new MoviesCollection(Movie::all()),
            'statusCode' => Response::HTTP_OK
        ];
    }

    public function show(Movie $movie) {
        return [
            'movie' => new MoviesResource($movie),
            'statusCode' => Response::HTTP_OK
        ];
    }

    public function store(MovieRequest $request) {
        $movie = Movie::create($request->all());
        return [
            'movie' => $movie,
            'statusCode' => Response::HTTP_CREATED];
    }

    public function update(MovieRequest $request, Movie $movie) {
        $movie->update($request->all());
        return [
            'movie' => new MoviesResource($movie),
            'statusCode' => Response::HTTP_OK];
    }

    public function destroy(Movie $movie) {
        $movie->delete();
        return [
            'msg' => 'Movie got deleted.',
            'statusCode' => Response::HTTP_OK];
    }
}
