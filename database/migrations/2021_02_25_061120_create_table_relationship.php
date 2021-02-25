<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('division_id')->references('id')->on('divisions');
        });

        Schema::table('polls', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('poll_id')->references('id')->on('polls');
        });

        Schema::table('choices', function (Blueprint $table) {
            $table->foreign('poll_id')->references('id')->on('polls');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('choice_id')->references('id')->on('choices');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('division_id')->references('id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_division_id_foreign');
        });

        Schema::table('polls', function (Blueprint $table) {
            $table->dropForeign('polls_created_by_foreign');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_user_id_foreign');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_poll_id_foreign');
        });

        Schema::table('choices', function (Blueprint $table) {
            $table->dropForeign('choices_poll_id_foreign');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_choice_id_foreign');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_division_id_foreign');
        });
    }
}
