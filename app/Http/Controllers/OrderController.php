<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use SebastianBergmann\Template\Template;

class OrderController extends Controller
{
    //
    public function store(Request $request){
        // dd(20);
        Order::create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'payment' => $request->payment
        ]);
        $locale = $request->lang;
        return redirect('message/' . $locale);

        
    }
}
