@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Add Note') }} for {{ $entityDetail['entity'] }} {{ $entityDetail['entityName'] }} ID: {{ $entityDetail['entityID'] }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('notes.store')}}" enctype="multipart/form-data">
                        @csrf

                        <input value="{{$entityDetail['entity']}}" type="hidden" id="entity" name="entity"> 
                        <input value="{{$entityDetail['entityID']}}" type="hidden" id="entityID" name="entityID"> 
                      
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

                      <div class="form-group row">
                            <label for="imageFileName" class="col-md-4 col-form-label text-md-right">{{ __('Image File Name') }}</label>

                            <div class="col-md-6">
                                <input id="imageFileName" type="file" class="form-control{{ $errors->has('imageFileName') ? ' is-invalid' : '' }}" name="imageFileName" value="{{ old('imageFileName') }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('imageFileName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="share" class="control-label col-sm-2">Share:<strong style="color:darkred;">*</strong></label>
                            <div class="col-sm-10">	
                                <select class="form-control" id="share" name="share">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Note') }}
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
