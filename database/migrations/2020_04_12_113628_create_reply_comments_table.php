<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replycomments', function (Blueprint $table) {
            $table->id('reply_id');
            $table->string('body');
            $table->timestamps();
        });
        Schema::table('replycomments',function(Blueprint $table){
            $table->bigInteger('user_id')->unsigned()->after('body');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->bigInteger('comment_id')->unsigned()->after('body');
            $table->foreign('comment_id')->references('comment_id')->on('comments')->onDelete('cascade');

        }
    );
    }

    /**s
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('replycomments',function(Blueprint $table)
    {
           $table->dropForeign(['user_id']);
           $table->dropForeign(['comment_id']);
    });
        Schema::dropIfExists('replycomments');
    }
}
