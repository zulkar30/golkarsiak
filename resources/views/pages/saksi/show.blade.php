<table class="table table-bordered">
    <tr>
        <th>Entri</th>
        <td>{{ isset($saksi->user->name) ? $saksi->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($saksi->nama) ? $saksi->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ isset($saksi->nik) ? $saksi->nik : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if ($saksi->jenis_kelamin == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($saksi->jenis_kelamin == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Whatsapp</th>
        <td class="text-success">{{ isset($saksi->no_hp) ? $saksi->no_hp : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Umur</th>
        <td>{{ isset($saksi->umur) ? $saksi->umur . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kecamatan</th>
        <td>{{ isset($saksi->kecamatan->nama_kecamatan) ? $saksi->kecamatan->nama_kecamatan : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Desa</th>
        <td>{{ isset($saksi->desa->nama_desa) ? $saksi->desa->nama_desa : 'N/A' }}</td>
    </tr>
    <tr>
        <th>TPS</th>
        <td>{{ isset($saksi->tps->nama_tps) ? $saksi->tps->nama_tps : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($saksi->status == 'active')
                <span class="badge badge-success">{{ 'AKTIF' }}</span>
            @elseif($saksi->status == 'passive')
                <span class="badge badge-danger">{{ 'PASIF' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Caleg Pilihan</th>
        <td>{{ isset($saksi->caleg->nama_caleg) ? $saksi->caleg->nama_caleg : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Paket Pilihan</th>
        <td>
            @foreach ($saksi->paket as $id => $paket)
            <span class="badge bg-yellow text-dark mr-1 mb-1">{{ isset($paket->nama_paket) ? $paket->nama_paket : 'N/A' }}</span>
        @endforeach
        </td>
    </tr>
</table>
