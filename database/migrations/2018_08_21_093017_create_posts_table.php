<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id'); // clé primaire
            $table->enum('post_type', ['formation', 'stage', 'undetermined'])->default('undetermined');
            $table->string('title', 100); // obligatoire
            $table->text('description')->nullable(); //non obligatoire
            $table->dateTime('start_date')->nullable(); // obligatoire
            $table->dateTime('end_date')->nullable(); // obligatoire
            $table->decimal('price', 8, 2)->default('0.00'); // obligatoire
            $table->smallInteger('nb_max')->nullable(); // obligatoire
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
        Schema::dropIfExists('posts');
    }
}
