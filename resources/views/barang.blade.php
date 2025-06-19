<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
@if($barang)
promo untuk {{$barang}}<br>

@if($kode)
dengan kode promo :{{$kode}}
  @endif
  @else
  semua promo barang


@endif

</body>
</html>