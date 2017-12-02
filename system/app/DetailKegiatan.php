<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKegiatan extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'donor_id', 'kegiatan_id', 'antrian', 'panggil', 'terima',
    ];

	public function kegiatan()
    {
        return $this->belongsTo('App\Kegiatan');
    }
	public function donor()
    {
        return $this->belongsTo('App\Donor');
    }
}
