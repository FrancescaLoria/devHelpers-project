<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews_array = config('reviews');
        foreach ($reviews_array as $reviews_item) {
            $review = new Review();
            $review->name = $reviews_item['name'];
            $review->comment = $reviews_item['comment'];
            $review->vote = $reviews_item['vote'];
            $review->save();
        }
    }
}
