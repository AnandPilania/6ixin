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
        Schema::table('teams', function (Blueprint $table) {
          $table->string('tenant_id')->nullable()->after('personal_team');
          $table->integer('rank')->nullable()->after('tenant_id');
          $table->schemalessAttributes('properties')->nullable()->after('rank');
          $table->schemalessAttributes('data')->nullable()->after('properties');
          $table->boolean('is_public')->default(1)->after('data');
          $table->string('global')->nullable()->after('is_public');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
      Schema::table('teams', function (Blueprint $table) {
        $table->dropColumn('tenant_id');
        $table->dropColumn('rank');
        $table->dropColumn('properties');
        $table->dropColumn('data');
        $table->dropColumn('is_public');
        $table->dropColumn('global');
      });
    }
};
