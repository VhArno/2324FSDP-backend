<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create questions
        $questions = [
            ['question' => 'Wat spreekt je het meest aan in een project?'],
            ['question' => 'Welke programmeertalen vind je het meest interessant?'],
            ['question' => 'Wat trekt je het meest aan in de IT-industrie?'],
            ['question' => 'Waar liggen je interesses met betrekking tot netwerken?'],
            ['question' => 'Welke technologische trend spreekt je het meest aan?'],
            ['question' => 'Wat zou je graag willen leren tijdens je specialisatie?'],
            ['question' => 'Wat voor soort projecten vind je het meest boeiend?'],
            ['question' => 'Wat vind je het interessantst aan de IT-sector?'],
            ['question' => 'Waar liggen je sterke punten als het gaat om technologie?'],
            ['question' => 'Welk aspect van informatica spreekt je het meest aan?'],
        ];

        Question::insert($questions);
    }
}
