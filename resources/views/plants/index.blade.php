@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    plants <br />
                    <a href='/plants/create'>Add Plant</a>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                        <tr>
                            <td></td>
                            <td>Name</td>
                            <td>Comments</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($plants as $plant)
                            <tr>
                                <td><img src='{{$plant['imageFileName'] }}' style="width: 50px;  height: 50px" class="rounded imgPopup"/></td>
                                <td>{{ $plant['name'] }}</td>
                                <td>{{ $plant['comments'] }}</td>
                                <td><a href='/plants/edit/{{$plant['id']}}'>Edit</a></td>
                                <td><a href='/notes/plant/{{$plant['id']}}'>Notes</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection