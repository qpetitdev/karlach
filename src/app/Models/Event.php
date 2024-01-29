<?php

namespace App\Models;

use Database\Factories\EventDaoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        "start" => 'datetime:Y-m-d H:i:s',
        "end" => 'datetime:Y-m-d H:i:s',
    ];

    public static function newFactory()
    {
        return EventDaoFactory::new();
    }

    public function author(){
        return $this->belongsTo(User::class,"author_id","id");
    }
}
