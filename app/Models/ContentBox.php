<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
    public function attachments() {
        return $this->hasMany(Attachment::class, 'contentbox_id');
    }

}
