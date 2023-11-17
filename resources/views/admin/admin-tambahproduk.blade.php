@extends('template.template-admin')

@section('title')
    <title>Admin panel</title>
@endsection

@section('content')
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="/admin/Home">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="title">List Produk</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/Order">
                        <i class="fas fa-large"></i>
                        <div class="title">Cek Pesanan</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/Users">
                        <i class="fas fa-stethoscope"></i>
                        <div class="title">User Management</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-stethoscope"></i>
                        <div class="title">Tambah Promo</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <form action="{{url('/admin/TambahGProduct')}}" method="POST">
                @csrf
                <div class="box">
                    <h3>Nama Barang </h3>
                    <input type="text" name="Nama_Barang" class="Nama_Barang" placeholder="" style="width: 250px;">
                </div>
                <div class="box">
                    <h3>Harga Barang </h3>
                    <input type="text" name="Harga" class="Harga" placeholder="" style="width: 250px;">
                </div>
                <div class="box">
                    <h3>Kategori Game</h2>
                    @php
                        $data =\DB::select("select * from product");
                    @endphp
                    <select name="Kategori" id="">
                        @foreach ($data as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->Nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success" style="bottom: 100px;">Tambah</button>
                <a href="{{url('/admin/Home')}}"><button class="btn btn-danger" style="bottom: 100px;">Back</button></a>
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
            height: 500px;
            position: relative;
            padding: 20px;
        }

        .box{
            margin-bottom:16px;
        }

        form input {
            border: 1px solid black;
            background-color: transparent;
            padding-left: 5px;
            border-radius: 5px;
            height: 30px;
        }

        form select{
            border: 1px solid black;
            background-color: transparent;
            padding: 3 3 3 8px;
            border-radius: 5px;
            width: 350px;
        }
    </style>
@endsection
