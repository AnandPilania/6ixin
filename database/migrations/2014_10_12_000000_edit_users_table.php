<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('users', function (Blueprint $table) {
              $table->dropColumn('name');
              $table->string('first_name')->after('id');
              $table->string('last_name')->after('first_name');
              $table->string('username')->after('last_name')->unique();
              $table->string('phone')->after('email')->unique()->nullable();
              $table->string('provider_id')->after('phone')->unique()->nullable();
              $table->string('provider_type')->after('provider_id')->unique()->nullable();
              $table->foreignId('current_tenant_id')->after('provider_type')->nullable();
              $table->integer('membership_ends_at')->nullable();
              $table->integer('type')->after('phone')->default(3000);
              $table->string('global')->unique();
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
              $table->string('name');
              $table->dropColumn('first_name');
              $table->dropColumn('last_name');
              $table->dropColumn('username');
              $table->dropColumn('phone');
          });
    }
};
