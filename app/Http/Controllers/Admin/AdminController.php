<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Services\UserServices\UserServiceInterface;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        $notification = array('messege' => 'You are logged out!', 'alert-type' => 'success');
        return redirect()->route('admin.login')->with($notification);
    }

    public function PasswordChange()
    {
        return view('admin.profile.change_password');
    }

    public function UpdatePassword(UserRequest $request)
    {
        if ($this->userService->UpdatePassword($request)) {
            $notification = array('messege' => 'Your Password Changed!', 'alert-type' => 'success');
            return redirect()->route('admin.login')->with($notification);
        } else {

            $notification = array('messege' => 'Old Password Not Matched!', 'alert-type' => 'error');

            return redirect()->back()->with($notification);
        }


    }
}
