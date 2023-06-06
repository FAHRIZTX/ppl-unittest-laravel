@extends('header.navbar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10%;">
    <div class="card">
        <div class="card-header">
            Tambah Data
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('mahasiswa.create') }}" method="post">
                @csrf
                <div class="row">
                    <label for="kt" class=" control-label">Nama <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">NIM <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="nim" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Jenis Kelamin <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Pilih</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Alamat <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="alamat" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Fakultas <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <select class="single-select form-control" id="fakultas" name="fakultas_id" style="width:100%;height: 100%;">
                        <option selected>Pilih</option>
                        
                        @foreach($fakultas as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Program Studi <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <select class="single-select form-control" id="prodi" name="program_studi_id" style="width:100%;height: 100%;">
                    </select>
                </div>
                <div class="row mt-3 ">
                    <button type="submit" class="btn btn-primary w-25">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#fakultas', function() {
            var id = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{route("prodi.show") }}',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    $("#prodi").empty();
                    $("#prodi").append('<option>---Pilih prodi---</option>');
                    for (var i = 0; i < data.length; i++) {
                        $("#prodi").append('<option value="' + data[i].id + '">' + data[i].nama + '</option>');
                    };
                },
            })
        })
    });
</script>

@endsection