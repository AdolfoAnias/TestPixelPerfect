<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->SendMail();
        return view('home');
    }
    
    public function SendMail()
    {
        $data = ['userName' => auth()->user()->name];
        Mail::send('emails.notificacion', $data, function ($mail) {
          $mail->to('testpixelperfect@gmail.com')->subject('Test Pixel Perfect');
        });        
//        $data = ['userName' => 'Adolfo'];
//       \Mail::send('emails.notificacion', $data,function ($message) {
//            $message->from('empresapronet@gmail.com', 'PixelPerfect');
//            $message->to('empresapronet@gmail.com')->subject('Notificación Test MiniCRM'); 
//        });
//        return "Se envío el email";
    }   
}
