<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function marca(){
        return view('menu/marca');
    }

    public function producto(){
        return view('menu/producto');
    }

    


}
