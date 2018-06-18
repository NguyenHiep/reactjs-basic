<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helpers;
use App\Helpers\Uploads;

class ProfileController extends FrontEndController
{
    /***
     * Validate profile update
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'avatar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=200',
            'fullname' => 'required|string|max:191',
            'card'     => 'nullable|numeric|digits:11',
            'phone'    => 'nullable|numeric|digits_between:10,15',
            'birthday' => 'nullable|date_format:d/m/Y',
            "sign"     => "nullable|string",
        ]);
    }

    /***
     * Validate change password
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    protected function validator_changepassword(array $data)
    {
        return Validator::make($data, [
            'old_password' => 'nullable|string|required_with:new_password',
            'new_password' => "nullable|string|min:6|confirmed|required_with:old_password",
        ]);
    }

    /**
     *Show edit the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit()
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
        $user      = Auth::user();
        $inputs    = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            // Write log error
            $errors       = $validator->errors();
            $list_message = '';
            foreach ($errors->all() as $message) {
                $list_message .= $message . PHP_EOL;
            }
            Log::error($list_message);

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $avatar_path = Uploads::upload($request, 'avatar', self::AVATAR_PATH, self::AVATAR_THUMBNAIL_PATH);
        if ($avatar_path) {
            $inputs['avatar'] = $avatar_path;
            if (!empty($user->avatar)) {
                Helpers::delete_image(public_path(self::AVATAR_PATH) . $user->avatar);
                Helpers::delete_image(public_path(self::AVATAR_THUMBNAIL_PATH) . 'thumbnail_' . $user->avatar);
            }
        }

        // Update profile
        try {
            DB::beginTransaction();
            $user->update($inputs);
            DB::commit();
            return redirect()->route('front.profile.edit')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('front.profile.edit')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update profile is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /***
     * Follow book
     * @param Request $request
     */
    public function follow_book(Request $request)
    {
        return view('frontend.profile.follow');
    }

    public function changepassword()
    {
        return view('frontend.profile.changepassword');
    }

    public function changepassword_update(Request $request)
    {
        $user   = Auth::user();
        $inputs = $request->all();
        // If the password not change, redirect to change password and message update success
        if (empty($inputs['old_password'])) {
            return redirect()->route('front.profile.changepassword')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        }

        // Check old password
        if (!Hash::check($inputs['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['error' => 'The specified password does not match the database password']);
        }
        
        $validator = self::validator_changepassword($inputs);
        if ($validator->fails()) {
            // Write log error
            $errors       = $validator->errors();
            $list_message = '';
            foreach ($errors->all() as $message) {
                $list_message .= $message . PHP_EOL;
            }
            Log::error($list_message);
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        try {
            DB::beginTransaction();
            $request->user()->fill([
                'password' => Hash::make($inputs['new_password'])
            ])->save();
            DB::commit();
            return redirect()->route('front.profile.changepassword')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('front.profile.front.profile.changepassword')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update password is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    public function notification(Request $request)
    {
        return view('frontend.profile.notification');
    }
}
