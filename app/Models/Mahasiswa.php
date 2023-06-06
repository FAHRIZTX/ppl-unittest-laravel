<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'nim',
        'jenis_kelamin',
        'alamat',
        'fakultas_id',
        'program_studi_id'
    ];

    public function Fakultas() 
    {
        return $this->belongsTo(Fakultas::class,'fakultas_id','id');
    }

    public function ProgramStudi()
    {
        return $this->belongsTo(ProgramStudi::class,'program_studi_id','id');
    }

}
