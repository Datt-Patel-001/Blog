<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $dishes = \App\Models\Dish::all();

        if ($dishes->isEmpty()) return; // Need dishes

        foreach ($users as $user) {
            $numCarts = rand(0, 5); // Some users have abandoned carts

            for ($i = 0; $i < $numCarts; $i++) {
                // Only create cart if no corresponding completed order exists recently
                $recentOrder = $user->orders()?->where('status', 'completed')->where('created_at', '>', \carbon\Carbon::now()->subDays(2))->exists();

                if (!$recentOrder || rand(1, 3) == 1) { // Create some carts even if recent orders exist
                    $cart = \App\Models\Cart::create([
                        'user_id' => $user->id,
                        'created_at' => \carbon\Carbon::now()->subHours(rand(1, 48)),
                        'order_id' => null, // Initially abandoned
                    ]);

                    $numItems = rand(1, 4);
                    $cartDishes = $dishes->random($numItems);

                    foreach ($cartDishes as $dish) {
                        \App\Models\CartItem::create([
                            'cart_id' => $cart->id,
                            'dish_id' => $dish->id,
                            'quantity' => rand(1, 2),
                        ]);
                    }

                    // Randomly link some carts to a non-completed order to simulate process
                    if (rand(1, 5) == 1) {
                        $order = $user->orders()?->where('status', '!=', 'completed')->inRandomOrder()->first();
                        if ($order) {
                            $cart->update(['order_id' => $order->id]);
                        }
                    }
                }
            }
        }
    }
}
