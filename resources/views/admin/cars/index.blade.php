@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Mobil</h3>
                <a href="{{ route('admin.cars.create')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-plus"></i> Tambah </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar Mobil</th>
                        <th>Type Mobil</th>
                        <th>Harga Sewa</th>
                        <th>Jumlah Penumpang</th>
                        <th>Jumlah Pintu</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $car->nama_mobil }}</td>
                                <td>
                                  <a target="_blank" href="{{ Storage::url($car->image) }}">
                                      <img width="80" src="{{ Storage::url($car->image) }}" alt="">
                                  </a>
                                </td>
                                <td>
                                    <span class="badge badge-info">
                                        {{ $car->type->nama }}
                                    </span>
                                </td>
                                <td>Rp{{ number_format($car->price, 0,",",".") }}</td>
                                <td>{{ $car->penumpang }}</td>
                                <td>{{ $car->pintu }}</td>
                                <td>{{ $car->statusLabel() }}</td>
                                <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $car->id }}"
                                      action="{{ route('admin.cars.destroy', $car) }}"
                                      method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-sm btn-danger"
                                          onclick="confirmDelete('{{ $car->id }}')">
                                          <i class="fa fa-trash"></i>
                                      </button>
                                </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Kosong !</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
      function confirmDelete(carId) {
          Swal.fire({
              title: 'Apakah Kamu Yakin?',
              text: "Anda tidak akan dapat mengembalikan ini!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Submit the form
                  document.getElementById('delete-form-' + carId).submit();
              }
          })
      }
  </script>
@endsection

@push('style-alt')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt') 
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
    $("#data-table").DataTable();
    </script>
@endpush