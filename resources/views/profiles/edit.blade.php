@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form style="margin-left: 2rem" action="{{ route('profiles.update', $profile->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstname" style="font-weight:700" class="form-label text-muted lead">Firstname:</label>
                        <input type="text" class="form-control border border-2" id="firstname" name="firstname" value="{{ $profile->firstname }}">
                        @error('firstname')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lastname" style="font-weight:700" class="form-label text-muted lead">Lastname:</label>
                        <input type="text" class="form-control border border-2" id="lastname" name="lastname" value="{{ $profile->lastname }}">
                        @error('lastname')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mobile" style="font-weight:700" class="form-label text-muted lead">Mobile:</label>
                        <input type="text" class="form-control border border-2" id="mobile" name="mobile" value="{{ $profile->mobile }}">
                        @error('mobile')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
