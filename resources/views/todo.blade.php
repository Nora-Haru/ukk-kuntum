<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Tugas Belajar</title>
    
    {{-- <link rel="icon" type="image/x-icon" href="logo-icon.gif"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menambahkan Bootstrap Icons dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">To-Do List Tugas</h1>
        <form method="POST" action="{{ route('list') }}" class="border rouded bg-light p-2">
            @csrf
            <label class="form-label">Nama Tugas</label>
            <input type="text" name="tugas" class="form-control" placeholder="Masukkan nama tugas!" autocomplete="off"
                autofocus required>

            <label class="form-label">Prioritas</label>
            <select name="prioritas" class="form-control" required>
                <option value="">-- Pilih prioritas --</option>
                <option value="1">1. Tidak Penting</option>
                <option value="2">2. Penting</option>
                <option value="3">3. Sangat Penting</option>
            </select>

            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" required>

            <button type="submit" class="btn btn-primary w-100 mt-2" name="tambah">Tambah Tugas</button>
        </form>
        <hr>

        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Prioritas</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Tandai Sudah Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todo as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->tugas }}</td>
                        <td>{{ $row->prioritas }}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->status }}</td>
                        <td>
                            <button type="button" class="btn btn-success">
                                <i class="bi bi-check-circle"></i> Selesai</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit">
                                <i class="bi bi-pencil"></i> 
                            </button>

                            {{-- <form method="post" action="{{ route('hapus', $row->id) }}"> --}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            {{-- </form> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>


        </table>
        <!-- Modal -->
        <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Perbarui Tugas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="belajar" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Prioritas</button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Tidak Penting</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Penting</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Sangat Penting</a></li>
                                <li><hr class="dropdown-divider"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>