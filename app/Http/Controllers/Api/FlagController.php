<?php

namespace App\Http\Controllers\Api;

use App\Flag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Flag as FlagResource;

class FlagController extends Controller
{
    /**
    * Get outlet listing on Leaflet JS geoJSON data structure.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return Illuminate\Http\JsonResponse
    */
    public function index(Request $request)
    {
        $flags = Flag::all();

        $geoJSONdata = $flags->map(function ($flag) {
            return [
                'type'       => 'Feature',
                'properties' => new FlagResource($flag),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $flag->longitude,
                        $flag->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
