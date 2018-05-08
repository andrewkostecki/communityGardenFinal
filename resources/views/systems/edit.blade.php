@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Edit System') }}
                
                </div>

                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/systems/{{ $system->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $system->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value='{{ $system->name }}' required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="imageFileName" class="col-md-4 control-label">Image File Name</label>

                            <div class="col-md-6">
                                <input id="imageFileName" type="file" class="form-control" name="imageFileName" value='{{ $system->imageFileName }}' >

                                @if ($errors->has('imageFileName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imageFileName') }}</strong>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection