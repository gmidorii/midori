<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BlocksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 4) as $index)
		{
			Block::create([
                'title' => $faker->word,
                'value' => $faker->text
			]);
		}
	}

}