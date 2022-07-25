<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    public $fillable = ['nama','foto','id_siswa'];
    public $timestamps = true;

    public function siswa(){
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
    public function image(){
        if($this->foto && file_exists(public_path('images/wali/' .$this->foto))){
            return asset('images/wali/' .$this->foto);
        }
        else {
            return asset('images/no_images.jpg');
        }
    }
    public function deleteimage(){
        if($this->foto && file_exists(public_path('images/wali/' .$this->foto))){
            return unlink(public_path('images/wali/' .$this->foto));
        }
    }
}
