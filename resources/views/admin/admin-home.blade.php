<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

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
                            <h2 style="color: white;">List Kategori</h2>
                        </div>
                    </div>
                </div>
                <div class="search" style="display: flex;">
                    <form action="{{url('/Search/Product')}}" method="post">
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
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = $datas;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <th scope="row">{{$d->id}}</th>
                                <td>{{$d->Nama}}</td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d->id?>">Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#product<?php echo $d->id?>">Product</button>
                                    <a href="{{url('/Hapus/Kategori/'.$d->id)}}"><button class="btn btn-danger">Buang</button></a>
                                    {{-- <button data-target="#editproduct1" data-toggle="modal">test</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @php
                    $data = \DB::select("select * from product");
                @endphp
                @foreach ($data as $d)
                    <div class="modal fade" id="edit<?php echo $d->id?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit">Edit</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{url('/product/Update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $id = $d->id;
                                        $data = \DB::select("select * from product where id ='$id'");
                                    @endphp
                                    @foreach ($data as $data)
                                        <div class="modal-body">
                                            <p>
                                                Nama Kategori : <br>
                                                <input type="text" name="NamaKategori" value="{{$data->Nama}}">
                                            </p>
                                            <p>
                                                Gambar : <br>
                                                <input type="file" name="Logo">
                                            </p>
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                        </div>
                                    @endforeach

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="product<?php echo $d->id?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Product</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @php
                                        $id = $d->id;
                                        $data = \DB::select("select * from gproduct where FkPro ='$id'");
                                    @endphp
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $data)
                                                <tr>
                                                    <td>{{$data->Nama}}</td>
                                                    <td>{{$data->Harga}}</td>
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" id="editgpro" data-target="#editgproduct{{$data->id}}" data-id="{{$data->id}}" data-nama="{{$data->Nama}}" data-Harga="{{$data->Harga}}"><i class="fas fa-edit">Edit</i></button>
                                                       {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#editgproduct<?php echo $data->id?>">Edit</button> --}}
                                                        <a href="{{url('/Hapus/Product/'.$data->id)}}"><button class="btn btn-danger">Buang</button></a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer p">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="/admin/TambahProduct"><button type="button" class="btn btn-primary">Tambah Product</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $id = $d->id;
                        $data = \DB::select("select * from gproduct where FkPro ='$id'");
                    @endphp
                    @foreach ($data as $data)
                    <div id="editgproduct{{$data->id}}" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Product</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('/gproduct/Update')}}" method="post">
                                        @csrf
                                        @php
                                            $id = $data->id;
                                            $data = DB::select("select gproduct.id,gproduct.nama,product.Nama,gproduct.Harga from product,gproduct where product.id = gproduct.FkPro and gproduct.id = '$id'")
                                        @endphp
                                        @foreach ($data as $prod )
                                        <p>
                                            Nama :
                                            <input type="text" name="Nama" id="Namas" value="{{$prod->nama}}">
                                        </p>
                                        <p>
                                            Harga :
                                            <input type="text" name="Harga" id="Harga" value="{{$prod->Harga}}">
                                        </p>
                                        <p>
                                            Kategori :
                                            <input type="text" name="Kategori" id="Kategori" value="{{$prod->Nama}}" disabled>
                                        </p>
                                        <input type="hidden" name="id" value="{{$prod->id}}">
                                        @endforeach
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
            <button class="btn btn-secondary" style="margin-top:10px;" data-toggle="modal" data-target="#exampleModal">Tambah Produk</button>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/Tambah_Kategori')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p>
                            Nama Kategori : <br>
                            <input type="text" name="NamaKategori">
                        </p>
                        <p>
                            Gambar : <br>
                            <input type="file" name="Logo">
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
