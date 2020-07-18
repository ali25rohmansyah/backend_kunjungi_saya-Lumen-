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
            $table->string('nik')->primary();
            $table->string('foto')->nullable();
            $table->string('nama')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('status_no_hp', ['1' , '2'])->nullable();
            $table->enum('status_kepegawaian', ['aktif', 'pensiun'])->nullable();
            $table->integer('gaji')->nullable();
            $table->enum('pembayaran_gaji', ['bni', 'mandiri', 'bri'])->nullable();
            $table->string('sales_respon')->nullable();
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
