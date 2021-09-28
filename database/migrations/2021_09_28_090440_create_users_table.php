<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("username");
            $table->string("email")->unique();
            $table->string("phone");
            $table->string("website");
            $table->unsignedBigInteger("companyId");
            $table->foreign("companyId")->references("id")->on("companies")
                ->onDelete("cascade");
            $table->unsignedBigInteger("addressId");
            $table->foreign("addressId")->references("id")->on("addresses")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
