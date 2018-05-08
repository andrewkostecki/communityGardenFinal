@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/community.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Community</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <?php $noteCounter = 0 ?>

                    @foreach($notes as $note)
                        <table class="table table-bordered">
                            <tr>
                                <td><img class="communityNoteUserImage img-circle" src="{{$note->userImageFileName}}" />
                                    {{ $note->userName}}
                                    {{-- <small>{{ timeAgo($note->updated_at) }}</small> --}}
                                    <br /> 
                                    {{ $note->comments}} 
                                </td>
                            </tr>

                            {{--  note the image if there is one  --}}
                            @if($note->imageFileName != 'img/default.png')
                                <tr style="text-align: center">
                                    <td><img    class="communityNoteImage" 
                                                src="{{$note->imageFileName}}"
                                                alt="{{$note->comments}}">
                                    </td>
                                </tr>
                            @endif

                        </table>            
                    @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


