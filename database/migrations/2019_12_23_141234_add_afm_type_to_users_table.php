<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAfmTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ep_afm', 9)->nullable();
            $table->tinyInteger('type')->default(0);

            $table->foreign('ep_afm')->references('ΑΦΜ')->on('etairia_paragwgis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['ep_afm', 'type']);
            $table->dropForeign('ep_afm');
        });
    }
}
