<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();;
            $table->foreignId('id_category');
            $table->foreign('id_category')->references('id')->on('categories')->cascadeOnDelete();;
            $table->string('name_animal');
            $table->text('description');
            $table->text('photo');
            $table->enum('status',['Новая', 'Решена', 'Отклонена']);
            $table->text('new_img')->nullable();
            $table->string('cause')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
