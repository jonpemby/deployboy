<?php

namespace App\Http\Controllers\Oauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Socialite;
use Redis;

class GithubController extends Controller
{
    /**
     * Redirect to the GitHub OAuth provider.
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Create a user from the OAuth response.
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        auth()->login($this->findOrCreateUser($githubUser));

        return redirect()->action('HomeController@index');
    }

    /**
     * TODO: Move this into the User model, possibly create a concern.
     */
    public function findOrCreateUser($authUser)
    {
        Redis::hset('github_profiles', $authUser->id, json_encode($authUser->user));

        return User::where('github_id', $authUser->id)->firstOr(function () use ($authUser) {
            return User::create([ 'github_id' => $authUser->id ]);
        });
    }
}
