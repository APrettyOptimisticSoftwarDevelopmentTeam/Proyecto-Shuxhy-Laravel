<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;

class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
