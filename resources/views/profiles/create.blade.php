@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form style="margin-left: 2rem" action="{{ route('profiles.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            @error('user_id')
            {{ $message }}
            @enderror
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstname" style="font-weight:700" class="form-label text-muted lead">Firstname:</label>
                        <input type="text" class="form-control border border-2" id="firstname" name="firstname" value="{{ old('firstname') }}">
                        @error('firstname')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lastname" style="font-weight:700" class="form-label text-muted lead">Lastname:</label>
                        <input type="text" class="form-control border border-2" id="lastname" name="lastname" value="{{ old('lastname') }}">
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
                        <input type="text" class="form-control border border-2" id="mobile" name="mobile" value="{{ old('mobile') }}">
                        @error('mobile')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container mt-4">--}}
{{--        <form style="margin-left: 2rem" action="{{ route('profiles.store') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="firstname" class="form-label">Firstname:</label>--}}
{{--                        <input class="form-control border border-2" type="text" name="firstname" value="{{old('firstname') ?? ''}}">--}}
{{--                    </div>--}}

{{--                    @error('firstname')--}}
{{--                    {{ $message }}--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="lastname" class="form-label">Lastname:</label>--}}
{{--                        <input class="form-control border border-2" type="text" name="lastname" value="{{old('lastname') ?? ''}}">--}}
{{--                    </div>--}}

{{--                    @error('lastname')--}}
{{--                    {{ $message }}--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="mobile" class="form-label">Mobile:</label>--}}
{{--                        <input class="form-control border border-2" type="text" name="mobile" value="{{old('mobile') ?? ''}}">--}}
{{--                    </div>--}}

{{--                    @error('mobile')--}}
{{--                    {{ $message }}--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}

{{--            @error('user_id')--}}
{{--            <p class="text-danger">--}}
{{--                {{ $message }}--}}
{{--            </p>--}}
{{--            @enderror--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}
