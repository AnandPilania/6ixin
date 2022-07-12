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
      if(Schema::hasTable($tableNames['threads'])) {
      Schema::table($tableNames['threads'], function (Blueprint $table) {
        $table->integer('author_id')->after('value')->nullable();
        $table->string('author_type')->after('author_id')->nullable();
        $table->string(config('db.column_names.foreign_user'))->nullable();
        $table->foreign(config('db.column_names.foreign_user'))
              ->references(config('db.column_names.local_user'))
              ->on(config('db.table_names.users'))
              ->onDelete('cascade');
        $table->string('tenant_id');
        $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
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

      Schema::dropIfExists($tableNames['threads']);
    }
};
