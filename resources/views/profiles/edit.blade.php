@extends('layouts.app')

@section('content')
    <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>First Name:</label>
        <input type="text" name="firstname" value="{{ $profile->firstname }}">

        <label>Last Name:</label>
        <input type="text" name="lastname" value="{{ $profile->lastname }}">

        <label>Mobile:</label>
        <input type="text" name="mobile" value="{{ $profile->mobile }}">

        <button type="submit">Update</button>
    </form>
@endsection
