<!DOCTYPE html>
<html>

<head>
    <title>Laporan Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5><b>Laporan Mahasiswa Universitas 17 Agustus 1945</b></h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th> No </th>
                <th> Nama </th>
                <th> Nim </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> Fakultas </th>
                <th> Prodi </th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $mhs)
            <tr>
                <td>
                    @php $no = 1; @endphp
                    {{ $loop->index+1 }}
                </td>
                <td>
                    {{$mhs->nama}}
                </td>
                <td>
                    {{$mhs->nim}}
                </td>
                <td>
                    {{$mhs->jenis_kelamin}}
                </td>
                <td>
                    {{$mhs->alamat}}
                </td>
                <td>
                    {{$mhs->Fakultas->nama}}
                </td>
                <td>
                    {{$mhs->ProgramStudi->nama}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>