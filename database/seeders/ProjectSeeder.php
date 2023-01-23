<?php

namespace Database\Seeders;

use App\Models\project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $new_project = new project();
            $new_project->name = $faker->sentence(4);
            $new_project->slug = project::generateSlug($new_project->name);
            $new_project->client_name = $faker->sentence(3);
            $new_project->summary = $faker->text();
            $new_project->cover_image = 'https://encrypted- tbn0.gstatic.com/images?q=tbn:ANd9GcTK8is9TWLTeW3PSVRvNVzsY0-AnY7sBERyu7du5phWmbisTnEIblNUWd0xkvSx23vP_ds&usqp=CAU';
            $new_project->save();
        }
    }
}
