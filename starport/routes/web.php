<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->middleware('auth');

Route::get('/login', function () {
    return Socialite::driver('eveonline')->scopes(["publicData", "esi-skills.read_skills.v1", "esi-skills.read_skillqueue.v1"])->redirect();
})->name('login');

Route::get('/callback', function () {
    $eveUser = Socialite::driver('eveonline')->user();

    $user = User::updateOrCreate([
        'character_id' => $eveUser->character_id,
    ], [
        'character_owner_hash' => $eveUser->character_owner_hash,
        'character_name' => $eveUser->character_name,
        'token' => $eveUser->token,
        'refreshToken' => $eveUser->refreshToken,
        'user_jwt' => json_encode($eveUser->user),
    ]);

    Auth::login($user);

    return redirect('/');
});

Route::get('/skills', function () {
    return view('skills');
});