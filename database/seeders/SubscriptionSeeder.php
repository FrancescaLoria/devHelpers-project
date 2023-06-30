<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions_array = config('subscriptions');

        foreach ($subscriptions_array as $subscriptions_item) {
            $subscription = new Subscription();
            $subscription->name = $subscriptions_item['name'];
            $subscription->price = $subscriptions_item['price'];
            $subscription->duration = $subscriptions_item['duration'];
            $subscription->save();
        }
    }
}
