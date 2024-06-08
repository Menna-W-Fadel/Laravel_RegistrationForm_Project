<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAPI(Request $request)
    {
      
        $response =Http::withHeaders([
            'X-RapidAPI-Key'=> 'private api key',
            'X-RapidAPI-Host'=>'imdb-top-100-movies.p.rapidapi.com'
        ])->get('https://imdb-top-100-movies.p.rapidapi.com/');

        // Convert the response to JSON and return
        $data = $response->json(); 
        return $data;

        
    }
}