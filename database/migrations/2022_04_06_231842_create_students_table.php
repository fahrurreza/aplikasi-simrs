<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nisn');
            $table->string('address');
            $table->string('kelamin');
            $table->string('t_lahir');
            $table->date('tgl_lahir');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('student_studies', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('study_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
