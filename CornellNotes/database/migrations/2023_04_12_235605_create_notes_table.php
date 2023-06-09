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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('keyWords');
            $table->text('summary');
            $table->text('updates')->nullable();
            $table->date('creation_date');

            $table->foreignId('id_user')
                ->constrained('users')
                ->cascadeOnUpdate();
            $table->foreignId('id_topic')
                ->constrained('topics')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
