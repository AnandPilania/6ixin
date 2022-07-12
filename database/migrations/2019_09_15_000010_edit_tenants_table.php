<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
          $table->string('type')->default('user');
          $table->string('user_global')->nullable();
          $table->foreign('user_global')
          ->references('global')
          ->on(config('account.table_names.users'))
          ->onDelete('cascade');
          $table->foreignId('current_team_id')->nullable();
          $table->integer('sort_order')->nullable();
          $table->string('reference')->nullable();
          $table->string('value')->nullable();
          $table->integer('rank')->nullable();
          $table->schemalessAttributes('properties')->nullable();
          $table->schemalessAttributes('data')->nullable();
          $table->string('global')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
      Schema::table('tenants', function (Blueprint $table) {
        $table->dropColumn('type');
        $table->dropColumn('current_team_id');
        $table->dropColumn('sort_order');
        $table->dropColumn('reference');
        $table->dropColumn('value');
        $table->dropColumn('rank');
        $table->dropColumn('properties');
        $table->dropColumn('data');
        $table->dropColumn('global');
      });
    }
};
