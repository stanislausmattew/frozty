@extends('template.template-admin')

@section('title')
    <title>Laporan</title>
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
                <a href="/admin/Promo">
                    <i class="fas fa-stethoscope"></i>
                    <div class="title">Tambah Promo</div>
                </a>
            </li>
            <li>
                <a href="/admin/Laporan">
                    <i class="fas fa-stethoscope"></i>
                    <div class="title">Laporan</div>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="top-bar">
            <div class="tables">
                <div class="list-produk">
                    <div class="heading">
                        <h2 style="color: white;">Laporan Transaksi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive" style="overflow-y: auto; height: 400px; background-color: hsla(0, 0%, 100%, 0.7);" >
            <table class="table" id="Laporan">
                <thead class="table-dark" style="position: sticky; top:0;">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Detail transaksi</th>
                        <th scope="col">Pendapatan tiap transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $data = $datas;
                    $t = 0;
                    foreach ($data as $key) {
                    $t += (int)$key->Harga;
                    }
                    @endphp
                    @foreach ($data as $promo)
                        <tr>
                            <th scope="row">{{$promo->ID}}</th>
                            <td>{{$promo->Tanggal}}</td>
                            <td>{{$promo->Nama_Product}}</td>
                            <td>{{$promo->Harga}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="text" disabled value="{{$t}}">
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
        .search input {
            width: 250px;
            min-width: 128px;
            height: 40px;
            padding: 0 10px;
            margin-right: 10px;
            font-size: 16px;
            color: white;
            outline: none;
            border: none;
            background: transparent;
            border-bottom: 1px solid white;
        }
        .search input::placeholder{color: white;}

        .tables{
            width: 100%;
            grid-gap: 20px;
        }

    </style>
@endsection
