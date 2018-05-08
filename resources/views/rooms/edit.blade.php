@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Edit Room') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/rooms/{{ $room->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $room->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value='{{ $room->name }}' required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}"> --}}
                                <textarea id='noteTextarea' name="comments" rows='4' cols='55' maxlength='1056'>{{ $room->comments }}</textarea>
                                @if ($errors->has('comments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href='/rooms/destroy/{{ $room->id }}'>
                                    Delete room
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection