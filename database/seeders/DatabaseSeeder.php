<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::factory()->create([
            'name' => 'Aaron',
            'username' => 'Aaron',
            'email' => 'Testing1@yahoo.com',
            'password' => '1234567',
        ]);
        $user2 = User::factory()->create([
            'name' => 'Isaac',
            'username' => 'Isaac',
            'email' => 'Testing2@yahoo.com',
            'password' => '1234567',
        ]);

        $category1 = Category::factory()->create([
            'name' => 'Information Technology',
            'slug' => 'information-technology'
        ]);

        $category2 = Category::factory()->create([
            'name' => 'Accounting',
            'slug' => 'accounting'
        ]);

        $category3 = Category::factory()->create([
            'name' => 'Business',
            'slug' => 'business'
        ]);

        Post::factory(1)->create([
            'user_id' => $user1->id,
            'category_id' => $category1 ->id,
            'title'=> 'Hiring Software Developer',
            'slug' => 'Software Developer',
            'excerpt' => 'Intel',
            'body' => 'We are currently hiring software developer, kindly send in your resume.',
            'img_src' => 'illustration-1.png'
        ]);

        Post::factory(1)->create([
            'user_id' => $user2->id,
            'category_id' => $category2 ->id,
            'title'=> 'Hiring Accountant',
            'slug' => 'Accountant',
            'excerpt' => 'Maybank',
            'body' => 'We are currently hiring accountant, kindly send in your resume.',
             'img_src' => 'illustration-1.png'
        ]);

        Post::factory(1)->create([
            'user_id' => $user1->id,
            'category_id' => $category3 ->id,
            'title'=> 'Hiring Business Assistant',
            'slug' => 'Assistant',
            'excerpt' => 'IdealTech',
            'body' => 'We are currently hiring assistant, kindly send in your resume.',
            'img_src' => 'illustration-1.png'
        ]);

        Post::factory(1)->create([
            'user_id' => $user2->id,
            'category_id' => $category1 ->id,
            'title'=> 'Hiring Front-End Developer',
            'slug' => 'Front-End Developer',
            'excerpt' => 'Google',
            'body' => 'We are currently hiring Front-End developer, kindly send in your resume.',
            'img_src' => 'illustration-1.png'
        ]);




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
