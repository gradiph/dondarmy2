<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tgl', 'tempat', 'target_labu', 'hasil_labu', 'path_laporan',
    ];

	public function detailKegiatan()
    {
        return $this->hasMany('App\DetailKegiatan');
    }
}
