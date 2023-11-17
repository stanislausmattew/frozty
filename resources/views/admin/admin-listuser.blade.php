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
                            <h2 style="color: white;">Manage User</h2>
                        </div>
                    </div>
                </div>
                <div class="search" style="display: flex;">
                    <form action="{{url('/Search/Users')}}" method="post">
                        @csrf
                        <input type="text" name="search" placeholder="Search here" >
                        <button class="btn btn-success">Search</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive" style="overflow-y: auto; height: 400px; background-color: hsla(0, 0%, 100%, 0.7);" >
                <table class="table">
                    <thead class="table-dark" style="position: sticky; top:0;">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $datauser = $datas;
                        @endphp
                        @foreach ($datauser as $duser)
                            <tr>
                                <th scope="row">{{$duser->Username}}</th>
                                <td>{{$duser->Nama}}</td>
                                <td>{{$duser->Email}}</td>
                                @if ($duser->Status == 1)
                                    <td>Active</td>
                                @else
                                    <td>Banned</td>
                                @endif
                                <td>
                                   @if ($duser->Status == 0)
                                        <a href="{{url('/Unban/'.$duser->id)}}"><button class="btn btn-warning">Unban</button></a>
                                   @else
                                        <a href="{{url('/Ban/'.$duser->id)}}"><button class="btn btn-danger">Ban</button></a>
                                   @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
