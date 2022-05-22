<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employeeId');
            $table->string('employeeName');
            $table->string('employeeFurigana');
            $table->string('employeeGender');
            $table->string('employeeBirth');
            $table->integer('employeeAge');
            $table->string('employeePostNo');
            $table->string('employeeAddress');
            $table->string('employeeTel');
            $table->string('employeeMail');
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
        Schema::dropIfExists('employees');
    }
}
