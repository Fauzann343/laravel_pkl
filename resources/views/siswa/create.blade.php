<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<h3><b><i>Tambah siswa</i></b></h3>
<hr>
<form action="/siswa" method="POST">
@csrf
<select name="kelas" id="">
<option value="XI RPL 1">XI RPL 1</option>
<option value="XI RPL 2">XI RPL 2</option>
<option value="XI RPL 3">XI RPL 3</option>
</select>
<br>

<input type="text" name="nama" id="" placeholder="Masukan nama">
<br>

<button type="submit">simpan</button>
<button type="submit">reset</button>
</form>
<a href="/siswa">baack</a>
</body>
</html>