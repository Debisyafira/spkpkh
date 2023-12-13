<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldUserIdToCalonPkhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calon_pkhs', function (Blueprint $table) {
            $table->foreignId('id_user')->after('alamat')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calon_pkhs', function (Blueprint $table) {
            $table->dropForeign('calon_pkhs_id_user_foreign');
        });
    }
}
