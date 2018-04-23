@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($i as $item)
                    <li>{{ $item['title'] }}</li>
                @endforeach
            </div>
        </div>
    </div>
@endsection
