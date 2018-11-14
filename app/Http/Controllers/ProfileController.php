<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show(User $user) {
        $ads = DB::table('ads')->where('user_id', $user->id)->get();
        $auth = Auth::id();
        return view('profiles/show', ['user' => $user, 'ads' => $ads, 'auth' => $auth]);
    }

    public function edit(User $user) {
        $auth = Auth::id();
        return view('profiles/edit', ['user' => $user, 'auth' => $auth]);
    }

    public function update(User $user) {
        $validated = request()->validate([
            'first_name' => [],
            'last_name' => [],
            'city' => [],
            'country' => [],
            'bio' => [],
            'pic_url' => ['url']
        ]);
        $user->update($validated);
        return redirect("/profiles/$user->id");
    }
}
