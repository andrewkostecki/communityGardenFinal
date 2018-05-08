@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Notes <br />
                    <a href='/notes/{{$entity}}/{{$entityID}}/create'>Add Note for {{ $entity }} {{ $entityName }} ID: {{ $entityID }}</a>
                </div> 

                <div class="card-body">
                    <table class="table" border='1'>
                        <!--<tr>
                            <td>Note</td>
                            <td></td>
                            <td></td>
                        </tr>-->
                        @foreach($notes as $note)
                            <tr>
                                <td>
                                    @if($note['imageFileName'] == null || $note['imageFileName'] == "")
                                        <img src="{{app('system')->imageFileName}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @else
                                        <img src="{{$note['imageFileName']}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @endif
                                </td>
                                <td>{{ $note['comments'] }}</td>                                
                                <td>
                                    @if($note['share'] == 'Yes')
                                        Shared
                                    @else
                                        Not Shared
                                    @endif  
                                </td>                                
                                <td><a href='/note/edit/{{ $note['id'] }}'>Edit</a></td>
                                <td><a class='delete' href='/note/{{$entity}}/{{$entityID}}/destroy/{{ $note['id'] }}'>Delete
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection