<?php

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
        // $this->call(UserSeeder::class);
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 1,
            'is_delivery' => 1,
        ]);
        \App\Brand::create([
            'name' => 'kia',
            'name_ar' => 'كيا',
        ]);
        \App\Car::create([
            'brand' => 'kia rio 23',
            'model' => 'rio 23',
            'year' => '2023',
            'engine' => 'jas',
            'brand_ar' => 'كيا ريو 23',
            'model_ar' => 'ريو 23',
            'engine_ar' => 'جاز',
            'brand_id' => 1,
        ]);
        \App\Supplier::create([
            'name' => 'Hnoo',
            'name_ar' => 'حنووز',
        ]);
        \App\SuperCategory::create([
            'name' => 'filter',
            'name_ar' => 'فلتر',
        ]);
        \App\Category::create([
            'name' => 'air filter',
            'name_ar' => 'فلتر هواء',
            'sale' => 10,
            'super_category_id' => 1,
        ]);
        \App\CouponCode::create([
            'name' => 'grxpartix',
            'value' => 300,
            'quantity' => 5,
            'descount_type_id' => 1,
            'expiration_at' => '2020-12-29',
        ]);
    }
}
