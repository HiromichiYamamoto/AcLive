<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ユーザーID');
            $table->string('email', 255)->comment('メールアドレス');
            $table->text('password')->comment('パスワード');
            $table->string('nickname', 100)->comment('ニックネーム');
            $table->string('tel', 255)->nullable()->comment('電話番号');
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->integer('sex')->nullable()->comment('性別');
            $table->integer('prefecture_id')->nullable()->comment('都道府県ID');
            $table->text('profile')->nullable()->comment('プロフィール');
            $table->string('avatar_filename', 255)->nullable()->comment('アバター画像名');
            $table->integer('deleted')->default(0)->comment('削除フラグ');
            $table->dateTime('entered_at')->nullable()->comment('入会日');
            $table->dateTime('withdrew_at')->nullable()->comment('退会日');
            $table->dateTime('last_login_at')->comment('最終ログイン日');
            $table->string('remember_token', 100)->nullable()->comment('ログイン保持ハッシュ');
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
        Schema::dropIfExists('users');
    }
}
