<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('sub_categories', function(Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['semester_id']);
        });

        Schema::rename('sub_categories','missions');
        */
        Schema::table('missions', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');  
            $table->foreign('department_id')->references('id')->on('departments');  
            $table->foreign('semester_id')->references('id')->on('semesters'); 
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
