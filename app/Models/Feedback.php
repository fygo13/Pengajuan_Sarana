<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'aspirasi_id',
        'isi_feedback',
    ];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class);
    }
}
