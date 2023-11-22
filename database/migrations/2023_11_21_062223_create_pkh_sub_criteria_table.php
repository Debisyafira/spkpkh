<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkhSubCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkh_sub_criteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_pkh_id')->constrained('calon_pkhs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained('criterias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subkriteria_id')->constrained('subkriteria')->onUpdate('cascade')->onDelete('cascade');
            $table->string('value');
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
        Schema::dropIfExists('pkh_sub_criteria');
    }
}
