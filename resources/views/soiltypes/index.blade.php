@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Soil Types <br />
                    <a href='/soiltypes/create'>Add Soil Type</a>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                        <tr>
                            <td>Name</td>
                            <td>Comments</td>
                            <td></td>
                        </tr>
                        @foreach($soiltypes as $soiltype)
                            <tr>
                                <td>{{ $soiltype['name'] }}</td>
                                <td>{{ $soiltype['comments'] }}</td>
                                <td><a href='/soiltypes/edit/{{ $soiltype['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection