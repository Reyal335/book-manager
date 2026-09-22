<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Books>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => rtrim(fake()->sentence(3), '.'),
            'author_id' => function () {
                return Author::inRandomOrder()->first()?->id ?? Author::create()->id;
            },
            'publish_date' => function (array $attributes) {
                $author = Author::find($attributes['author_id']);

                return fake()->dateTimeBetween($author->birth_date, 'now')->format('Y-m-d');
            }
        ];
    }
}
