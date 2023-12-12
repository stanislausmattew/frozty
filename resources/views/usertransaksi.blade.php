@extends('template.template')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="screen">
            <p style="text-align:center; padding-top:25px; font-size:32px;">LOGIN</p>
            <form action="/usertransaksi" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="login_field">
                    ID_User<br>
                    <input type="text" class="login_input" name="ID_User" placeholder="Type your ID_User">
                </div>
                <div class="login_field">
                    Nama_product <br>
                    <input type="password" class="login_input" name="nama_product" placeholder="Type your Nama_Product">
                </div>
                <div class="login_field">
                    Harga <br>
                    <input type="password" class="login_input" name="Harga" placeholder="Type your Harga">
                </div>
                <div class="login_field">
                    Bukti Transaksi <br>
                    <input type="file" class="login_input" name="bukti_transaksi[]" placeholder="Type your Bukti Transaksi ">
                </div>
                {{-- <a href="#">Forgot password?</a> <br> --}}
                <span data-toggle="modal" data-target="#exampleModal">Forgot password?</span>
                <div class="button-login">
                    <button class="sign-up" type="submit" style="font-weight: 400;" name="login">Kirim</button>
                </div>
                <p style="font-size: 12px; text-align: center; margin-top:50px;">Not a member? <a href="/register"> Signup</a> </p>
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
