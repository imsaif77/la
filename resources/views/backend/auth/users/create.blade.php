@extends('backend.layout.app')

@section('title') User Management @endsection

@section('content')


<div class="row">
<div class=" col-lg-12">

<!-- @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New User</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                {!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                            {!! Form::text('name', old('name'), array('placeholder' => 'Name','class' => 'form-control')) !!}
                                         
                                            @if ($errors->has('name'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('name') }}.</strong>
                                                    </span>
                                            @endif
 
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                            {!! Form::text('email', old('email'), array('placeholder' => 'Email','class' => 'form-control')) !!}
                                            @if ($errors->has('email'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('email') }}.</strong>
                                                    </span>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telegram Id</label>
                                            <div class="col-sm-9">
                                            {!! Form::text('telegram_id', old('telegram_id'), array('placeholder' => 'Telegram Id','class' => 'form-control')) !!}
                                            @if ($errors->has('telegram_id'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('telegram_id') }}.</strong>
                                                    </span>
                                            @endif   
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                           
                                            @if ($errors->has('password'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('password') }}.</strong>
                                                    </span>
                                            @endif    
                                        </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                            @if ($errors->has('confirm-password'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('confirm-password') }}.</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                            
                                            @if ($errors->has('roles'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('roles') }}.</strong>
                                                    </span>
                                            @endif  
                                        </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3">Confirmed</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="confirmed" type="checkbox" >
                                                    <label class="form-check-label">
                                                        Email verification
                                                    </label><br>
                                                    @if ($errors->has('confirmed'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('confirmed') }}</strong>
                                                    </span>
                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </div>

                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
					</div>

</div>

@endsection