<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Geo extends Model
{
    public $timestamps = true;

    protected $fillable = [
        "lat",
        "lng",
        "created_at",
        "updated_at",
    ];

    public function address():BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function createGeos($geos){
        $geo = new Geo();
        $geo->lat = $geos["lat"];
        $geo->lng = $geos["lng"];
        $geo->save();

        return $geo->id;
    }
}
