<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.++
     *
     * @return void
     */
    public function up()
    {
      $tableNames = config('engine.table_names');
      $columnNames = config('engine.column_names');

      if (empty($tableNames)) {
        throw new \Exception('Error: config/engine.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/engine.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if(!Schema::hasTable($tableNames['threads'])) {
      Schema::create($tableNames['threads'], function (Blueprint $table) {
          $table->id();
          $table->string('slug');
          $table->json('title');
          $table->string('reference')->nullable();
          $table->json('body')->nullable();
          $table->string('inter_id')->nullable();
          $table->integer('sort_order')->nullable();
          $table->integer('value')->nullable();
          $table->boolean('is_active')->default(0);
          $table->boolean('is_public')->default(0);
          $table->schemalessAttributes('properties')->nullable();
          $table->schemalessAttributes('data')->nullable();
          $table->string('global');
          $table->softDeletes();
          $table->timestamps();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $tableNames = config('engine.table_names');
      $columnNames = config('engine.column_names');

      if (empty($tableNames)) {
          throw new \Exception('Error: config/engine.php not loaded. Run [php artisan config:clear] and try again.');
      }

      Schema::dropIfExists($tableNames['threads']);
    }
};
