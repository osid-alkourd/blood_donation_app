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
        Schema::create('donation_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                  ->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('blood_type' , ['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-']);
            $table->string('location');
            $table->double('weight');
            $table->integer('age');
            $table->string('phone_number');
            $table->string('id_number')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('donation_offers');
    }
};
