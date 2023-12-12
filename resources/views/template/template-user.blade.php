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

        /* .square{
            z-index: 1;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #443F7B;
            clip-path: polygon(45% 0%,100% 0%,100% 100%,70% 100%);
        } */

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
            background-color:rgb(255,255,255);
            opacity:0.6;
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            z-index: 4;
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
        @import "compass/css3";

$unchecked-star: "\2606";
$unchecked-color: #888;
$checked-star: "\2605";
$checked-color: #e52;

.star-cb-group {
  /* remove inline-block whitespace */
  font-size: 0;
  * {
    font-size: 1rem;
  }
  /* flip the order so we can use the + and ~ combinators */
  unicode-bidi: bidi-override;
  direction: rtl;
  & > input {
    display: none;
    & + label {
      /* only enough room for the star */
      display: inline-block;
      overflow: hidden;
      text-indent: 9999px;
      width: 1em;
      white-space: nowrap;
      cursor: pointer;
      &:before {
        display: inline-block;
        text-indent: -9999px;
        content: $unchecked-star;
        color: $unchecked-color;
      }
    }
    &:checked ~ label:before,
    & + label:hover ~ label:before,
    & + label:hover:before {
      content: $checked-star;
      color: #e52;
      text-shadow: 0 0 1px #333;
    }
  }

  /* the hidden clearer */
  & > .star-cb-clear + label {
    text-indent: -9999px;
    width: 0.5em;
    margin-left: -0.5em;
  }
  & > .star-cb-clear + label:before {
    width: 0.5em;
  }

  &:hover > input + label:before {
    content: $unchecked-star;
    color: $unchecked-color;
    text-shadow: none;
  }
  &:hover > input + label:hover ~ label:before,
  &:hover > input + label:hover:before {
    content: $checked-star;
    color: $checked-color;
    text-shadow: 0 0 1px #333;
  }
}

// extra styles
:root {
  font-size: 2em;
  font-family: Helvetica, arial, sans-serif;
}

body {
  background: #333;
  color: $unchecked-color;
}
fieldset {
  border: 0;
  background: #222;
  width: 5em;
  border-radius: 1px;
  padding: 1em 1.5em 0.9em;
  margin: 1em auto;
}
#log {
  margin: 1em auto;
  width: 5em;
  text-align: center;
  background: transparent;
}
h1 {
  text-align: center;
}
    </style>
</head>
<body style="background-color: #8A80FF">
    <header style="z-index: 5;">
        <a href="/"><div class="logo"><img src="{{asset('Image/logo.png')}}"></div></a>
        @if (session()->has("login"))
            <a href="{{url('/logout')}}" class="logout" >LOGOUT</a>
            <a href="{{url('/user/History')}}" class="logout" >HISTORY</a>
        @else
            <a href="{{url('/login')}}" class="logout" >LOGIN</a>
           
        @endif
    </header>

    @yield('content')

    <footer style="z-index: 5;">
        <div class="footer-content">
            <h3>Hubungi Kami</h3>
            <a href="instagram" style="margin-right:30px; margin-left:10px;"><img src="{{asset('Image/instagram.png')}}" alt="" style="width: 20px;height:20px; margin-right:9px;">Instagram</a>
            <a href="whatsapp"><img src="{{asset('Image/whatsapp.png')}}" alt="" style="width: 20px;height:20px; margin-right:9px;">Whatsapp</a>
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
