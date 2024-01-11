<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@extends("template.template-user")

@section("content")
<div class="square" style="z-index: 1;"></div>
    <div class="container" style="z-index: 4; position: relative;" >
        @if (session()->has("status"))
            <div class="alert alert-info">
                <strong>{{session()->get('status')}}</strong>
            </div>
        @endif

        <div class="coba">
            <form action="/topup" method="POST">
                @csrf
                <label for="nama">ID:</label>
                <input type="text" id="id" name="mengid"  required>
            
                <label for="email">Nominal Top Up:</label>
                <input type="text" id="Nominal" name="nom"  required>

                <button type="submit">Konfirmasi</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#pro").change(function(){
                var value = $(this).val();
                var c = value.split("-");
                var harga = c[1];
                $("#label").html("Rp."+harga+",-");
                document.getElementById("tot").value = harga;
            });
        });
        $(document).ready(function(){
            $("#promo").change(function(){
                var value = $(this).val();
                var t = value/100;
                var value = $("#pro").val();
                var c = value.split("-");
                var harga = c[1];
                var tot = harga - (harga* t);
                $("#label").html("Rp."+tot+",-");
                document.getElementById("tot").value = tot;
            });
        });
    </script>
@endsection

@section('style')
    <style>
        body {
        /* margin: 150px; */
        /* padding-left: -200px; */
        padding: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50vh;
        background-color: #f4f4f4; /* Ganti dengan warna latar belakang yang diinginkan */
        }

        /* .container {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        /* form {
        display: flex;
        flex-direction: column;
        } */

        label {
        margin-bottom: 10px;
        }

        input {
        padding: 0px;
        margin-bottom: 16px;
        margin-right: 1200px;
        }

        /* button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        button:hover {
        background-color: #45a049;
        } */
    </style>
@endsection


{{-- @section('style')
    <style>
        body {
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f4f4f4; /* Ganti dengan warna latar belakang yang diinginkan */
        }
/* 
        .container {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        /* form {
        display: flex;
        flex-direction: column;
        }

        label {
        margin-bottom: 8px;
        }

        input {
        padding: 8px;
        margin-bottom: 16px;
        }

        button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        button:hover {
        background-color: #45a049;
        } */
    </style>
@endsection --}}
