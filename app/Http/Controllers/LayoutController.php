<?php

namespace Onlinecorrection\Http\Controllers;


use Onlinecorrection\Http\Requests;



class LayoutController extends Controller
{


    public function index()
    {

        return view('layout.index');
   }
}
