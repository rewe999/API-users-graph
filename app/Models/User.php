<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;

class User extends Model
{
    use Notifiable;

    public $timestamps = true;

    protected $fillable = [
        "name",
        "username",
        "email",
        "phone",
        "website",
        "companyId",
        "addressId",
        "created_at",
        "updated_at",
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function address():BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function createUser(){
        $users = Http::get("https://jsonplaceholder.typicode.com/users")->json();

        foreach ($users as $index=>$user) {
            $person = new User();
            $person->name = $user["name"];
            $person->username = $user["username"];
            $person->email = $user["email"];

            $address = (new Address)->createAddress($user["address"]);
            $company = (new Company)->createCompany($user["company"]);

            $person->phone = $user["phone"];
            $person->website = $user["website"];
            $person->companyId = $company;
            $person->addressId = $address;
            $person->created_at =  Carbon::now();
            $person->updated_at =  Carbon::now();
            $person->save();
        }

    }
}
