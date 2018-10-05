<!DOCTYPE html>
<html>

<head>

    @include('layouts.backend.partials.head')

</head>

<body class="gray-bg" style="text-align:center;">
    <h1 class="logo-name">DNAsbook</h1>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <!--<h1 class="logo-name">DNAsbook</h1>-->

            </div>
            <h3>Welcome to DNAsbook Digital Marketing</h3>
            <p>Perfectly designed.
                
            </p>
            <p>Login in. To see it in action.</p>

                    {!! Form::open(['id' => 'login', 'url' => '/login', 'method' => 'post', 'files' => false, 'class'=>'m-t']) !!}
                        
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">

                                  
                                    
                                    {!! Form::email('email', old('email'), ['class'=>'form-control', 'tabindex'=>'1', 'placeholder'=>'Email Address']) !!}

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>
                         
                        
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">                                                               
                                   
                                    
                                    
                                    {!! Form::password('password', ['class'=>'form-control' , 'tabindex'=>'2', 'placeholder'=>'Password']) !!}
                                    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>
                        
                            <button type="submit" class="btn btn-primary block full-width m-b" tabindex="3">
                                 {{ trans('login.submit') }}
                            </button>

                            <a href="#"><small>Forgot password?</small></a>
                            <p class="text-muted text-center"><small>Do not have an account?</small></p>
                            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>


                               
                            


                    {!! Form::close() !!}

                </div>
    </div>

</body>

</html>
