<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama'
    ];

    public function ProgramStudi() : HasMany
    {
        return $this->hasMany(ProgramStudi::class, 'fakultas_model_id', 'id');
    }

    public function Mahasiswa() : HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
