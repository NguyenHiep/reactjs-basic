<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

trait CustomSendsPasswordResetEmails
{
    use SendsPasswordResetEmails;

    protected function validateEmail(Request $request)
    {
        $this->validate($request,
            [
                'email'                => 'required|email',
                'g-recaptcha-response' => 'required|recaptcha',
            ]
        );
    }
}
