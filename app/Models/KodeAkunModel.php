<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeAkunModel extends Model
{
    use HasFactory;
    protected $table = "kode_akun";
    protected $fillable = ['id','kode','uraian','jenis'];
    public static $rules = [
        'kode' => 'required|unique',
        'uraian' => 'required',
        'jenis' => 'required|in:DEBIT,KREDIT'
    ];

}
