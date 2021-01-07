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
            $table->string('name');
            $table->string('email')->unique();
            // $table->integer('usercategory_id')->unsigned();
            // $table->integer('usertype_id')->unsigned();
            // $table->integer('depertment_id')->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();

            // $table->foreign('usercategory_id')->references('id')->on('usercategorys')
            // ->onDelete('cascade');
       
            // $table->foreign('usertype_id')->references('id')->on('usertypes')
            // ->onDelete('cascade');
            // $table->foreign('depertment_id')->references('id')->on('depertments')
            // ->onDelete('cascade');
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
