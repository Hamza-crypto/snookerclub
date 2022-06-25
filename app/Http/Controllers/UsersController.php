<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TransactionGatewayController;
use App\Http\Requests\UserRequest;
use App\Models\Gateway;
use App\Models\ManualFeedback;
use App\Models\Message;
use App\Models\OrderCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use phpDocumentor\Reflection\Types\Null_;

class UsersController extends Controller
{

    public function index()
    {
       $users = User::all();
       return view('pages.users.index', compact('users'));
    }


    public function create()
    {
         $users = User::all();

        return view('pages.users.add', compact('users'));
    }


    public function store(UserRequest $request)
    {
        if ($request->parent == 0) {
            $request->parent = null;
        }
        User::create(
            [
                'name' => $request->name,
                'email_verified_at' => now(),
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role' => $request->role,
            ]);

        Session::flash('success', 'User successfully added.');
        return redirect()->route('admin.users.create');
    }


    public function edit(User $user)
    {
        return view('pages.users.edit',
            [
                'user' => $user,
                'tab' => 'account',
            ]);
    }

    public function update(User $user, Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,' . $user->id,
            'role' => 'required',
        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);


        Session::flash('success', __('Account information successfully updated.'));
        return back();
    }

    public function password_update(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);


        $user->update([
            'password' => Hash::make($request->password),
        ]);
        Session::flash('password_update', 'Password updated successfully.');
        return redirect()->route('admin.users.index');

    }

    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', 'User deleted successfully.');
        return redirect()->route('admin.users.index');
    }
}
