<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama',
        'foto',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class);
    }

    public function matkul_mahasiswa()
    {
        return $this->hasMany(MatkulMahasiswaModel::class);
    }
}
