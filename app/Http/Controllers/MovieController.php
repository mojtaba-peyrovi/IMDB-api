<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

use App\Classes\imdb;

class MovieController extends Controller
{


    // public function get_imdb()
    // {
    //     $imdb = new imdb('fCBiOpaxxftqgajlD0RUC0PdxNRwqT');
    //     $data = $imdb->title('batman','json');
    //     $get_result_arr = json_decode($data);
    //     // dd($get_result_arr);
    //     return view('moviesearch', compact('get_result_arr'));
    //
    // }

    public function search_movie(Request $request)
    {
        $movie = $request->get('movie');
        $imdb = new imdb('fCBiOpaxxftqgajlD0RUC0PdxNRwqT');
        $data = $imdb->title($movie,'json');
        $result = json_decode($data);
        return view('moviesearch', compact('result'));
    }


}
