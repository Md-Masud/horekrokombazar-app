<?php


namespace App\Services\UserServices;

use App\Repositories\UserInterfaceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    private $interfaceRepository;

    public function __construct(UserInterfaceRepository $interfaceRepository)
    {
        $this->interfaceRepository = $interfaceRepository;
    }

    public function logout()
    {
        Auth::logout();

    }

    public function UpdatePassword($request)
    {
        $current_password = Auth::user()->password;
        $oldpass = $request->old_password;
        $new_password = $request->password;
        $user = $this->interfaceRepository->find(Auth::id());
        if (Hash::check($oldpass, $current_password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            $this->logout();
            return $user;
        }
    }

}
