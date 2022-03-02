<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('posts', function ($table){
            $table->integer('likes')->after('status')->nullable();
            $table->string('title',100)->change();
            $table->string('description')->nullable()->change();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('posts', function ($table){
            $table->dropColumn('likes');
            $table->dropForeign('posts_user_id_foreign');
        });
    }
}
