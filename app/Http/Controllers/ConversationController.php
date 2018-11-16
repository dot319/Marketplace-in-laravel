<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //This entire function needs to be simplified, broken down, etc.
    {
        $validated = request()->validate([
            'ad_id' => ['nullable', 'integer']
        ]);
        $conversation = Conversation::create($validated);

        $sender = User::where('id', Auth::id())->first();
        $conversation->users()->save($sender);

        $receiver_id = DB::table('ads')->where('id', request('ad_id'))->value('user_id');
        $receiver = User::where('id', $receiver_id)->first();
        $conversation->users()->save($receiver);

        $validated = request()->validate([
            'message' => ['required']
        ]);
        $validated['user_id'] = Auth::id();

        $message = new Message($validated);
        $conversation->messages()->save($message);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        $validated = request()->validate([
            'message' => ['required']
        ]);
        $validated['user_id'] = Auth::id();

        $message = new Message($validated);
        $conversation->messages()->save($message);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
