<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UbahTipeIconSvgDiLayanansTable extends Migration
{
    public function up()
    {
        Schema::table('layanans', function (Blueprint $table) {
            $table->text('icon_svg')->change();
        });
    }

    public function down()
    {
        Schema::table('layanans', function (Blueprint $table) {
            $table->string('icon_svg', 255)->change(); // revert back if needed
        });
    }
}
