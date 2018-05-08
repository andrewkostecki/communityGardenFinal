@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">
                    <img src='{{$plant->imageFileName}}' style="width: 50px;  height: 50px" class="rounded imgPopup"/>
                    {{ __('Edit Plant') }}
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/plants/{{ $plant->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $plant->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value='{{ $plant->name }}' required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('Room') }}</label>

                            <div class="col-sm-6">	
                                    <select class="form-control" name="room" id="room">
                                        <option value="">Select Room</option>
                                        @foreach($rooms as $room)
                                            @if($room->id == $plant->roomID)
                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                                <option value="{{$room->id}}" selected>{{$room->name}}</option>
                                            @else
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="planter" class="col-md-4 col-form-label text-md-right">{{ __('Planter') }}</label>

                            <div class="col-sm-6">	
                                    <select class="form-control" name="planter" id="planter">
                                        <option value="">Select Planter</option>
                                        @foreach($planters as $planter)
                                            @if($planter->id == $plant->planterID)
                                            <option value="{{$planter->id}}">{{$planter->name}}</option>
                                                <option value="{{$planter->id}}" selected>{{$planter->name}}</option>
                                            @else
                                                <option value="{{$planter->id}}">{{$planter->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="soiltype" class="col-md-4 col-form-label text-md-right">{{ __('Soil Type') }}</label>

                            <div class="col-sm-6">	
                                    <select class="form-control" name="soiltype" id="soiltype">
                                        <option value="">Select Soil Type</option>
                                        @foreach($soiltypes as $soiltype)
                                            @if($soiltype->id == $plant->soiltypeID)
                                            <option value="{{$soiltype->id}}">{{$soiltype->name}}</option>
                                                <option value="{{$soiltype->id}}" selected>{{$soiltype->name}}</option>
                                            @else
                                                <option value="{{$soiltype->id}}">{{$soiltype->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="planttype" class="col-md-4 col-form-label text-md-right">{{ __('Plant Type') }}</label>

                            <div class="col-sm-6">	
                                    <select class="form-control" name="planttype" id="planttype">
                                        <option value="">Select Plant Type</option>
                                        @foreach($planttypes as $planttype)
                                            @if($planttype->id == $plant->planttypeID)
                                            <option value="{{$planttype->id}}">{{$planttype->name}}</option>
                                                <option value="{{$planttype->id}}" selected>{{$planttype->name}}</option>
                                            @else
                                                <option value="{{$planttype->id}}">{{$planttype->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}"> --}}
                                <textarea id='noteTextarea' name="comments" rows='4' cols='55' maxlength='1056'>{{ $plant->comments }}</textarea>
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
                                <a href='/plants/destroy/{{ $plant->id }}'>
                                    Delete Plant
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