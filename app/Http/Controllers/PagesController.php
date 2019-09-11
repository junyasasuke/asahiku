<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function home()
  {
    $tasks = [
      'a',
      'b',
      'c',
    ];
      return view('welcome')->withtasks($tasks);
   }

   public function contact()
   {
         return view('contact');
   }

   public function about()
   {
      return view('about');
   }
 }
