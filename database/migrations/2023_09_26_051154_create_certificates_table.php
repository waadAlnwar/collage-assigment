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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('refreance_number')->nullable();
            $table->string('student_id')->nullable();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('fourth_name');
            $table->string('gpa')->nullable();
            $table->string('gradute_year')->nullable();
            $table->text('attachment');
            $table->boolean('arabic')->nullable();
            $table->boolean('english')->nullable();
            $table->boolean('details_arabic')->nullable();
            $table->boolean('details_english')->nullable();
            $table->foreignId('facutly_id')->nullable()->constrained("facutlies")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('major_id')->nullable()->constrained("majors")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('gender_id')->nullable()->constrained("genders")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('status_id')->nullable()->constrained("statuses")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('degree_id')->nullable()->constrained("degrees")->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('certificates');
    }
};
