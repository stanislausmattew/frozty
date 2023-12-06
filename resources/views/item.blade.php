<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@extends("template.template-user")
<div class="coba">
    <form action="/Tambah/Promo" method="POST">
        @csrf
        <label for="nama">FkPro:</label>
        <input type="text" id="fkpro" name="fkpro" required>

        <label for="email">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="">Harga</label> 
        <input type="int" class="login_input" name="harga" required>

        <button type="submit">Kirim</button>
    </form>
</div>
@section("content")