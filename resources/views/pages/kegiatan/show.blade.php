<table class="table table-bordered">
    <tr>
        <th>Pengaju Kegiatan</th>
        <td>{{ isset($kegiatan->user->name) ? $kegiatan->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Caleg Pengaju Kegiatan</th>
        <td>{{ isset($kegiatan->user->caleg->nama_caleg) ? $kegiatan->user->caleg->nama_caleg : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kecamatan Kegiatan</th>
        <td>{{ isset($kegiatan->user->kecamatan->nama_kecamatan) ? $kegiatan->user->kecamatan->nama_kecamatan : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Desa Kegiatan</th>
        <td>{{ isset($kegiatan->user->desa->nama_desa) ? $kegiatan->user->desa->nama_desa : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama Kegiatan</th>
        <td>{{ isset($kegiatan->nama_kegiatan) ? $kegiatan->nama_kegiatan : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Kegiatan</th>
        <td>{{ isset($kegiatan->tanggal) ? $kegiatan->tanggal : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Waktu Kegiatan</th>
        <td>{{ isset($kegiatan->waktu) ? $kegiatan->waktu : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Lokasi Kegiatan</th>
        <td>{{ isset($kegiatan->lokasi) ? $kegiatan->lokasi : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Keterangan Kegiatan</th>
        <td>{{ isset($kegiatan->keterangan1) ? $kegiatan->keterangan1 : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Keterangan Kegiatan Ditunda</th>
        <td>{{ isset($kegiatan->keterangan2) ? $kegiatan->keterangan2 : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($kegiatan->status == 'setuju')
                <span class="badge badge-success">{{ 'Disetujui' }}</span>
            @elseif($kegiatan->status == 'tunggu')
                <span class="badge badge-warning">{{ 'Menunggu' }}</span>
            @elseif($kegiatan->status == 'tunda')
                <span class="badge badge-danger">{{ 'Ditunda' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
</table>
