<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

// Categories
Category::create([
    "name" => "Life Cycle",
    "description" => "Exploring the stages and phenomena of life across the globe."
]);
Category::create([
    "name" => "Ancient Mysteries",
    "description" => "Diving into the secrets of ancient civilizations and their legacies."
]);
Category::create([
    "name" => "Technology Innovations",
    "description" => "The cutting edge of technology and its impact on our future."
]);

// Users
User::create([
    "name" => "Alice Johnson",
    "email" => "alice.johnson@example.com",
    "password" => bcrypt('placeholderPassword')
]);
User::create([
    "name" => "Bob Smith",
    "email" => "bob.smith@example.com",
    "password" => bcrypt('placeholderPassword')
]);
User::create([
    "name" => "Charlie Davis",
    "email" => "charlie.davis@example.com",
    "password" => bcrypt('placeholderPassword')
]);
User::create([
    "name" => "Dana Lee",
    "email" => "dana.lee@example.com",
    "password" => bcrypt('placeholderPassword')
]);
User::create([
    "name" => "Evan Wright",
    "email" => "evan.wright@example.com",
    "password" => bcrypt('placeholderPassword')
]);

// Posts
Post::create([
    "user_id" => 1,
    "category_id" => 1,
    "title" => "The Art of Coffee Making",
    "slug" => "the-art-of-coffee-making",
    "description" => "Discover the intricate process behind your morning brew, from bean selection to the perfect pour. Coffee making is not just a routine, but an art form that requires patience and skill."
]);
Post::create([
    "user_id" => 2,
    "category_id" => 2,
    "title" => "Mysteries of the Ancient World",
    "slug" => "mysteries-ancient-world",
    "description" => "Unravel the secrets of ancient civilizations, their monuments, and their downfall. From the pyramids of Egypt to the lost city of Atlantis, explore the mysteries that have puzzled historians for centuries."
]);
Post::create([
    "user_id" => 3,
    "category_id" => 3,
    "title" => "The Future of Artificial Intelligence",
    "slug" => "future-artificial-intelligence",
    "description" => "AI is shaping the future of technology, but how will it affect our lives? Delve into the potentials and challenges of artificial intelligence in the modern world."
]);
Post::create([
    "user_id" => 4,
    "category_id" => 1,
    "title" => "Gardening: A Path to Wellness",
    "slug" => "gardening-path-wellness",
    "description" => "Gardening isn't just about beautifying your outdoor space. It's a journey towards personal wellness, offering physical and mental health benefits."
]);
Post::create([
    "user_id" => 5,
    "category_id" => 2,
    "title" => "Exploring the Ruins of Machu Picchu",
    "slug" => "exploring-ruins-machu-picchu",
    "description" => "Machu Picchu stands as a testament to the ingenuity of the Inca civilization. Join us as we explore the history and mystery of this ancient wonder."
]);
Post::create([
    "user_id" => 1,
    "category_id" => 3,
    "title" => "Breaking Down Blockchain",
    "slug" => "breaking-down-blockchain",
    "description" => "Blockchain technology is more than just Bitcoin. Discover how it's shaping the future of digital transactions and security."
]);
Post::create([
    "user_id" => 2,
    "category_id" => 1,
    "title" => "Urban Farming: The Future of Food?",
    "slug" => "urban-farming-future-food",
    "description" => "With growing urban populations, could urban farming be the solution to the world's food crisis? Explore the benefits and challenges."
]);
Post::create([
    "user_id" => 3,
    "category_id" => 2,
    "title" => "The Lost Libraries of Timbuktu",
    "slug" => "lost-libraries-timbuktu",
    "description" => "The ancient manuscripts of Timbuktu offer a glimpse into a rich history of knowledge and culture. What can they teach us today?"
]);
Post::create([
    "user_id" => 4,
    "category_id" => 3,
    "title" => "Robots and Relationships: The Future of AI Companions",
    "slug" => "robots-relationships-future-ai",
    "description" => "As AI technology evolves, the prospect of AI companions becomes more realistic. What does this mean for human relationships and society?"
]);
Post::create([
    "user_id" => 5,
    "category_id" => 1,
    "title" => "The Psychology of Color in Marketing",
    "slug" => "psychology-color-marketing",
    "description" => "Color significantly influences consumer behavior. Explore how marketers use color psychology to influence buying decisions."
]);

    }
}
