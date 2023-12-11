<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@extends("template.template-user")


@section('content')
    <div class="container" style="margin-top:100px;">
        <div class="main">
            <div class="top-bar">
                <div class="tables">
                    <div class="list-produk">
                        <div class="heading">
                            <h2 style="color: white;">History</h2>
                        </div>
                    </div>
                </div>
                {{-- <div class="search" style="display: flex;">
                    <input type="text" name="search" placeholder="Search here" >
                    <button class="btn btn-success">Search</button>
                </div> --}}
            </div>
            <div style="font-size:20px">
                
                {{$status}}
            </div>
            <div class="table-responsive" style="overflow-y: auto; height: 400px; background-color: hsla(0, 0%, 100%, 0.7);" >
                <table class="table">
                    <thead class="table-dark" style="position: sticky; top:0;">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUK</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $user = session()->get("login");
                            $id = DB::select("select * from users where Username = '$user'");
                            $ids = $id[0]->id;
                            $data = DB::select("select * from transaksi where ID_User = '$ids'");
                        @endphp
                        @foreach ($data as $htrans)
                            <tr>
                                <td>{{$htrans->ID}}</td>
                                <td>{{$htrans->Nama_Product}}</td>
                                @if ($htrans->Status == 0)
                                    <td>Belum Lunas</td>
                                @elseif ($htrans->Status == 1)
                                    <td>Lunas</td>
                                @else
                                    <td>Transaksi Selesai</td>
                                @endif
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#detail{{$htrans->ID}}">Detail</button>
                                    @if ($htrans->Status == 2)
                                        <button class="btn btn-success" data-toggle="modal" data-target="#rating{{$htrans->ID}}">Beri Rating</button>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="detail{{$htrans->ID}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal Header</h5    >
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('/SEND')}}" method="post" enctype="multipart/form-data">
                                                @php
                                                    $id = $htrans->ID;
                                                    $datas = DB::select("select * from transaksi where ID = '$id'");
                                                @endphp
                                                @csrf
                                                @foreach ($datas as $detail )
                                                    <p>
                                                        Nama : <br>
                                                        <input type="text" name="Nama" value="{{$detail->Nama_Product}}">
                                                    </p>
                                                    <p>
                                                        Harga : <br>
                                                        <input type="text" name="Harga" value="{{$detail->Harga}}">
                                                    </p>
                                                    <p>
                                                        ID Game : <br>
                                                        <input type="text" name="ID_Game" value="{{$detail->ID_GAME}}">
                                                    </p>
                                                    <p>
                                                        Bukti Transaksi : <br>
                                                        <input type="file" name="Bukti_Transaksi">
                                                    </p>
                                                    <input type="hidden" name="ID" value="{{$detail->ID}}">
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
                            <div class="modal fade" id="rating{{$htrans->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('/Rating')}}" method="post">
                                                @csrf
                                                <fieldset>
                                                    <span class="star-cb-group">
                                                        <input type="radio" id="rating-5" name="rate" value="5" /><label for="rating-5">5</label>
                                                        <input type="radio" id="rating-4" name="rate" value="4" /><label for="rating-4">4</label>
                                                        <input type="radio" id="rating-3" name="rate" value="3" /><label for="rating-3">3</label>
                                                        <input type="radio" id="rating-2" name="rate" value="2" /><label for="rating-2">2</label>
                                                        <input type="radio" id="rating-1" name="rate" value="1" /><label for="rating-1">1</label>
                                                        <input type="radio" id="rating-0" name="rate" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
                                                    </span>
                                                </fieldset>
                                                <input type="hidden" name="FK_ID" value="{{$htrans->ID}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
