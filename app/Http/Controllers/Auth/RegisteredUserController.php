<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Laravel\Socialite\Socialite;

class RegisteredUserController extends Controller
{

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function handleCallback(Request $request, string $provider)
    {
        $redirectUrl = url("/auth/v1/{$provider}/callback");

        $socialUser = Socialite::driver($provider)
            ->redirectUrl($redirectUrl)
            ->stateless()
            ->user();

        $name     = $socialUser->getName();
        $email    = $socialUser->getEmail();

        return $this->store(
            (object) [
                'name' => $name,
                'email' => $email,
                'password' => $name . '+' . now() . $email
            ]
        );
    }

    public function store(object $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));
        }

        Auth::login($user);

        return to_route('dashboard');
    }
}
