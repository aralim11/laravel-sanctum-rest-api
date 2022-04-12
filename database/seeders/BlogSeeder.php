<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::insert([
            ['user_id' => '1', 'category_id' => '1', 'title' => 'Tamim\'s revival or Miraz controversy need to know?', 'details' => 'The Chattogram-leg began in the best possible way as Tamim cancelled out Lendl Simmons\' hundred with a magnificent unbeaten 111, the left-hander\'s second BPL ton, to help Minister Group Dhaka register a comprehensive nine-wicket win against Sylhet Sunrisers on the opening day\'s second match.', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'image' => '/images/img.png'],
            ['user_id' => '3', 'category_id' => '3', 'title' => 'Brazil cruise past Paraguay in comfortable 4-0 win', 'details' => 'The defeat ended Paraguay\'s hopes of qualifying for Qatar and further cemented Brazil\'s position as one of the favourites to lift the trophy in December. Brazil top the South American qualifying group with no defeats in 15 games and the win extended to 61 matches their unbeaten home record in World Cup qualifiers.', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'image' => '/images/img.png'],
            ['user_id' => '2', 'category_id' => '2', 'title' => 'In-form Moeen arrives to boost Comilla Victorians', 'details' => 'After completing his latest national assignment, England all-rounder Moeen Ali reached Dhaka today and joined his Bangladesh Premier League (BPL) franchise Comilla Victorians, confirmed the team management.', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'image' => '/images/img.png'],
            ['user_id' => '3', 'category_id' => '3', 'title' => 'Fletcher, Soumya carnage sees Khulna pick up easy win', 'details' => 'Sent to bat, Sylhet lost both openers cheaply before Mithun\'s lone effort saw them to a challenging score. However, Khulna\'s Andre Fletcher and Soumya Sarkar made easy work of the chase. Soumya made his first meaningful contribution with the bat in the tournament, hitting a 31-ball 43 during a 99-run opening stand with Fletcher, who remained unbeaten on a 47-ball 71.', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'image' => '/images/img.png'],
            ['user_id' => '1', 'category_id' => '1', 'title' => 'Bangladesh sees another day without Covid death', 'details' => 'The number of detected novel coronavirus cases in the country, according to the government, rose to 1,951,658 on Friday as 81 more cases were reported, after testing 7,413 samples, including rapid antigen tests, in last 24 hours till 8:00am.', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'image' => '/images/img.png'],
        ]);
    }
}
