@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Edit Note') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/notes/{{ $note->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $note->id }}' type="hidden" id="id" name="id"> 					    
                        <input value='{{ $note->entity }}' type="hidden" id="entity" name="entity"> 					    
                        <input value='{{ $note->entityID }}' type="hidden" id="entityID" name="entityID"> 					    

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}"> --}}
                                <textarea id='noteTextarea' name="comments" rows='4' cols='55' maxlength='1056'>{{ $note->comments }}</textarea>
                                @if ($errors->has('comments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="imageFileName" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="imageFileName" type="file" class="form-control" name="imageFileName" value='{{ $note->imageFileName }}'>

                                @if ($errors->has('imageFileName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imageFileName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if(Request::is('*/plant/*'))
                        <div class="form-group">
                            <label for="share" class="control-label col-sm-2">Share:<strong style="color:darkred;">*</strong></label>
                            <div class="col-sm-10">	
                                <select class="form-control" id="share" name="share">
                                    @if($note->share == 'Yes')
                                        <option value="No">No</option>
                                        <option value="Yes" selected>Yes</option>
                                    @else
                                        <option value="No" selected>No</option>
                                        <option value="Yes">Yes</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        @else
                        <div></div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a class="delete" href='/note/{{$note->entity}}/{{$note->entityID}}/destroy/{{ $note->id}}'>
                                Delete Note
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


