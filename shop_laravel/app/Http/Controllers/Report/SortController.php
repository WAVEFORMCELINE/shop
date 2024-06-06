<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function __invoke()
    {
        return view('report.sort');
    }
}
