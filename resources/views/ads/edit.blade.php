@extends('layouts/app')

@section('content')

    <div class="perfect-center-parent">
        <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">

            @if($ad->user_id == $authId)
                <form class="form" action="/ads/{{ $ad->id }}" method="POST">
                    @method('patch')
                    @csrf

                    <div class="form-header line-bottom">
                        Edit your ad
                    </div>

                    <div class="form-input">
                        <input name="title" class="text-input" type="text" placeholder="Title" value="{{ $ad->title }}">
                    </div>

                    <div class="form-input">
                        <textarea name="description" class="text-input textarea" placeholder="Description">{{ $ad->description }}</textarea>
                    </div>

                    <div class="form-input">
                        &euro; <input name="price" class="form-price" type="number" placeholder="Price" value="{{ $ad->price }}">
                    </div>

                    <div class="form-input">
                        <button type="submit">
                            <span class="im im-edit"></span> Submit changes
                        </button>
                    </div>

                    @if ($errors->any())
                        @foreach ($errors as $error)
                            {{ $error }}
                        @endforeach
                    @endif

                </form>
                <form class="inline-block" action="ads/{{ $ad->id }}" method="POST">
                    @csrf 
                    @method('delete')
                    <button class="red-button" type="submit">
                        <span class="im im-x-mark-circle"></span>
                         Delete ad
                    </button>
                </form>
            @else 
                You're not allowed to edit this ad.
            @endif
        </div>
    </div>

@endsection