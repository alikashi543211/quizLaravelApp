<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('answers')->truncate();
        DB::table('answers')->insert([
            // Question 1
            [
                'id' => 1,
                'questionnaire_id' => 1,
                'title' => ':',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'questionnaire_id' => 1,
                'title' => ';',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'questionnaire_id' => 1,
                'title' => '!',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'questionnaire_id' => 1,
                'title' => '&',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 2

            [
                'id' => 5,
                'questionnaire_id' => 2,
                'title' => 'number',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'questionnaire_id' => 2,
                'title' => 'string',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'questionnaire_id' => 2,
                'title' => 'boolean',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'questionnaire_id' => 2,
                'title' => 'enum',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 3

            [
                'id' => 9,
                'questionnaire_id' => 3,
                'title' => 'Use classes',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'questionnaire_id' => 3,
                'title' => 'Use interfaces.',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'questionnaire_id' => 3,
                'title' => 'Use enums.',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'questionnaire_id' => 3,
                'title' => 'Use async/await.',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 4

            [
                'id' => 13,
                'questionnaire_id' => 4,
                'title' => '@number',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'questionnaire_id' => 4,
                'title' => 'number[]',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'questionnaire_id' => 4,
                'title' => 'number!',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'questionnaire_id' => 4,
                'title' => 'number?',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 5

            [
                'id' => 17,
                'questionnaire_id' => 5,
                'title' => 'constructor',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'questionnaire_id' => 5,
                'title' => 'destructor',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'questionnaire_id' => 5,
                'title' => 'import',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'questionnaire_id' => 5,
                'title' => 'subscribe',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 6

            [
                'id' => 21,
                'questionnaire_id' => 6,
                'title' => 'private',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 22,
                'questionnaire_id' => 6,
                'title' => 'protected',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 23,
                'questionnaire_id' => 6,
                'title' => 'public',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 24,
                'questionnaire_id' => 6,
                'title' => 'async',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 7

            [
                'id' => 25,
                'questionnaire_id' => 7,
                'title' => 'import',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 26,
                'questionnaire_id' => 7,
                'title' => 'export',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 27,
                'questionnaire_id' => 7,
                'title' => 'async',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 28,
                'questionnaire_id' => 7,
                'title' => 'constructor',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 8

            [
                'id' => 29,
                'questionnaire_id' => 8,
                'title' => 'filter',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 30,
                'questionnaire_id' => 8,
                'title' => 'map',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 31,
                'questionnaire_id' => 8,
                'title' => 'async',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 32,
                'questionnaire_id' => 8,
                'title' => 'enum',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 9

            [
                'id' => 33,
                'questionnaire_id' => 9,
                'title' => 'Using this.propertyName',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 34,
                'questionnaire_id' => 9,
                'title' => 'Accessors',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 35,
                'questionnaire_id' => 9,
                'title' => 'Destructuring',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 36,
                'questionnaire_id' => 9,
                'title' => 'Arrow function',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Question 10

            [
                'id' => 37,
                'questionnaire_id' => 10,
                'title' => 'noAutoType',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 38,
                'questionnaire_id' => 10,
                'title' => 'noImplicitAny',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 39,
                'questionnaire_id' => 10,
                'title' => 'autoTypeAssignment = FALSE',
                'is_correct' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 40,
                'questionnaire_id' => 10,
                'title' => 'Implicit = FALSE',
                'is_correct' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
