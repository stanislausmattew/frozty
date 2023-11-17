@extends('template.template')

@section('content')
    <div class="container">
        <div class="screen">
            <p style="text-align:center; padding-top:25px; font-size:32px;">REGISTER</p>
            <form action="" method="POST">
                @csrf
                <div class="first" style="width: 50%;">
                    <div class="register_field">
                        Fullname <br>
                        <input type="text" class="register_input" name="Fname" placeholder="Type your fullname">
                    </div>
                    <div class="register_field">
                        Username <br>
                        <input type="text" class="register_input" name="username" placeholder="Type your username">
                    </div>
                    <div class="register_field">
                        Email <br>
                        <input type="email" class="register_input" name="email" placeholder="Type your email">
                    </div>
                </div>

                <div class="second"style="width: 50%; margin-left:50px;">
                    <div class="register_field">
                        Password <br>
                        <input type="password" class="register_input" name="pass" placeholder="Type your password">
                    </div>
                    <div class="register_field">
                        Confirm Password <br>
                        <input type="password" class="register_input" name="pass_confirmation" placeholder="Type your confirm password">
                    </div>
                    @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p style="font-size: 12px; margin-top:2px; text-align: right;">Have an account? <a href="/login"> Signin</a> </p>
                    <div class="button-register">
                        <button class="sign-up" type="submit" style="font-weight: 400;" name="login">REGISTER</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('style')
<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 90vh;
        z-index: 2;
    }

    .screen {
        background-color:rgb(255,255,255);
        opacity:0.8;
        position: relative;
        height: 450px;
        width: 800px;
        box-shadow: 0px 0px 24px #5C5696;
        border-radius: 13px;
    }

    form {
        z-index: 1;
        margin: auto;
        display: flex;
        padding-left: 33px;
        padding-right: 33px;
    }
    .register_input{
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        width: 100%;
    }

    .register_field {
        padding-top: 25px;
        position: relative;
        font-size: 18px;
    }
    .register_field input {
        margin-top:5px;
        font-size: 12px;
    }

    form a{
        text-decoration: none;
        font-size: 12px;
        padding-left:2px;
    }

    form .sign-up{
        color: white;
        background: rgb(138,128,255);
        background: radial-gradient(circle, rgba(138,128,255,1) 0%, rgba(68,63,123,1) 100%);
        border-radius: 8px;
        border-color: transparent;
        font-size: 16px;
        font-weight: bold;
        padding-left: 3em;
        padding-right: 3em;
        padding-top: 0.2em;
        padding-bottom: 0.2em;
        cursor: pointer;
        position: relative;
        width: 100%;
    }

    .sign-up:hover{
        color: black;
        background-color : transparent;
        transition: 0.2s;
    }

    .button-register{
        margin-top: 100px;
    }
</style>
@endsection
