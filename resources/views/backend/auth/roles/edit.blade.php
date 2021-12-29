@extends('backend.layout.app')

@section('title') User Management @endsection

@section('content')


<div class="row">
<div class=" col-lg-12">

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit New Role</h4>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                         
                                            @if ($errors->has('name'))
                                                    <span class="invalid feedback text-danger"role="alert">
                                                        <strong>{{ $errors->first('name') }}.</strong>
                                                    </span>
                                            @endif
 
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Permission</label>
                                            <div class="col-sm-9">
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
                                        <br/>
                                        @endforeach

                                                
                                            
 
                                            </div>
                                        </div>

                            
                                      
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>

                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
					</div>

</div>

@endsection