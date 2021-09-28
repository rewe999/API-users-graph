<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    public $timestamps = true;

    protected $fillable = [
        "street",
        "suite",
        "city",
        "zipcode",
        "geoId",
        "created_at",
        "updated_at",
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function geo():HasOne
    {
        return $this->hasOne(Geo::class);
    }

    public function createAddress($address){
        $addres = new Address();
        $addres->street = $address["street"];
        $addres->suite = $address["suite"];
        $addres->city = $address["city"];
        $addres->zipcode = $address["zipcode"];
        $geo = (new Geo)->createGeos($address["geo"]);
        $addres->geoId = $geo;
        $addres->save();

        return $addres->id;
    }
}
