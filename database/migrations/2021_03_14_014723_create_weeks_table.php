<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable(); // Can be null if the week is a holiday week
            $table->date('start_date'); // This field makes it easier to calculate the current week number
            $table->boolean('is_holiday_week'); // Defined so it is easier to read and spot holiday weeks

            $table->foreignId('semester_id')->constrained()->onDelete('cascade'); // "integer" Foreign key One liner
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weeks');
    }
}
