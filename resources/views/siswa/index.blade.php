<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1><b>DAFTAR SISWA</b></h1>
    <hr>

    <table>
        <tr>
            <td>No</td>
            <td>Nama Lengkap</td>
            <td>Kelas</td>
            <td>Aksi</td>
        </tr>
        @php
            $no = 1;
        @endphp
        
        @foreach ($siswa as $data)
            <tr>
                <form action="siswa/{{ $data['id'] }}" method="post">
                <td>{{ $no++ }}</td>
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['kelas'] }}</td>
                <td><a href="/siswa/{{ $data['id'] }}">show</a></td>
                <td><a href="/siswa/{{ $data['id'] }}/edit">edit</a>
               
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('SERIUS LU????')">
                        Delete
                    </button>
                </td>
                </form>
            </tr>
        @endforeach
    </table>
</body>

</html>
