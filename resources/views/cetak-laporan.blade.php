<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static (
            position: relative;
            border: 2px solid #543535;
        )
    </style>

    <title> DATA LAPORAN </title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>DATA LAPORAN PEMADAM KEBAKARAN</b></p>
        <table class="static" align="center" rules="all" border="2px" style="width: 95%;">
        <thead>                  
                    <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th style="width: 40px">Status</th>
                    </tr>
                </thead>
                <tbody>
                @php $no = 0; @endphp
                @foreach($laporan as $data)
                 @php $no++; @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>{{ $data->kategori}}</td>
                        <td>{{ $data->deskripsi}}</td>
                        <td>{{  date('d F Y', strtotime ($data->created_at))}}</td>
                        <td>{{ $data->status}}</td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();    
    </script>
</body>
</html>