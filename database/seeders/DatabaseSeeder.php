<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profil;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         $teachers = User::factory(10)->create([
            'role' => 'teacher'
        ]);

        $admins = User::factory(2)->create([
            'role' => 'admin'
        ]);
        //fusionner teachers et users
          $allUsers = $teachers->merge($admins);
           foreach ($allUsers as $user) {
            Profil::factory()->create([
                'user_id' => $user->id
            ]);
                                       }
        
        $courses=collect();//[] array()
        foreach ($teachers as $teacher) {
        $teacherCourses = Course::factory(3)->create([
                'user_id' => $teacher->id
            ]);

            $courses->merge( $teacherCourses);
      
           
        }
        $categories = Category::factory(5)->create();
       
     
   foreach ($courses as $course) {
            $course->categories()->attach(
                $categories->random(2)->pluck('id')->toArray()
            );
        }
    }
}
