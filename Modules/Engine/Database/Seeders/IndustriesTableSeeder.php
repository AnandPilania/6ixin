<?php

namespace Modules\Engine\Database\Seeders;

use Modules\Engine\Entities\Industry;
use Modules\Engine\Entities\Sector;
use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{

  public function run()
  {
    $cycles = 1;
    $industries = ['Hair Salon & Barber', 'SPA & Massage','Beauty & Art Salon',  'Artisan', 'Health & Medical', 'Fitness & Gym', 'Sales & Retail ',  'Other'];
    $areas =[
              [
                "industry" => [
                  'en' => "Hair Salon & Barber",
                  'fr' => "Salon de coiffure et Barbier",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                             [
                             "name" => [
                               'en' => "Hairstylist",
                               'fr' => "Coiffeuse",
                             ],
                             // "description" => $faker->unique()->text,
                             "is_public" => 1 ,
                             ],
                             [
                             "name" => [
                               'en' => "Barbershop",
                               'en' => "Coiffeur",
                             ],
                             // "description" => $faker->unique()->text,
                             "is_public" => 1 ,
                             ]
                           ],
              ],
              [
                "industry" => [
                  'en' => "SPA & Massage",
                  'fr' => "SPA & Massage",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                              [
                              "name" => [
                                'en' => "SPA",
                                'fr' => "SPA",
                              ],

                              // "description" => $faker->unique()->text,
                              "is_public" => 1 ,
                              ],
                              [
                              "name" => [
                                'en' => "Massage",
                                'fr' => "Massage",
                              ],
                              // "description" => $faker->unique()->text,
                              "is_public" => 1 ,
                                  ],
                              ],
              ],
              [
                "industry" => [
                  'en' => "Beauty & Art Salon ",
                  'fr' => "Salon de Beaute et d'Art",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                                [
                                "name" => [
                                  'en' => "Eyelash Service",
                                  'fr' => "SPA & Massage",
                                ],
                                // "description" => $faker->unique()->text,
                                "is_public" => 1 ,
                                ],
                                [
                                "name" => [
                                  'en' => "Makeup Artist",
                                  'fr' => "SPA & Massage",
                                ],
                                // "description" => $faker->unique()->text,
                                "is_public" => 1 ,
                                    ],
                                [
                                "name" => [
                                  'en' => "Tattoo Studio",
                                  'fr' => "SPA & Massage",
                                ],
                                // "description" => $faker->unique()->text,
                                "is_public" => 1 ,
                                ],
                             ]
              ],
              [
                "industry" => [
                  'en' => "Artisan",
                  'fr' => "Artisanat",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" =>
                  [
                    [
                    "name" => [
                      'en' => "Tailor & Sewer",
                      'fr' => "SPA & Massage",
                    ],
                    // "description" => $faker->unique()->text,
                    "is_public" => 1 ,
                    ],
                    [
                    "name" => [
                      'en' => "Cobbler",
                      'fr' => "SPA & Massage",
                    ],
                    // "description" => $faker->unique()->text,
                    "is_public" => 1 ,
                        ],
                    [
                    "name" => [
                      'en' => "Poetry",
                      'fr' => "Poterie",
                    ],
                    // "description" => $faker->unique()->text,
                    "is_public" => 1 ,
                    ],
                    [
                    "name" => [
                      'en' => "Customs",
                      'fr' => "SPA & Massage",
                    ],
                    // "description" => $faker->unique()->text,
                    "is_public" => 1 ,
                    ],
                 ],
              ],
              [
                "industry" => [
                  'en' => "Health Care & Medical",
                  'fr' => "Soins de Sante et Medicaux",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                      [
                      "name" => [
                        'en' => "Hair Extension & Removal",
                        'fr' => "SPA & Massage",
                      ],
                      // "description" => $faker->unique()->text,
                      "is_public" => 1 ,
                      ],
                      [
                      "name" => [
                        'en' => "Medical Spa",
                        'fr' => "SPA Medical",
                      ],
                      // "description" => $faker->unique()->text,
                      "is_public" => 1 ,
                      ],
                      [
                      "name" => [
                        'en' => "Doctor",
                        'fr' => "Docteur",
                      ],
                      // "description" => $faker->unique()->text,
                      "is_public" => 1 ,
                      ],
                      [
                      "name" => [
                        'en' => "Chiropractor",
                        'fr' => "Chiropracteur",
                      ],
                      // "description" => $faker->unique()->text,
                      "is_public" => 1 ,
                      ],
                      [
                      "name" => [
                        'en' => "Dermatologist",
                        'fr' => "Dermatologiste",
                      ],
                      // "description" => $faker->unique()->text,
                      "is_public" => 1 ,
                      ],
                      [
                      "name" => [
                        'en' => "Nutritionist",
                        'fr' => "Nutritionniste",
                      ],
                      // "description" => $faker->unique()->text,
                      "is_public" => 1 ,
                      ],
                     ],
              ],
              [
                "industry" => [
                  'en' => "Fitness & Gym",
                  'fr' => "Gym et Fitness",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                  [
                 "name" => [
                   'en' => "Gym",
                   'fr' => "Gym",
                 ],
                 // "description" => $faker->unique()->text,
                 "is_public" => 1 ,
                 ],
                 [
                 "name" => [
                   'en' => "Yoga",
                   'fr' => "Yoga",
                 ],
                 // "description" => $faker->unique()->text,
                 "is_public" => 1 ,
                 ],
                 [
                 "name" => [
                   'en' => "Sauna",
                   'fr' => "Sauna",
                 ],
                 // "description" => $faker->unique()->text,
                 "is_public" => 1 ,
                 ],
                 [
                 "name" => [
                   'en' => "Personnal Coach",
                   'fr' => "Coach personnel",
                 ],
                 // "description" => $faker->unique()->text,
                 "is_public" => 1 ,
                 ],
               ],
              ],
              [
                "industry" => [
                  'en' => "Sales & Retail",
                  'fr' => "Ventes et detail",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                  [
                  "name" => [
                    'en' => "Weight Loss",
                    'fr' => "Perte de poids",
                  ],
                  // "description" => $faker->unique()->text,
                  "is_public" => 1 ,
                  ],
                  [
                  "name" => [
                    'en' => "Cosmetics & Beauty Supply",
                    'fr' => "Cosmetiques et Produits de beaute",
                  ],
                  // "description" => $faker->unique()->text,
                  "is_public" => 1 ,
                  ],
                  [
                  "name" => [
                    'en' => "Health & Well Being",
                    'fr' => "Sante et Bien etre",
                    ],
                    // "description" => $faker->unique()->text,
                  "is_public" => 1 ,
                  ],
                ],
              ],
              [
                "industry" => [
                  'en' => "Other",
                  'fr' => "Autre",
                ],
                // "description" => $faker->unique()->text,
                "is_public" => 1 ,
                "sectors" => [
                  [
                  "name" => [
                    'en' => "Other",
                    'fr' => "Autre",
                    ],
                    // "description" => "Other Sector",
                  ]
                  ],
              ],
            ];

              foreach($areas as $area){
                $name = $area["industry"];
                $inds = Industry::factory()->state([
                        'name' => $name,
                      ])->create();


              foreach($area["sectors"] as $area["sector"]){
                $namesc = $area["sector"]["name"];
                $indid = $inds->id;
                $trr = Sector::factory()->state([
                  'name' => $area["sector"]["name"],
                ])->count(1)->create()
                  ->each(function ($sectorc) use($namesc, $indid){
                //   $sectorc->passes()->create([
                //     'title' =>       ['en' => $namesc, 'fr' => $namesc."_fr"],
                //     'type' =>         Pass::TYPE_SELECT['Profession']['name'],
                //     'description' => ['en' => 'All the '.$namesc.'s', 'fr' => 'Tout les '.$namesc.'s'],
                //   ]);
                  $sectorc->industries()->attach($indid);
                //
                 });
            }
          }

  }
}
