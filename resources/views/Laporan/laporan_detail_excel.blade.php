<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card-header bg-transparent border-0">
        <h2 class="text-white mb-0 text-center">Data Pengeluaran</h2>
    </div>
    <table id="table-pemasukan" class="table align-items-center table-light table-flush">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col" class="sort" data-sort="name">#</th>
                <th scope="col" class="sort" data-sort="status">Keterangan </th>
                <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                <th scope="col" class="sort" data-sort="completion">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaran as $e => $dt)
                <tr class="text-center">
                    <td>{{ $e + 1 }}</td>
                    <td>{{ $dt->keterangan }}</td>
                    <td>{{ date('Y-m-d', strtotime($dt->tanggal)) }}</td>
                    <td>Rp.{{ number_format($dt->nominal) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right"><strong>Total Harga : </strong> </td>
                <td align="center"> <strong>Rp.{{ number_format($total_pengeluaran) }}</strong> </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
