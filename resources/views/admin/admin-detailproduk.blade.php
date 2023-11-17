@extends('template.template-admin')

@section('title')
    <title>Admin panel</title>
@endsection

@section('content')
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="title">List Produk</div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-large"></i>
                        <div class="title">Cek Pesanan</div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-stethoscope"></i>
                        <div class="title">User Management</div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{overflow: hidden;}

        .container {
            position: relative;
            width: 100%;
        }

        .sidebar{
            position: fixed;
            left: 0;
            top: 48px;
            bottom: 0;
            padding-top: 20px;
            width: 300px;
            height: 100%;
            background: #443F7B;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .sidebar ul li {
            width: 100%;
            list-style: none;
            border-bottom: 1px solid white;
        }

        .sidebar ul {
            margin-bottom: 0px;
            padding-left: 0px;
        }

        .sidebar ul li:hover{
            background: #444;
            transition: 0.2s;
        }

        .sidebar ul li a {
            width: 100%;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a i {
            min-width: 60px;
        }

        .sidebar .title {
            font-size: 20px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .main{
            position: absolute;
            width: calc(100% - 300px);
            min-height: 100vh;
            left: 300px;
            top: 71px;
        }

        .top-bar{
            display: flex;
            margin-top: 40px;
            margin-bottom: 10px;
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
