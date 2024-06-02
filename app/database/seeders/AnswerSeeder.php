<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create answers
        $answers = [
            // Vraag 1
            [
                'answer' => 'Het ontwerpen van geavanceerde communicatiesystemen.',
                'weight' => 1,
                'question_id' => 1,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Het implementeren van slimme en verbonden apparaten.',
                'weight' => 1,
                'question_id' => 1,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Het beveiligen van netwerken en gegevens.',
                'weight' => 1,
                'question_id' => 1,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Het ontwikkelen van complexe softwaretoepassingen.',
                'weight' => 1,
                'question_id' => 1,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Het bouwen van dynamische en interactieve websites.',
                'weight' => 1,
                'question_id' => 1,
                'specialisation_id' => 5,
            ],
        
            // Vraag 2
            [
                'answer' => 'C++/C',
                'weight' => 1,
                'question_id' => 2,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Python/JavaScript',
                'weight' => 1,
                'question_id' => 2,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Powershell/Bash',
                'weight' => 1,
                'question_id' => 2,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Python/Java',
                'weight' => 1,
                'question_id' => 2,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'HTML/CSS/JavaScript',
                'weight' => 1,
                'question_id' => 2,
                'specialisation_id' => 5,
            ],
        
            // Vraag 3
            [
                'answer' => 'De evolutie van mobiele en draadloze technologieën.',
                'weight' => 1,
                'question_id' => 3,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'De groei van het Internet of Things (IoT) en slimme apparaten.',
                'weight' => 1,
                'question_id' => 3,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'De constante uitdagingen op het gebied van cyberbeveiliging en servers.',
                'weight' => 1,
                'question_id' => 3,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'De vooruitgang in kunstmatige intelligentie en machinaal leren.',
                'weight' => 1,
                'question_id' => 3,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'De mogelijkheid om creatieve en functionele websites te bouwen.',
                'weight' => 1,
                'question_id' => 3,
                'specialisation_id' => 5,
            ],
        
            // Vraag 4
            [
                'answer' => 'Opzetten van geavanceerde communicatienetwerken.',
                'weight' => 1,
                'question_id' => 4,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Implementeren van netwerken voor IoT-toepassingen.',
                'weight' => 1,
                'question_id' => 4,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Beveiligen en monitoren van netwerkinfrastructuren.',
                'weight' => 1,
                'question_id' => 4,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Analyseren van netwerkgegevens voor optimalisatie.',
                'weight' => 1,
                'question_id' => 4,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Werken met webprotocollen en serverconfiguraties.',
                'weight' => 1,
                'question_id' => 4,
                'specialisation_id' => 5,
            ],
        
            // Vraag 5
            [
                'answer' => 'Opzetten van geavanceerde communicatienetwerken.',
                'weight' => 1,
                'question_id' => 5,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Implementeren van netwerken voor IoT-toepassingen.',
                'weight' => 1,
                'question_id' => 5,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Beveiligen en monitoren van netwerkinfrastructuren.',
                'weight' => 1,
                'question_id' => 5,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Analyseren van netwerkgegevens voor optimalisatie.',
                'weight' => 1,
                'question_id' => 5,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Werken met webprotocollen en serverconfiguraties.',
                'weight' => 1,
                'question_id' => 5,
                'specialisation_id' => 5,
            ],
        
            // Vraag 6
            [
                'answer' => 'Geavanceerde signaalverwerkingstechnieken.',
                'weight' => 1,
                'question_id' => 6,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Het bouwen van IoT-toepassingen vanaf nul.',
                'weight' => 1,
                'question_id' => 6,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Cyberaanval detectie en preventie.',
                'weight' => 1,
                'question_id' => 6,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Machine learning-algoritmen implementeren.',
                'weight' => 1,
                'question_id' => 6,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Het ontwikkelen van responsieve en gebruiksvriendelijke websites.',
                'weight' => 1,
                'question_id' => 6,
                'specialisation_id' => 5,
            ],
        
            // Vraag 7
            [
                'answer' => 'Projecten gericht op draadloze communicatietechnologieën.',
                'weight' => 1,
                'question_id' => 7,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Projecten die slimme apparaten integreren in verschillende omgevingen.',
                'weight' => 1,
                'question_id' => 7,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Projecten die zich richten op het beveiligen van netwerken tegen bedreigingen.',
                'weight' => 1,
                'question_id' => 7,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Projecten die gebruikmaken van geavanceerde algoritmen voor data-analyse.',
                'weight' => 1,
                'question_id' => 7,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Projecten die de gebruikerservaring op het web verbeteren.',
                'weight' => 1,
                'question_id' => 7,
                'specialisation_id' => 5,
            ],
        
            // Vraag 8
            [
                'answer' => 'De mogelijkheid om verbonden systemen te ontwerpen.',
                'weight' => 1,
                'question_id' => 8,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'De diversiteit aan slimme technologieën en toepassingen.',
                'weight' => 1,
                'question_id' => 8,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Het constant evoluerende landschap van cyberbeveiliging.',
                'weight' => 1,
                'question_id' => 8,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'De potentie van kunstmatige intelligentie voor verschillende industrieën.',
                'weight' => 1,
                'question_id' => 8,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'De creatieve vrijheid bij het ontwikkelen van webapplicaties.',
                'weight' => 1,
                'question_id' => 8,
                'specialisation_id' => 5,
            ],
        
            // Vraag 9
            [
                'answer' => 'Analytisch denken en probleemoplossend vermogen.',
                'weight' => 1,
                'question_id' => 9,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Creativiteit en innovatie bij het bedenken van nieuwe toepassingen.',
                'weight' => 1,
                'question_id' => 9,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'Aandacht voor detail en systematisch denken.',
                'weight' => 1,
                'question_id' => 9,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'Diepgaande kennis van wiskunde en statistiek.',
                'weight' => 1,
                'question_id' => 9,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Gevoel voor esthetiek en gebruikerservaring.',
                'weight' => 1,
                'question_id' => 9,
                'specialisation_id' => 5,
            ],
        
            // Vraag 10
            [
                'answer' => 'De mogelijkheid om wereldwijd verbonden systemen te creëren.',
                'weight' => 1,
                'question_id' => 10,
                'specialisation_id' => 1,
            ],
            [
                'answer' => 'Het potentieel van het Internet of Things voor een slimmer leven.',
                'weight' => 1,
                'question_id' => 10,
                'specialisation_id' => 2,
            ],
            [
                'answer' => 'De uitdagingen en verantwoordelijkheden van cybersecurity.',
                'weight' => 1,
                'question_id' => 10,
                'specialisation_id' => 3,
            ],
            [
                'answer' => 'De opkomst van kunstmatige intelligentie en zelflerende systemen.',
                'weight' => 1,
                'question_id' => 10,
                'specialisation_id' => 4,
            ],
            [
                'answer' => 'Het bouwen van boeiende en interactieve online ervaringen.',
                'weight' => 1,
                'question_id' => 10,
                'specialisation_id' => 5,
            ],
        ];        

        Answer::insert($answers);
    }
}
