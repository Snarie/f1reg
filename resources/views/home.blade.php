@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="container mt-4">
                <h1>Track Records:</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Race Name</th>
                        <th>Lap Time</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td style="background-color: rgba(255,255,255,0.9)">{{$result['race']}}</td>
                            <td style="background-color: rgba(255,255,255,0.9)">{{$result['name']}}</td>
                            <td style="background-color: rgba(255,255,255,0.9)">{{$result['laptime']}}</td>
                            <td style="background-color: rgba(255,255,255,0.9)"><a href="{{route('races.show', $result['race_id'] )}} ">Show Race</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
