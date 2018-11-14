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
        return view('profiles/edit');
    }
}
