<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('seller_id')->reference('id')->on('users')->onDelete('restrict');
            $table->foreignId('admin_id')->reference('id')->on('users')->onDelete('restrict')->nullable(true);
            $table->foreignId('buyyer_id')->reference('id')->on('users')->onDelete('restrict')->nullable(true);

            $table->string('type_game');
            $table->integer('price');
            $table->string('akun_info');
            $table->string('img', 300)->nullable(true);


            $table->dateTime('waktu_pesan')->nullable(true);
            $table->boolean('sended')->default(0);
            $table->string('akun')->nullable(true);
            $table->boolean('verified')->default(0);
            $table->boolean('payyed')->default(0);
            $table->string('buyyer_msg')->nullable(true);
            $table->boolean('send_buyyer')->default(0);
            $table->boolean('send_seller')->default(0);
            $table->string('admin_msg')->nullable(true);
            $table->dateTime('waktu_selesai')->nullable(true);

            $table->timestamps();
        });

        // once the table is created use a raw query to ALTER it and add the MEDIUMBLOB
        // DB::statement("ALTER TABLE transactions ADD img MEDIUMBLOB null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('transactions');
    }
};
