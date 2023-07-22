<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use League\CommonMark\Reference\Reference;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job');
            $table->string('bio');
            $table->string('image');
            $table->string('salary_type');
            $table->string('salary_amount');
            $table->timestamp('birth_date');
            $table->timestamp('hiring_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('staff');
    }
};
