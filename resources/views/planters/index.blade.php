@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Planters <br />
                    <a href='/planters/create'>Add Planter</a>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                        <tr>
                            <td>Name</td>
                            <td>Comments</td>
                            <td></td>
                        </tr>
                        @foreach($planters as $planter)
                            <tr>
                                <td>{{ $planter['name'] }}</td>
                                <td>{{ $planter['comments'] }}</td>
                                <td><a href='/planters/edit/{{ $planter['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection