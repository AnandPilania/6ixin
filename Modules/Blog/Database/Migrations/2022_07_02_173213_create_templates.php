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
        throw new \Exception('Error: config/blog.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/blog.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if(!Schema::hasTable($tableNames['templates'])) {
      Schema::create($tableNames['templates'], function (Blueprint $table) {
          $table->id();
           $table->json('title');
          $table->string('slug')->unique();
          $table->string('code')->nullable();
          $table->string('reference')->nullable();
          $table->json('body')->nullable();
          $table->integer('value')->nullable();
          $table->boolean('is_default')->default(0)->nullable();
          $table->boolean('is_public')->default(1)->nullable();
          $table->boolean('is_featured')->default(0)->nullable();
          $table->integer('level')->nullable();
          $table->integer('sort_order')->nullable();
          $table->integer('rank')->nullable();
          $table->schemalessAttributes('properties')->nullable();

          $table->string(config('engine.column_names.foreign_user'))->nullable();
          $table->foreign(config('engine.column_names.foreign_user'))
                ->references(config('engine.column_names.local_user'))
                ->on(config('account.table_names.users'))
                ->onDelete('cascade');

          $table->string('tenant_id')->nullable();
          $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');


          $table->string('global')->nullable();
          $table->timestamps();
          $table->softDeletes();
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
          throw new \Exception('Error: config/blog.php not loaded. Run [php artisan config:clear] and try again.');
      }

      Schema::dropIfExists($tableNames['templates']);
    }
};
