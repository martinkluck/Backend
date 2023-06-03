<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PlanetController extends Controller
{
    public function getAll()
    {
        $offset = request('offset');
        if (!$offset) {
            $offset = 1;
        }
        $results = Http::get(env('STARWARS_API_BASEURL') . '/planets/?page=' . $offset)['results'];
        return response()->json($results);
    }

    public function getById(int $id)
    {
        return response()->json(Http::get(env('STARWARS_API_BASEURL') . '/planets/' . $id)->json());
    }
}
