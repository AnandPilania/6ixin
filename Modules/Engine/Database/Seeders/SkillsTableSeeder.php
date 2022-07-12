<?php
namespace Modules\Engine\Database\Seeders;

use Modules\Engine\Entities\Skill;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach(range(1, 64) as $id){
        $name = $faker->unique()->numerify('Skill ###');

            Skill::create([
              'name' => [
                'en'=> $name,
                'fr'=> $name,
              ],
              'description' => [
                'en'=> $faker->unique()->paragraph,
                'fr'=> $faker->unique()->paragraph,
              ],
            ]);

          }
    }
}
