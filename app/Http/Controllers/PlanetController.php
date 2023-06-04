<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PlanetController extends Controller
{
    public function getAll()
    {
        $results = Cache::remember('planets', 60, function () {
            $response = Http::get(env('STARWARS_API_BASEURL') . '/planets');
            $data = json_decode($response->getBody(), true);
            $total_count = $data['count'];
            $results = $data['results'];
            $num_pages = ceil($total_count / 10);

            for ($i = 2; $i <= $num_pages; $i++) {
                $response = Http::get(env('STARWARS_API_BASEURL') . '/planets/?page=' . $i);
                $data = json_decode($response->getBody(), true);
                $results = array_merge($results, $data['results']);
            }

            return $results;
        });

        usort($results, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        $perPage = request('perPage');
        if (!$perPage) {
            $perPage = 10;
        }
        $page = request('page');
        if (!$page) {
            $page = 1;
        }
        $offset = ($page - 1) * $perPage;
        $sliced_results = array_slice($results, $offset, $perPage);
        return response()->json($sliced_results);
    }

    public function getById(int $id)
    {
        return response()->json(Http::get(env('STARWARS_API_BASEURL') . '/planets/' . $id)->json());
    }
}
