<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertelaan;

class HomeController extends Controller
{
    public function index()
    {
        return view('home1');
    }

    public function show($gid)
    {
        $aspects = Pertelaan::findOrFail($gid);
        return view('home3', compact('aspects'));
    }
}
