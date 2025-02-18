<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Tugas Belajar</title>
    
    <link rel="icon" type="image/x-icon" href="{{asset('image/logo.gif')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menambahkan Bootstrap Icons dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">To-Do List Tugas</h1>
        <form method="POST" action="{{ route('store') }}" class="border rouded bg-light p-2">
            @csrf
            <label class="form-label">Nama Tugas</label>
            <input type="text" name="tugas" class="form-control" placeholder="Masukkan nama tugas!" autocomplete="off"
                autofocus required>

            <label class="form-label">Prioritas</label>
            <select name="prioritas" class="form-control" required>
                <option value="">-- Pilih prioritas --</option>
                <option value="Penting">Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
                <option value="Sangat Penting">Sangat Penting</option>
            </select>

            <label class="form-label">Tanggal</label>
            <input type="date" name="tgl_dibuat" class="form-control" value="<?php echo date('Y-m-d') ?>" required>

            <button type="submit" class="btn btn-primary w-100 mt-2">Tambah Tugas</button>
        </form>
        <hr>

        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Prioritas</th>
                    <th>Tanggal dibuat</th>
                    <th>Tanggal selesai</th>
                    <th>Status</th>
                    <th>Tandai Sudah Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task as $row)
                    <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td style="{{ $row->status === 'Selesai' ? 'opacity: 0.5; ' : '' }} ">{{ $row->tugas }}</td>
                            <td style="{{ $row->status === 'Selesai' ? 'opacity: 0.5; ' : '' }} ">{{ $row->prioritas }}</td>
                            <td style="{{ $row->status === 'Selesai' ? 'opacity: 0.5; ' : '' }} ">{{ $row->tgl_dibuat }}</td>
                            <td style="{{ $row->status === 'Selesai' ? 'opacity: 0.5; ' : '' }} ">{{ $row->tgl_selesai }}</td>
                            <td style="{{ $row->status === 'Selesai' ? 'opacity: 0.5; ' : '' }} ">{{ $row->status }}</td>
                        <td>
                            <form method="POST" action="{{route('toggle',$row->id)}}">
                                @csrf
                                <button type="submit" class="btn {{$row->status === 'Selesai' ? 'btn-danger' : 'btn-success' }}">
                                    <i class="bi {{$row->status === 'Belum Selesai' ? 'bi-check-circle-fill' : 'bi-hourglass-split'}}"></i>
                                    {{ $row->status === 'Belum Selesai' ? 'Selesai' : 'Batal' }}
                                </button>
                                
                                
                            </form>
                        </td>
                        <td class="d-flex gap-1 justify-content-center">
                            <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#edit{{$row->id}}" @if($row->status == 'Selesai') disabled @endif >
                                <i class="bi bi-pencil"></i> 
                            </button>

                            {{-- <form method="post" action="{{ route('hapus', $row->id) }}"> --}}
                            <form method="POST" action="{{route('tugas.destroy',$row->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('tenan ra?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            {{-- </form> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>


        </table>
        @foreach ($task as $tus )
        <!-- Modal -->
        <div class="modal fade" id="edit{{$tus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Perbarui Tugas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('update',$tus->id)}}" method="POST" >
                            @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{$tus->tugas}}" name="tugas" aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" name="prioritas" aria-label="Default select example">
                                <option selected> {{$tus->prioritas}} </option>
                                <option value="Penting">penting</option>
                                <option value="Tidak Penting">tidak penting</option>
                                <option value="Sangat Penting">sangat penting</option>
                              </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                    </div>
                   
                  
              </div>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>