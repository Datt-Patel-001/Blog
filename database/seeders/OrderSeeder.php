<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $restaurants = \App\Models\Restaurant::all();


        foreach ($users as $user) {
            $numOrders = rand(0, 25); // Some users might have 0 orders

            for ($i = 0; $i < $numOrders; $i++) {
                 $restaurant = $restaurants->random();
                 $dishes = $restaurant->dishes()->inRandomOrder()->limit(rand(1, 5))->get();
                 $orderTotal = 0;
                 $orderItemsData = [];

                 if($dishes->isEmpty()) continue; // Skip if restaurant has no dishes somehow

                 foreach($dishes as $dish) {
                     $quantity = rand(1, 3);
                     $itemTotal = $dish->price * $quantity;
                     $orderTotal += $itemTotal;
                     $orderItemsData[] = [
                         'dish_id' => $dish->id,
                         'quantity' => $quantity,
                         'price' => $dish->price, // Price at time of order
                     ];
                 }

                 // Simulate order time over the last year
                 $orderTime = \carbon\Carbon::instance($user->created_at)->addDays(rand(1, 365));
                 if ($orderTime->isFuture()) {
                     $orderTime = \carbon\Carbon::now()->subDays(rand(1, 30)); // Ensure order time is not in future
                 }


                 $order = \App\Models\Order::create([
                    'user_id' => $user->id,
                    'restaurant_id' => $restaurant->id,
                    'total_value' => $orderTotal,
                    'status' => (rand(1, 10) > 1) ? 'completed' : 'cancelled', // ~90% completed
                    'delivery_time_minutes' => (rand(1, 10) > 1) ? rand(15, 75) : null, // Some nulls
                    'ordered_at' => $orderTime,
                    'created_at' => $orderTime, // Align created_at with ordered_at
                    'updated_at' => $orderTime,
                 ]);

                 // Insert order items
                 foreach ($orderItemsData as $itemData) {
                     $itemData['order_id'] = $order->id; // Add order_id
                     \App\Models\OrderItem::create($itemData);
                 }

                 // Simulate some high value orders on weekends for user 8 test
                 if ($user->id == 8 && $orderTotal > 100 && !$orderTime->isWeekend()) {
                     $order->delete(); // Delete if high value but not weekend for this specific user test
                 }
                 if ($user->id == 8 && $orderTotal > 100 && $orderTime->isWeekend()) {
                     // Keep it
                 }
                 if ($user->id == 8 && $orderTotal <= 100) {
                    // Keep low value orders regardless of day
                 }

                 // Simulate delivery time anomalies (IQR test) - make some very high/low
                 if (rand(1, 50) == 1) {
                     $order->update(['delivery_time_minutes' => rand(90, 150)]);
                 }
                 if (rand(1, 50) == 1) {
                     $order->update(['delivery_time_minutes' => rand(5, 10)]);
                 }
            }
        }
    }
}
