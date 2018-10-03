<?php

namespace App\Http\Controllers\pengajar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengajarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pengajar');
    }

    public function index()
    {
        return view('pengajar.dasboard');
    }
}
