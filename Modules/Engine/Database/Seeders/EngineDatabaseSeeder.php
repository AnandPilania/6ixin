<?php

namespace Modules\Engine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EngineDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
                  IndustriesTableSeeder::class,
              //    CommunitiesTableSeeder::class,
                  CategoriesTableSeeder::class,
                  // CyclesTableSeeder::class,
                  // ExperiencesTableSeeder::class,
                  // FieldsTableSeeder::class,
                  // EmplacementsTableSeeder::class,
                  // LocationsTableSeeder::class,
                  // ShiftsTableSeeder::class,
                  // SizesTableSeeder::class,
                  // SkillsTableSeeder::class,
                  // TermsTableSeeder::class,
                  //
                  // AlphaTableSeeder::class,
                  // OrganizationsTableSeeder::class,
                  // TopicsTableSeeder::class,

                  ]);
    }
}
