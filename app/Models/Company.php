<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    public $timestamps = true;

    protected $fillable = [
        "name",
        "catchPhrase",
        "bs",
        "created_at",
        "updated_at",
    ];

    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function createCompany($companies){
        $company = new Company();
        $company->name = $companies["name"];
        $company->catchPhrase = $companies["catchPhrase"];
        $company->bs = $companies["bs"];
        $company->save();

        return $company->id;
    }
}
