@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Rooms <br />
                    <a href='/rooms/create'>Add Room</a>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                        <tr>
                            <td>Name</td>
                            <td>Comments</td>
                            <td></td>
                        </tr>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $room['name'] }}</td>
                                <td>{{ $room['comments'] }}</td>
                                <td><a href='/rooms/edit/{{ $room['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection