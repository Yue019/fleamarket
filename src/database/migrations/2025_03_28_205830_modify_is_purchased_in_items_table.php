<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyIsPurchasedInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            // もし既にカラムが存在している場合は削除
            if (Schema::hasColumn('items', 'is_purchased')) {
                $table->dropColumn('is_purchased');
            }

            // 同じ名前で新しいカラムを追加（boolean型、デフォルト値false）
            $table->boolean('is_purchased')->default(false); // デフォルト値をfalseに設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            // 新しいカラムを削除
            $table->dropColumn('is_purchased');

            // 元のカラム（デフォルト値なし）を戻す
            $table->boolean('is_purchased'); // デフォルト値なし
        });
    }
}
