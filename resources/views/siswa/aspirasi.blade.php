<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aspirasi Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 24px; color: #111827; }
        .wrap { max-width: 900px; margin: auto; }
        .card { background: #fff; border-radius: 10px; padding: 20px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        h1, h2 { margin-top: 0; }
        label { display: block; margin: 10px 0 4px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; }
        button { margin-top: 14px; padding: 9px 18px; background: #d97706; color: #fff; border: 0; border-radius: 6px; cursor: pointer; }
        .counter { display: block; margin-top: 4px; font-size: 12px; color: #6b7280; text-align: right; }
        .counter.penuh { color: #dc2626; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border-bottom: 1px solid #e5e7eb; text-align: left; font-size: 14px; }
        .badge { padding: 2px 8px; border-radius: 99px; font-size: 12px; color: #fff; }
        .Menunggu { background: #d97706; }
        .Proses { background: #2563eb; }
        .Selesai { background: #16a34a; }
        .ok { background: #dcfce7; padding: 10px; border-radius: 6px; margin-bottom: 12px; }
        .err { background: #fee2e2; padding: 10px; border-radius: 6px; margin-bottom: 12px; }
        progress { width: 80px; }
    </style>
</head>
<body>
<div class="wrap">

    <div class="card">
        <h1>Form Aspirasi Siswa</h1>

        @if (session('sukses'))
            <div class="ok">{{ session('sukses') }}</div>
        @endif

        @if ($errors->any())
            <div class="err">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('siswa.store') }}">
            @csrf
            <label for="nis">NIS</label>
            <input type="number" id="nis" name="nis" value="{{ old('nis', $nis) }}" required>

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" maxlength="10" placeholder="contoh: XII RPL 1" value="{{ old('kelas') }}" required>

            <label for="id_kategori">Kategori</label>
            <select id="id_kategori" name="id_kategori" required>
                <option value="">-- Pilih kategori --</option>
                @foreach ($kategoris as $k)
                    <option value="{{ $k->id_kategori }}" @selected(old('id_kategori') == $k->id_kategori)>{{ $k->ket_kategori }}</option>
                @endforeach
            </select>

            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" maxlength="50" value="{{ old('lokasi') }}" required>

            <label for="ket">Keterangan</label>
            <input type="text" id="ket" name="ket" maxlength="50" value="{{ old('ket') }}" required>
            <span id="ket-count" class="counter">0/50</span>

            <button type="submit">Kirim Aspirasi</button>
        </form>
    </div>

    <div class="card">
        <h2>Cek Status dan Riwayat Aspirasi</h2>

        <form method="GET" action="{{ route('siswa.index') }}">
            <label for="cek_nis">NIS</label>
            <input type="number" id="cek_nis" name="nis" value="{{ $nis }}" required>
            <button type="submit">Lihat Riwayat</button>
        </form>

        @if ($nis && ! $siswa)
            <p style="margin-top:16px">NIS tidak ditemukan.</p>
        @endif

        @if ($siswa)
            <p style="margin-top:16px">NIS <strong>{{ $siswa->nis }}</strong> - Kelas <strong>{{ $siswa->kelas }}</strong></p>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Progres</th>
                            <th>Umpan Balik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $item)
                            @php
                                $status = $item->aspirasi?->status ?? 'Menunggu';
                                $langkah = match ($status) {
                                    'Proses' => 2,
                                    'Selesai' => 3,
                                    default => 1,
                                };
                            @endphp
                            <tr>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>{{ $item->kategori?->ket_kategori }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->ket }}</td>
                                <td><span class="badge {{ $status }}">{{ $status }}</span></td>
                                <td><progress max="3" value="{{ $langkah }}"></progress></td>
                                <td>{{ $item->aspirasi?->feedback ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7">Belum ada aspirasi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>

<script>
    const ket = document.getElementById('ket');
    const ketCount = document.getElementById('ket-count');

    function updateKetCount() {
        ketCount.textContent = ket.value.length + '/' + ket.maxLength;
        ketCount.classList.toggle('penuh', ket.value.length >= ket.maxLength);
    }

    ket.addEventListener('input', updateKetCount);
    updateKetCount();
</script>
</body>
</html>