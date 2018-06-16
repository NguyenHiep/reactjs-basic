<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     *Show edit the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(Request $request)
    {
        return view('frontend.profile.edit');
    }

    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        return 'Profile update';
    }

    /***
     * Follow book
     * @param Request $request
     */
    public function follow_book(Request $request)
    {
        return view('frontend.profile.follow');
    }

    public function changepassword(Request $request)
    {
        return view('frontend.profile.changepassword');
    }

    public function notification(Request $request)
    {
        return view('frontend.profile.notification');
    }
}
