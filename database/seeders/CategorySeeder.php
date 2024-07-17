<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->delete();

        Category::factory()
            ->has(
                Category::factory()->state(['title' => 'Boots', 'slug' => 'boots'])
                    ->has(
                        Category::factory()->state(['title' => 'New in', 'slug' => 'shoes-boots-new-in']),
                        'children'
                    )
                    ->has(
                        Category::factory()->state(['title' => 'Sale', 'slug' => 'shoes-boots-sale']),
                        'children'
                    ),
                'children'
            )
            ->has(
                Category::factory()->state(['title' => 'Formal', 'slug' => 'formal']),
                'children'
            )
            ->create([
                'title' => 'Shoes',
                'slug' => 'shoes'
            ]);

        Category::factory()
            ->has(
                Category::factory()->state(['title' => 'Outdoor', 'slug' => 'outdoor'])
                    ->has(
                        Category::factory()->state(['title' => 'New in', 'slug' => 'jackets-outdoor-new-in']),
                        'children'
                    )
                    ->has(
                        Category::factory()->state(['title' => 'Sale', 'slug' => 'jackets-outdoor-sale']),
                        'children'
                    ),
                'children'
            )
            ->has(
                Category::factory()->state(['title' => 'Winter', 'slug' => 'jackets-winter']),
                'children'
            )
            ->create([
                'title' => 'Jackets',
                'slug' => 'jackets'
            ]);
    }
}
