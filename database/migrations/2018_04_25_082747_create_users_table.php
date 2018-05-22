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
            $table->text('profile')->nullable()->comment('プロフィール');
            $table->integer('rank')->default(1)->comment('ランク');
            $table->string('avatar', 255)->nullable()->comment('アバター画像');
            $table->string('home_image', 255)->nullable()->comment('カバー画像');
            $table->integer('deleted')->default(0)->comment('削除フラグ');
            $table->dateTime('entered_at')->nullable()->comment('入会日');
            $table->dateTime('withdrew_at')->nullable()->comment('退会日');
            $table->integer('membership_state')->default(1)->comment('会員ステータス');
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
