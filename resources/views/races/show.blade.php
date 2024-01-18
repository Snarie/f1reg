@extends('layouts.app')

@section('content')
    <p>{{ $profile->firstname }} {{ $profile->lastname }} - {{ $profile->mobile }}</p>
@endsection
