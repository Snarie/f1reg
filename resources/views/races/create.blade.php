@extends('layouts.app')

@section('content')

    <form action="{{ route('profiles.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <label>First Name:</label>
        <input type="text" name="firstname">

        <label>Last Name:</label>
        <input type="text" name="lastname">

        <label>Mobile:</label>
        <input type="text" name="mobile">

        <button type="submit">Create</button>
    </form>
@endsection
