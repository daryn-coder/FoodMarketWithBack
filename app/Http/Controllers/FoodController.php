<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menu;
use Illuminate\Http\Request;


class FoodController extends Controller
{
    //
    public static function food(){
        $foods = Food::all();
        $menu = Menu::all();

        return view('foodMarket')->with(['foods'=>$foods, 'menu'=>$menu]);
    }

   
}
