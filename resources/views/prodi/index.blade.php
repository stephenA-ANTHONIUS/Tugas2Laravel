<h1>Progran Studi</h1>

<table>
    <tr>
        <th>Nama</th>
        <th>Singkatan</th>
        <th>kaprodi</th>
        <th>Sekretaris</th>
        <th>Fakultas</th>
    </tr>
@foreach ($prodi as $item)
<tr>
    <td>{{ $item->nama }}</td>
    <td>{{ $item->singkatan }}</td>
    <td>{{ $item->kaprodi }}</td>
    <td>{{ $item->sekretaris }}</td>
    <td>{{ $item->fakultas->nama }}</td>
</tr>
    
@endforeach
</table>