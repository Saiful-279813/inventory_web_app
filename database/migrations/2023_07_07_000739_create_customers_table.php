<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('phone')->unique();
            $table->string('trade_name_en');
            $table->string('trade_name_bn');
            $table->float('due_amount',11,2)->default(0);
            $table->mediumText('address')->nullable();
            $table->unsignedBigInteger('customer_type_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazila_id');
            $table->string('photo_path')->nullable();
            $table->enum('status',['active','inactive','delete'])->default('active');
            $table->unsignedBigInteger('create_by_id');
            $table->unsignedBigInteger('update_by_id')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
