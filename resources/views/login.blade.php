@extends('template.template')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="container">
        @if (session()->has("errors"))
            <div class="alert alert-info">
                <strong>Login Terlebih Dahulu</strong>
            </div>
        @elseif(session()->has('Ban'))
            <div class="alert alert-info">
                <strong>User Telah DiBanned</strong>
            </div>
        @endif
        <div class="screen">
            <p style="text-align:center; padding-top:25px; font-size:32px;">LOGIN</p>
            <form action="" method="POST">
                @csrf
                <div class="login_field">
                    Username<br>
                    <input type="text" class="login_input" name="username" placeholder="Type your username">
                </div>
                <div class="login_field">
                    Password <br>
                    <input type="password" class="login_input" name="pass" placeholder="Type your password">
                </div>
                {{-- <a href="#">Forgot password?</a> <br> --}}
                <span data-toggle="modal" data-target="#exampleModal">Forgot password?</span>
                <div class="button-login">
                    <button class="sign-up" type="submit" style="font-weight: 400;" name="login">LOGIN</button>
                </div>
                <p style="font-size: 12px; text-align: center; margin-top:50px;">Not a member? <a href="/register"> Signup</a> </p>
            </form>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        Email :<br>
                        <input type="email" name="emails" class="login_input">
                        New Password : <br>
                        <input type="text" name="">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
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
        height: 500px;
        width: 360px;
        box-shadow: 0px 0px 24px #5C5696;
        border-radius: 13px;
    }

    form {
        z-index: 1;
        margin: auto;
        padding-left: 33px;
        padding-right: 33px;
    }
    .login_input{
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        width: 100%;
    }

    .login_field {
        padding-top: 25px;
        position: relative;
        font-size: 18px;
    }
    .login_field input {
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

    .button-login{
        margin-top: 40px;
    }
</style>
@endsection
