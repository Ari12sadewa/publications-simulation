<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('publikasis', function (Blueprint $table) {
            $table->string('tautan')->nullable(); // kolom baru, boleh null
        });
    }

    public function down()
    {
        Schema::table('publikasis', function (Blueprint $table) {
            $table->dropColumn('tautan');
        });
    }
};