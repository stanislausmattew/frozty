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
        <div class="left-content">

            @php
                $id = $ids;
                $data = \DB::select("select * from product where id = '$id'");
            @endphp
            @foreach ($data as $gambar)
                <div class="image"><img src="{{asset('Product/'.$gambar->Gambar)}}" alt="" style="width: 100px; height: 100px; border-radius: 20px;"></div>

            <div class="deskripsi">
                    <h2 >{{$gambar->Nama}}</h2>
                    <p>Harga sudah termasuk 10% PPn</p>
                    <p>Syarat dan Ketentuan:</p>
                    <p>Pembayaran akan diproses paling lambat 1x24 jam. Dimohon untuk transfer sesuai dengan harga yang sudah ditentukan.</p>

                    <p>Apabila terjadi kesalahan pada saat transfer mohon untuk menghubungi Customer Service kami berserta bukti!</p>

                    Unduh dan mainkan {{$gambar->Nama}} sekarang!
                    <br>
                @endforeach
                <a href="{{url('https://www.apple.com/id/app-store')}}"><img src="{{asset('Image/appstore.png')}}" alt="" style="margin-right: 10px;"></a>
                <a href="{{url('https://play.google.com/store/apps')}}"><img src="{{asset('Image/googleplay.png')}}" alt=""></a>
            </div>
        </div>
        <div class="right-content">
            <form action="{{url('/Pesan')}}" method="POST">
                @csrf
                <div class="box">
                    <h3>Masukkan User ID</h2>
                    <input type="text" name="ID" class="" placeholder="User ID" style="width: 250px;">
                    <input type="text" name="Server" class="" placeholder="Zone ID" style="width: 100px;">
                </div>
                @php
                    $id = $ids;
                    $data = \DB::select("select * from gproduct where FkPro ='$id'");
                @endphp
                <div class="box">
                    <h3>Nominal Topup</h2>
                    <select name="Product" id="pro">
                        <option value="">-</option>
                        @foreach ($data as $pro)
                            <option value="{{$pro->id."-".$pro->Harga}}">{{$pro->Nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="box">
                    <h3>Metode Pembayaran</h2>
                    <label class="custom-radio">
                        <input type="radio" name="bank" id="" value="BCA">
                        <div class="radio-btns">
                        <img src="{{asset('Image/bca.png')}}" style="width: 120px;" alt="">
                        </div>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="bank" id="" value="BNI">
                        <div class="radio-btns">
                        <img src="{{asset('Image/bni.png')}}" style="width: 120px;" alt="">
                        </div>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="bank" id="" value="BRI">
                        <div class="radio-btns" style="width: 105px;">
                        <img src="{{asset('Image/bri.png')}}" style="width: 100px; height:47px;" alt="">
                        </div>
                    </label>
                </div>
                <select name="promo" id="promo">
                    <option value="0">-</option>
                    @php
                        $promo = \DB::select("select * from promo");
                        $TGL = date_format(date_create('now'),'Ymd');
                    @endphp
                    @foreach ($promo as $promo)
                        @if ($TGL >= date_format(date_create($promo->TGL_Start),'Ymd') && $TGL <= date_format(date_create($promo->TGL_END),'Ymd'))
                            <option value="{{$promo->Potongan}}">{{$promo->Nama}}</option>
                        @endif
                    @endforeach
                </select><br>
                <label id="label"></label>
                <input type="hidden" name="tot" id="tot">
                <button class="btn btn-dark" style="margin-top: 100px;">Beli sekarang</button>
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
            display: flex;
            justify-content: space-between;
        }

        .left-content {
            margin: 0;
            padding: 0;
            height: 100vh;
            position: relative;
            display: flex;
        }

        .right-content{
            margin: 0;
            padding: 0;
            height: 100vh;
            position: relative;
        }

        .deskripsi{
            font-size: 17px;
            margin-left: 30px;
            margin-top: 10px;
            color: white;
            overflow: hidden;
            text-overflow: clip;
            width: 400px;
        }

        .deskripsi img{
            width: 30%;
            margin-top: 10px;
        }

        .bayar img{
            width: 25%;
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
            padding: 3 3 3 8px;
            border-radius: 5px;
        }

        form select{
            border: 1px solid black;
            background-color: transparent;
            padding: 3 3 3 8px;
            border-radius: 5px;
            width: 350px;
        }

        .custom-radio input {
            display: none;
        }

        .radio-btns {
            width: 100%;
            border: 1px solid black;
            border-radius: 10px;
            cursor: pointer;
        }

        .custom-radio input:checked + .radio-btns {
            background-color: black;
            border-radius: 10px;
        }
    </style>
@endsection
