<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Str;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(/* array $data */)
    {
        /* $new_user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'address' => $data['address'],
            /* 'slug' => $this->generateUserSlugFromName($data['name'], $data['surname']), */
        /*  'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $new_user;  */
        return view('auth.register');
    }
    /* 
    private function generateUserSlugFromName($name, $surname)
    {
        $base_slug = Str::slug($name . '' . $surname, '-');
        $slug = $base_slug;
        $count = 1;
        $user_found = User::where('slug', '=', $slug)->first();
        while ($user_found) {
            $slug = $base_slug . '-' . $count;
            $user_found = User::where('slug', '=', $slug)->first();
            $count++;
        }
        return $slug;
    } */

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
