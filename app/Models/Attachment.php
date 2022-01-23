<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = [
    ];

    public function contentbox() {
        return $this->belongsTo('App\Models\ContentBox', 'contentbox_id' );
    }
}
