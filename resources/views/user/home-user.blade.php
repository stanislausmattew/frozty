<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@extends("template.template-user")

@section("content")
<div class="square" style="z-index: 1;"></div>

<div class="container" style="z-index: 4; position: relative;" >
    <div class="left-content">
        <div class="lf">
            <h2 style="color: white;">List Produk</h2>
            <h6>
               Saldo : {{$Saldo}} 
            </h6>
         
            <div class="box-container">
            @php
                $data = \DB::select("select * from product")
            @endphp
            @foreach ($data as $pro)
                <a href="{{url('/Game/'.$pro->id)}}" class="box-1">
                    <img src="{{asset('Product/'.$pro->Gambar)}}" alt="">
                    <p>{{$pro->Nama}}</p>
                </a>
            @endforeach
            </div>
        </div>
    </div>

        {{-- right-content jok mbok ubah2 ngomongo aku mau ngubah --}}
        <div class="right-content">
            <div class="slider">
                <div class="slide">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="st first">
                        <img src="Image/voucher1.jpg" alt="">
                    </div>

                    <div class="st">
                        <img src="Image/voucher2.jpg" alt="">
                    </div>

                    <div class="st">
                        <img src="Image/voucher3.jpg" alt="">
                    </div>

                    <div class="st">
                        <img src="Image/voucher4.jpg" alt="">
                    </div>

                    <div class="nav-auto">
                        <div class="a-b1"></div>
                        <div class="a-b2"></div>
                        <div class="a-b3"></div>
                        <div class="a-b4"></div>
                    </div>

                    <div class="nav-m">
                        <label for="radio1" class="m-btn"></label>
                        <label for="radio2" class="m-btn"></label>
                        <label for="radio3" class="m-btn"></label>
                        <label for="radio4" class="m-btn"></label>
                    </div>
                </div>
            </div>

        </div>

        <div class="slogan">
            <p>Top-up murah dan terpercaya, kami menyediakan pelayanan cepat dan ramah. Ayo pesan sekarang!</p>
        </div>
    </div>
    <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio'+counter).checked=true;
            counter++;
            if(counter > 4){
                counter = 1;
            }
        },4000);
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
            display: flex;
            justify-content: space-between;
        }

        .left-content {
            margin: 0;
            padding: 0;
            height: 100vh;
            position: relative;
        }
        .lf{
            margin-top: 100px;
        }

        .right-content{
            margin: 0;
            padding: 0;
            height: 100vh;
            margin-top: 100px;
            display: flex;
            justify-content: center;
            /* align-items: center; */
            position: relative;
        }

        .slider{
            width:500px;
            height: 300px;
            border-radius: 10px;
            overflow: hidden;

            /* box-shadow: 1px 1px 12px rgba(255, 255, 255, 0.3); */
            box-shadow: -5px 20px 50px rgb(138 128 255);
            opacity: 85%;
            transition: box-shadow 0.5s;
        }

        .slide {
            width: 500%;
            height: 300px;
            display: flex;
        }

        .slide input{
            display: none;
        }

        .st{
            width: 20%;
            transition: 2s;
        }

        .st img{
            width: 100%;
            height: 300px;
        }

        .nav-m{
            position: absolute;
            width: 500px;
            margin-top: 320px;
            display: flex;
            justify-content: center;
        }

        .m-btn{
            border: 1px solid white;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }

        .m-btn:not(:last-child){
            margin-right: 30px;
        }

        .m-btn:hover{
            background-color: white;
        }

        #radio1:checked ~.first{
            margin-left: 0;
        }
        #radio2:checked ~.first{
            margin-left: -20%;
        }
        #radio3:checked ~.first{
            margin-left: -40%;
        }
        #radio4:checked ~.first{
            margin-left: -60%;
        }

        .nav-auto{
            position: absolute;
            width: 500px;
            margin-top: 320px;
            display: flex;
            justify-content: center;
        }

        .nav-auto div{
            border: 1px solid black;
            padding: 5px;
            border-radius: 10px;
            transition: 1s;
        }

        .nav-auto div:not(:last-child){
            margin-right: 30px;
            justify-content: center;
        }

        #radio1:checked ~ .nav-auto .a-b1{
            background-color: white;
        }
        #radio2:checked ~ .nav-auto .a-b2{
            background-color: white;
        }
        #radio3:checked ~ .nav-auto .a-b3{
            background-color: white;
        }
        #radio4:checked ~ .nav-auto .a-b4{
            background-color: white;
        }

        .box-container{
            /* padding: 1% 15% 1% 15%; */
            display: inline-flex;
            /* justify-content: space-around; */
            flex-flow: wrap;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 30px;
            margin: 4% 5% 5% 5%;
            /* margin-top: 30px; */
        }

        .box-container a{
            text-decoration: none;
            color: black;
        }

        .box-1{
            width: 130px;
            height: 140px;
            background-color: white;
            background-repeat: no-repeat;
            box-shadow: 1px 1px 5px rgba(0, 0,0, 0.3);
            border-radius: 20px;
            display: flex;
            text-align: center;
            flex-direction: column;
            /* justify-content: space-evenly; */
            padding-top: 15px;
            align-items: center;
            cursor: pointer;
        }
        .box-1:hover{
            box-shadow: 1px 1px 12px rgba(255, 255, 255, 0.3);
            opacity: 85%;
            transition: box-shadow 0.5s;
        }

        .box-1 p{
            overflow: hidden;
            text-overflow: clip;
        }
        .tile-1{
            background-position: 30% 50%;
            background-repeat: no-repeat;
            background-size: cover;

            width: 100%;
            background-color: white ;
            border-radius: 45px 45px 0px 0px;
            margin-bottom: 0px;
        }

        .box-1 img{
            width: 60px;
            height: 60px;
            border-radius: 5px;
        }

        .slogan{
            position: absolute;
            color: white;
            font-size: 20px;
            width: 500px;
            box-sizing: border-box;
            top: 480;
            right: 0;
        }
    </style>
@endsection
