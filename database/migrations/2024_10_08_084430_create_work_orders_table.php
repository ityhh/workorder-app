<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('work_orders', function (Blueprint $table) {
        $table->id();
        $table->string('wo_number')->unique();
        $table->date('date');
        $table->string('department');
        $table->string('name');
        $table->text('work_order');
        $table->string('to_department');
        $table->enum('status', ['Pending', 'Done'])->default('Pending');
        $table->date('status_date')->nullable();
        $table->text('remarks')->nullable();
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
        Schema::dropIfExists('work_orders');
    }
}
