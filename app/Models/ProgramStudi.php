<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $table = 'program_studi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'fakultas_model_id'
    ];

    public function Fakultas() : BelongsTo
    {
        return $this->belongsTo(Fakultas::class,'fakultas_model_id','id');
    }

    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
