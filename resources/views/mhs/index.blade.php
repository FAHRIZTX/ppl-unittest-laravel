@extends('header.navbar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card " style="margin-top: 10%;">
    <div class="card">
        <div class="card-body">
            <div>
                <form action="/index-mhs/cari" method="get">
                    <div class="container">
                        <h4 class="card-title">Data Mahasiswa</h4>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-md-4">
                                <input class="form-control form-control-sm mt-2 " type="text" name="cari" placeholder="Cari mahasiswa .." aria-label=".form-control-sm example">
                            </div>
                            <div class="col-6 col-md-4">
                                <button type="submit" class="btn btn-primary btn-sm mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                        <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z" />
                                        <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z" />
                                    </svg></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('mahasiswa.pdf')}}" class="btn btn-primary" target="_blank">CETAK PDF</a>
                <a href="{{route('mahasiswa.add')}}" class="btn btn-outline-success ms-2"><i class="mdi mdi-account-plus"></i> Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nama </th>
                            <th> Nim </th>
                            <th> Jenis Kelamin </th>
                            <th> Alamat </th>
                            <th> Fakultas </th>
                            <th> Prodi </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $mhs)
                        <tr>
                            <td>
                                @php $no = 1; @endphp
                                {{ $loop->index+1 }}
                            </td>
                            <td>
                                {{$mhs->nama}}
                            </td>
                            <td>
                                {{$mhs->nim}}
                            </td>
                            <td>
                                {{$mhs->jenis_kelamin}}
                            </td>
                            <td>
                                {{$mhs->alamat}}
                            </td>
                            <td>
                                {{$mhs->Fakultas->nama}}
                            </td>
                            <td>
                                {{$mhs->ProgramStudi->nama}}
                            </td>
                            <td>
                                <a href="{{route('mahasiswa.edit', ['id' => $mhs->id]) }}">Edit</a>

                                <a href="{{route('mahasiswa.delete', ['id' => $mhs->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                Halaman : {{ $mahasiswa->currentPage() }} <br />
                Jumlah Data : {{ $mahasiswa->total() }} <br />
                Data Per Halaman : {{ $mahasiswa->perPage() }} <br />

                {{-- Pagination --}}
                <div class="d-flex justify-content-start mt-4">
                    {!! $mahasiswa->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection