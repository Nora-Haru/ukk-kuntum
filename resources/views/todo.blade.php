<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Tugas Belajar</title>
    {{-- <link rel="icon" type="image/x-icon" href="icon.png"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 
    <div class="container mt-3">
        <h1 class="text-center">To-Do List Tugas</h1>
        <form method="POST" action="{{ route('list') }}" class="border rouded bg-light p-2">
            @csrf
            <label class="form-label">Nama Tugas</label>
            <input type="text" name="tugas" class="form-control" placeholder="Masukkan nama tugas!" autocomplete="off" autofocus required>

            <label class="form-label">Prioritas</label>
            <select name="prioritas" class="form-control" required>
                <option value="">-- Pilih prioritas --</option>
                <option value="1">Tidak Penting</option>
                <option value="2">Penting</option>
                <option value="3">Sangat Penting</option>
            </select>

            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" required>

            <button type="submit" class="btn btn-primary w-100 mt-2" name="tambah">Tambah Tugas</button>
        </form>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Prioritas</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach (@data as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->tugas }}</td>
                    <td>{{ $row->prioritas }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>0{{ $row->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>