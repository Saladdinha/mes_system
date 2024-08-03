<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokensController extends Controller
{
    public function get_crsf_token(){
        return csrf_token();
    }
}
