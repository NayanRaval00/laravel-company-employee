@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Choose a Plan</h2>
    <div class="row">
        @foreach ($plans as $plan)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5>{{ $plan['name'] }}</h5>
                        <p>{{ $plan['price'] }}</p>
                        <ul>
                            @foreach ($plan['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <input type="hidden" name="price_id" value="{{ $plan['id'] }}">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
