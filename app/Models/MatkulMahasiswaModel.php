<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulMahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'matkul_mahasiswa';

    protected $fillable = [
        'mahasiswa_id',
        'matkul_id',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function matkul()
    {
        return $this->belongsTo(MatkulModel::class);
    }
}
