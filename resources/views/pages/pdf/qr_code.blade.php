<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr-Code</title>
</head>
<body>
    <center>
        <h3>{{ $item->nama_koleksi }} - {{ $item->kategori->nama }}</h3>
        {!! QrCode::size(150)->generate($item->kode_unik); !!}
    </center>
</body>
<script>
    window.print()
</script>
</html>
