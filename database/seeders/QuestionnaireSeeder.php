<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('questionnaires')->truncate();
        DB::table('questionnaires')->insert([
            [
                'id' => 1,
                'title' => 'Which of the following does TypeScript use to specify types?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'title' => 'Which of the following is NOT a type used in TypeScript?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'title' => 'How can we specify properties and methods for an object in TypeScript?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'title' => 'How else can Array<number> be written in TypeScript?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'title' => 'In which of these does a class take parameters?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'title' => 'Which is NOT an access modifier?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'title' => 'Which keyword allows us to share information between files in TypeScript?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'title' => 'Which is an array method to generate a new array based on a condition?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'title' => 'How is a property accessible within a class?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'title' => 'You can disable implicit variable type assignment by enabling the compiler option:',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
