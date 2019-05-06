<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;

class TestEmail extends Controller
{
    //
        /**
     * Send reset password email.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mail()
    {
        $email = new EmailController('lovinjerry004@gmail.com','how do u see our services','kidstories');
        return $email->sendEmail();
       
       //return 'Email was sent';
    }
}
