<?php

namespace App\Http\Controllers;
use App\Models\Train;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {


        $trains = Train::whereDate('orario_partenza', '>=', today())  //uso wheredate perchè m'interessa solo la data
            ->orderBy('orario_partenza', 'asc')
            ->get();

        return view('homepage', compact('trains'));
    }
}
