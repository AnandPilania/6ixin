<?php
namespace Modules\Engine\Database\factories;

use Illuminate\Database\Eloquent\Factories\Portfolio;
use App\Models\User;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Engine\Entities\Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $users = User::all();
        return [
          'title' => $this->faker->catchPhrase(),
          'body' => [
            'en'=> $this->faker->unique()->paragraph,
            'fr'=> $this->faker->unique()->paragraph,
          ],
          'value' => rand(200,250),
          'user_global' => $users->random()->global,
          'author_id' => $users->random()->id,
          'author_type' => 'App\Models\Organization',
          'is_default' => rand(0,1),
          'is_featured' => rand(0,1),
        ];
    }
}
