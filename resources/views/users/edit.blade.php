@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if($user['imageFileName'] == null || $user['imageFileName'] == "")
                        <img src="{{app('system')->imageFileName}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                    @else
                        <img src="{{$user['imageFileName']}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                    @endif  
                    {{ __('Edit User') }}
                </div>
        
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $user->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value='{{ $user->name }}' required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value='{{ $user->email }}' required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="imageFileName" class="col-md-4 col-form-label text-md-right">Image File Name:</label> 
                            <div class="col-sm-6">	
                                <input class="form-control" type="file" id="imageFileName" name="imageFileName" placeholder="Image File Name">
                            </div>
                          
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href='/users/destroy/{{ $user->id }}' class='delete'>
                                    Delete User
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