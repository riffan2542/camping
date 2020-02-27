<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stokbarang;

class FrontendController extends Controller
{
    public function index()
    {
        $stokbarang = Stokbarang::all();
        return view('frontend.index', compact('stokbarang'));
    }
}
