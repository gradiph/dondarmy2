<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_register', 'nama', 'gol_darah_id', 'kelamin', 'tempat_lahir', 'tgl_lahir', 'telp', 'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kode_pos', 'pekerjaan_id', 'penghargaan', 'total_donor', 'donor_terakhir',
    ];

	public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan');
    }
	public function golDarah()
    {
        return $this->belongsTo('App\GolDarah');
    }
	public function detailKegiatan()
    {
        return $this->hasMany('Kawani\Stok');
    }
}
