@extends('layouts/app')

@section('content')

        @foreach ($ads as $ad)
            <div class="adlist-item">
                <p><b>{{ $ad->title }}</b></p>
                <p>{{ $ad->description }}</p>
                <p>&euro;{{ $ad->price }}</p>
            </div>
        @endforeach


@endsection