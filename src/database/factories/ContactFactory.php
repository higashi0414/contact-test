<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryId = Category::inRandomOrder()->first()->id ?? 1;
        return [
            'category_id' => 2,
            'first_name' => '太郎',
            'last_name' => '山田',
            'gender' => 1,
            'email' => 'test@example.com',
            'tel' => '08012345678',
            'address' => '東京都渋谷区代々木1-2-3',
            'building' => 'ファッションビル101',
            'detail' => '商品の交換について',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
