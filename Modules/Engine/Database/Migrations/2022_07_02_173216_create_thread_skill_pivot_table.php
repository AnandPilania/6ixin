<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $tableNames = config('db.table_names');
      $columnNames = config('db.column_names');

      if (empty($tableNames)) {
        throw new \Exception('Error: config/engine.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/engine.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if(!Schema::hasTable($tableNames['thread_skill'])) {
      Schema::create($tableNames['thread_skill'], function (Blueprint $table) {
          $table->foreignId('thread_id')->constrained(config('db.table_names.threads'))->onDelete('cascade')->nullable();
          $table->foreignId('skill_id')->constrained(config('db.table_names.skills'))->onDelete('cascade')->nullable();

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
      $tableNames = config('db.table_names');
      $columnNames = config('db.column_names');

      if (empty($tableNames)) {
          throw new \Exception('Error: config/engine.php not loaded. Run [php artisan config:clear] and try again.');
      }

      Schema::dropIfExists($tableNames['thread_skill']);
    }
};
