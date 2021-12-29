{{-- Extends layout --}}

@extends('layouts.app')




{{-- Content --}}

@section('content')

	<div class="col-md-6">

                    <div class="authincation-content">

                        <div class="row no-gutters">

                            <div class="col-xl-12">

                                <div class="auth-form">

                                    <h4 class="text-center mb-4">Sign up your account</h4>

                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf

                                           <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Name') }}</strong></label>

                                            <input type="text" name="name" class="form-control " value="{{old('name')}}" placeholder="Enter your Full Name">
                                            @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                                        
                                        </div>
                                        

                                        <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Email') }}</strong></label>

                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                        
                                        </div>

                                        <div class="form-group">

                                            <label class="mb-1"><strong>{{ __('Password') }}</strong></label>

                                            <input type="password" name="password" class="form-control" placeholder="password" >
                                              @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                            

                                        </div>

                                         <div class="form-group">

                                            <label class="mb-1"><strong> {{ __('Confirmed Password') }}</strong></label>

                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmed Password">
                                            
                                             @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif

                                        </div>

                                        <div class="form-group">

                                        <label class="mb-1"><strong> {{ __('Country') }}</strong></label>

                                       <select class="form-control" name="country">
                                           <option value="India">India</option>
                                       </select>


                                        </div>

                                        <div class="text-center mt-4">

                                            <button type="submit" class="btn btn-primary btn-block">  {{ __('Register') }}</button>

                                        </div>

                                    </form>

                                    <div class="new-account mt-3">

                                        <p>Already have an account? <a class="text-primary" href="{!! url('/login'); !!}">Sign in</a></p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

@endsection

