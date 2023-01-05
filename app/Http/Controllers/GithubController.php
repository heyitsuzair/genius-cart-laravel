<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Redirect the user to the Github authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUsingGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGithub()
    {
        try {
            $user = Socialite::driver('github')->user();

            $saveUser = User::updateOrCreate([
                'email' => $user->getEmail(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName() . '@' . $user->getId()),
                'github_id' =>  $user->getId(),
            ]);

            Auth::loginUsingId($saveUser->id);
            return redirect('/dashboard?route=index')->with('form-success', 'You Are Logged In');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}