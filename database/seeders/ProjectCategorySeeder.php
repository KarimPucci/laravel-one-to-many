<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.prendo tutti i project e li ciclo
        //2.ad ogni ciclo estraggo un id random della tabella categories
        //3.faccio l'update del post del ciclo con l'id della categoria
        $projects = Project::all();
        foreach($projects as $project){
            $category_id = Category::inRandomOrder()->first()->id;
            $project->category_id = $category_id;
            $project->update();
        }
    }
}
