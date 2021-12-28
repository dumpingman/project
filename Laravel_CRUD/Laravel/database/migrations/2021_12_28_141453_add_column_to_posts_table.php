<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->string('post_names', 255);
            $table->string('post_emails', 255);
            $table->integer('users_id');
            $table->date('finished_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            Schema::dropColumn('post_names');
            Schema::dropColumn('post_emails');
            Schema::dropColumn('users_id');
            Schema::dropColumn('finished_at');
        });
    }
}
