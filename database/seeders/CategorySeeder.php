<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->create(['name' => 'غير مصنف']);
        Category::factory()->create(['name' => 'الدفع']);
        Category::factory()->create(['name' => 'الصفحة الشخصية']);
    }
}
