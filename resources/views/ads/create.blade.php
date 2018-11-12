@extends('../layouts/app')

@section('content')

    <div class="perfect-center-parent">
        <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">
            <form class="form" action="/ads" method="POST">
                @csrf

                <div class="form-header line-bottom">
                    Create an ad
                </div>

                <div class="form-input">
                    <input name="title" class="text-input" type="text" placeholder="Ad title">
                </div>

                <div class="form-input">
                    <textarea name="description" class="text-input textarea" placeholder="Ad description here"></textarea>
                </div>

                <div class="form-input">
                    &euro; <input name="price" class="form-price" type="number" placeholder="Price">
                </div>

                <div class="form-input">
                    <button type="submit">
                        Place ad
                    </button>
                </div>

                @if ($errors->any())
                    @foreach ($errors as $error)
                        {{ $error }}
                    @endforeach
                @endif

            </form>
        </div>
    </div>

@endsection