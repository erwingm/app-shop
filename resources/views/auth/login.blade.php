@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('/img/city.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card-signup">
                <form class="form" method="POST" action="{{ route('login') }}" >
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <h4>Inicio de Sesion</h4>
                      <!--   <div class="social-line">
                            <a href="#pablo" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div> -->
                    </div>
                    <p class="text-divider">Ingresa tu Datos</p>
                    <div class="content">

                        <!-- tambien le podemos cambiar la id type y name por email y cambiar el loginController-->
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                             <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Email o Username..." required autofocus>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock_outline</i>
                            </span>
                            
                            <input id="password" type="password" placeholder="Contraseña..." class="form-control" name="password" required>
                        </div>

                        

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Recordar Sesion
                            </label>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-simple btn-primary btn-lg">Ingresar
                    </div>

                    <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                        </a>-->
                </form>
            </div>
        </div>
    </div>
    </div>


    @include('includes.footer')

</div>
@endsection
