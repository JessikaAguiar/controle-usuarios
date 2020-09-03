<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   

        Schema::disableForeignKeyConstraints();
        Schema::create('user_perfil', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('perfil_id')->constrained('perfils');
            
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_perfil');
    }
}
