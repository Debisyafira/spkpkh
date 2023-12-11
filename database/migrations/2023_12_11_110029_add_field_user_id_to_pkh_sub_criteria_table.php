<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldUserIdToPkhSubCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pkh_sub_criteria', function (Blueprint $table) {
            $table->foreignId('id_user')->after('value')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pkh_sub_criteria', function (Blueprint $table) {
            $table->dropForeign('pkh_sub_criteria_id_user_foreign');
        });
    }
}
