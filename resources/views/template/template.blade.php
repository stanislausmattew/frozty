<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @yield('link')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    @yield('style')
    <style>
        footer{
            background-color:#23213D;
            position: absolute;
            bottom: 0;
            width: 100%;
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
        }

        .logo{
            margin-left: 20px;
        }
        .logo img{
            width: 200px;
            height: 100%;
        }
    </style>
</head>
<body style="background-color: #8A80FF">
    <div class="square"></div>
    <header>
        <a href="/"><div class="logo"><img src="Image/logo.png"></div></a>
   </header>

    @yield('content')

    <footer>
        <div class="footer-content">
            <h3>Hubungi Kami</h3>
            <a href="instagram" style="margin-right:30px; margin-left:10px;"><img src="Image/instagram.png" alt="" style="width: 20px;height:20px; margin-right:9px;">Instagram</a>
            <a href="whatsapp"><img src="Image/whatsapp.png" alt="" style="width: 20px;height:20px; margin-right:9px;">Whatsapp</a>
            <div class="copyright">2021 LUX. All Right Reserved</div>
        </div>
    </footer>
</body>
</html>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6284cce2b0d10b6f3e72ce98/1g3bc0ljl';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
    <!--End of Tawk.to Script-->
