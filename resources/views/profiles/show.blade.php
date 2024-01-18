@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-4">
                <div class="card mb-2 h-100">
                    <div class="card-body d-flex flex-column h-100">
                        <h3>{{ $profile->user->name }}</h3>
                        <p class="mb-auto"><strong>First Name:</strong> {{ $profile->firstname }}</p>
                        <p class="mb-auto"><strong>Last Name:</strong> {{ $profile->lastname }}</p>
                        <p class="mb-auto"><strong>Mobile:</strong> {{ $profile->mobile }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-2 h-100">
                    <div class="card-body d-flex flex-column h-100" style="height:inherit">
                        <h3>Recent Wins</h3>
                        @foreach($raceWins as $raceWin)
                            <p class="mb-auto"><strong><a href="{{ route('races.show', $raceWin->race_id) }}">{{ $raceWin->race_name }}</a></strong> {{ $raceWin->race_date }} {{ $raceWin->laptime }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>




        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Laptime</th>
                <th>Race Name</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @php $count = 0; @endphp
            @foreach ($raceResults as $raceResult)
                @if ($count < 10)
                    <tr>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->laptime }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->race_name }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->race_date }}</td>
                    </tr>
                    @php $count++; @endphp
                @else
                    <tr class="hidden-row" style="display: none;">
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->laptime }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->race_name }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->race_date }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" id="show-more-btn">Show More</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('show-more-btn').addEventListener('click', function() {
            var hiddenRows = document.querySelectorAll('.hidden-row');
            hiddenRows.forEach(function(row) {
                row.style.display = 'table-row';
            });
            document.getElementById('show-more-btn').style.display = 'none';
        });
    </script>
@endsection
