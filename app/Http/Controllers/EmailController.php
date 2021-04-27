<?php

namespace App\Http\Controllers;
use App\Http\Controllers\FoodController;
use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function view() {
        return view('foodMarket');
    }
    public function send(Request $request){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'file' => 'required|file',
            'message' => 'required'
        ]);

        //dd(request()->all());
        
        Mail::to('190103397@stu.sdu.edu.kz')->send(new Email($data));
        return FoodController::food();
    }
}
