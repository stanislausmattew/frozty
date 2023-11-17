<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@extends("template.template-user")

@section("content")
<div class="square" style="z-index: 1;"></div>
    <div class="container" style="z-index: 4; position: relative;" >
        <div class="right-content">
            <form action="" method="POST">
                <div class="box">
                    <h3>Status Pembayaran</h2>
                    <p>Email        : alexanderanjay@gmail.com</p>
                    <p>Produk       : Welkin Moon Genshin Impact</p>
                    <p>Kode Pesanan : GIWM033122P001</p>
                    <p>Status       : Sedang Memproses Pesanan</p>
                </div>
                <button class="btn btn-dark" style="bottom: 100px;">Kembali</button>
            </form>
        </div>
    </div>
@endsection

@section('style')
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            box-sizing: border-box;
            overflow: hidden;
        }

        .square{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #443F7B;
            clip-path: polygon(45% 0%,100% 0%,100% 100%,70% 100%);
        }

        .container{
            margin-top: 100px;
        }

        .right-content{
            margin: 0;
            padding: 0;
            height: 100vh;
            position: relative;
        }

        form {
            border-radius: 10px;
            background-color: #E8E8E8;
            width: 450px;
            position: relative;
            padding: 20px;
            line-height: 15px;
        }

        form h3 {
            margin-bottom: 25px;
        }
    </style>
@endsection
