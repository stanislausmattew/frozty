<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @yield('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    @yield('style')
    <style>
        footer{
            background-color:#23213D;
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 4;
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
        .footer-content{
            font-size: 16px;
            color: white;
            padding-top: 15px;
            padding-left: 60px;
            padding-right: 60px;
            padding-bottom: 10px;
        }
        .footer-content a{
            text-decoration: none;
            color: white;
        }
        .copyright {
            font-family: Calibri;
            font-size: 14px;
            font-style: normal;
            font-variant: normal;
            font-weight: 100;
            line-height: 23px;
            text-align: center;
        }

        header{
            background-color:rgb(255,255,255);opacity:0.6;
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            z-index: 3;
        }

        .logo{
            margin-left: 20px;
        }
        .logo img{
            width: 200px;
            height: 100%;
        }

        .logout{
            font-size: 20px;
            text-decoration: none;
            color: black;
            margin-right:50px;
            align-self: center;
        }
        .logout:hover{
            border-bottom: 1px solid blue;
        }
    </style>
</head>
<body style="background-color: #8A80FF">
    <div class="square"></div>
    <header>
        <a href="/admin/Home"><div class="logo"><img src="{{ asset('Image/logo.png') }}"></div></a>
        <a href="{{url('/')}}" class="logout" >LOGOUT</a>
    </header>

    @yield('content')

    <footer>
        <div class="footer-content">
            <h3>Hubungi Kami</h3>
            <a href="instagram" style="margin-right:30px; margin-left:10px;"><img src="{{ asset('Image/instagram.png') }}" alt="" style="width: 20px;height:20px; margin-right:9px;">Instagram</a>
            <a href="whatsapp"><img src="{{ asset('Image/whatsapp.png') }}" alt="" style="width: 20px;height:20px; margin-right:9px;">Whatsapp</a>
            <div class="copyright">2021 LUX. All Right Reserved</div>
        </div>
    </footer>
</body>
</html>
