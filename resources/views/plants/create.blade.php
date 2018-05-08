@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Add Plant') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('plants.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
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
                                            <option value="{{$room->id}}">{{$room->name}}</option>
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
                                            <option value="{{$planter->id}}">{{$planter->name}}</option>
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
                                            <option value="{{$soiltype->id}}">{{$soiltype->name}}</option>
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
                                            <option value="{{$planttype->id}}">{{$planttype->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}"> --}}
                                <textarea id='noteTextarea' name="comments" rows='4' cols='45' maxlength='1056'></textarea>
                                @if ($errors->has('comments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Plant') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
