@extends('layouts.app')

@section('content')
    @foreach ($profiles as $profile)
        <p>{{$profile->id}} {{$profile->user_id}} {{$profile->firstname }} {{ $profile->lastname }} - {{ $profile->mobile }}</p>
    @endforeach
@endsection
