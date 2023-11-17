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
                            <h2 style="color: white;">List Promo</h2>
                        </div>
                    </div>
                </div>
                <div class="search" style="display: flex;">
                    <form action="{{url('/Search/Promo')}}" method="post">
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
                            <th scope="col">Nama</th>
                            <th scope="col">Potongan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal Awal</th>
                            <th scope="col">Tanggal Akhir</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = $datas;
                        @endphp
                        @foreach ( $data as $promo)
                            <tr>
                                <th scope="row">{{$promo->Nama}}</th>
                                <td>{{$promo->Potongan}}%</td>
                                <td>{{$promo->Deskripsi}}</td>
                                <td>{{$promo->TGL_Start}}</td>
                                <td>{{$promo->TGL_END}}</td>
                                <td>
                                    <button class="btn btn-warning" data-target="#edit<?php echo $promo->id?>" data-toggle="modal">Edit</button>
                                    <a href="{{url('/Hapus/Promo/'.$promo->id)}}"><button class="btn btn-danger">Buang</button></a>
                                </td>
                                <div class="modal fade" id="edit<?php echo $promo->id?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal Header</h5    >
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('/Edit/Promo')}}" method="post">
                                                    @csrf
                                                    @php
                                                        $id = $promo->id;
                                                        $data = \DB::select("select * from Promo where id = '$id'");
                                                    @endphp
                                                    @foreach ($data as $datas)
                                                        <p>
                                                            Nama : <br>
                                                            <input type="text" name="Nama" value="{{$datas->Nama}}">
                                                        </p>
                                                        <p>
                                                            Potongan : <br>
                                                            <input type="text" name="Potongan" value="{{$datas->Potongan}}">
                                                        </p>
                                                        <p>
                                                            Deskripsi : <br>
                                                            <input type="text" name="Deskripsi" value="{{$datas->Deskripsi}}">
                                                        </p>
                                                    <input type="hidden" name="ID" value="{{$datas->id}}">
                                                    @endforeach
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-secondary" style="margin-top:10px;" data-toggle="modal" data-target="#myModal">Tambah Promo</button>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Header</h5    >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/Tambah/Promo')}}" method="post">
                        @csrf
                        <p>
                            Nama : <br>
                            <input type="text" name="Nama">
                        </p>
                        <p>
                            Potongan : <br>
                            <input type="text" name="Potongan">
                        </p>
                        <p>
                            Deskripsi : <br>
                            <input type="text" name="Deskripsi">
                        </p>
                        <p>
                            Tanggal Start : <br>
                            <input type="date" name="TGL_Awal">
                        </p>
                        <p>
                            Tanggal Berakhir : <br>
                            <input type="date" name="TGL_END">
                        </p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="edit<?php echo $promo->id?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Header</h5    >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/Edit/Promo')}}" method="post">
                        @csrf
                        @php
                            $id = $promo->id;
                            $data = \DB::select("select * from Promo where id = '$id'");
                        @endphp
                        @foreach ($data as $datas)
                            <p>
                                Nama : <br>
                                <input type="text" name="Nama" value="{{$datas->Nama}}">
                            </p>
                            <p>
                                Potongan : <br>
                                <input type="text" name="Potongan" value="{{$datas->Potongan}}">
                            </p>
                            <p>
                                Deskripsi : <br>
                                <input type="text" name="Deskripsi" value="{{$datas->Deskripsi}}">
                            </p>
                        <input type="hidden" name="ID" value="{{$datas->id}}">
                        @endforeach
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
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
