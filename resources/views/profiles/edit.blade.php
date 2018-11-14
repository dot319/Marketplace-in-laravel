@extends('layouts/app')

@section('content')

<div class="perfect-center-parent">
        <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">

            @if ($user->id == $auth)
            <form class="form" method="POST" action="/profiles/{{ $user->id }}/update">
                @csrf
                @method('patch')
    
                <div class="form-header line-bottom">
                    <h2 class="header">Edit your profile</h2>
                </div>
    
                <div class="form-input">
                    <input class="text-input" type="text" placeholder="First name" name="first_name" value="{{ $user->first_name }}">
                    @if ($errors->has('first_name'))
                        <div class="form-error">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>

                <div class="form-input">
                    <input class="text-input" type="text" placeholder="Last name" name="last_name" value="{{ $user->last_name }}">
                    @if ($errors->has('last_name'))
                        <div class="form-error">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>

                <div class="form-input">
                    <input class="text-input" type="text" placeholder="City" name="city" value="{{ $user->city }}">
                    @if ($errors->has('city'))
                        <div class="form-error">{{ $errors->first('city') }}</div>
                    @endif
                </div>

                <div class="form-input">
                    <input class="text-input" type="text" placeholder="Country" name="country" value="{{ $user->country }}">
                    @if ($errors->has('country'))
                        <div class="form-error">{{ $errors->first('country') }}</div>
                    @endif
                </div>

                <div class="form-input">
                    <textarea class="text-input  textarea" placeholder="Short bio: introduce yourself (or your business) to other users!" name="bio">{{ $user->bio }}</textarea>
                    @if ($errors->has('bio'))
                        <div class="form-error">{{ $errors->first('bio') }}</div>
                    @endif
                </div>

                <div class="form-input">
                    <input class="text-input" type="text" placeholder="Link to your profile picture" name="pic_url" value="{{ $user->pic_url }}">
                    @if ($errors->has('pic_url'))
                        <div class="form-error">{{ $errors->first('pic_url') }}</div>
                    @endif
                </div>
    
                <div class="form-input">
                    <button type="submit">Update your profile</button>    
                </div>
    
            </form>
            @else 
                <span class="im im-frown-o"></span> &nbsp; Sorry, your account doesn't have the required permissions to access this page.
            @endif 
        </div>        
    </div>

@endsection

<?php

// List of profile fields a user should be able to edit
// City
// Country
// Short bio
// url to profile picture


?>