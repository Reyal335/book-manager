<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $author->name }} | Authors</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6">
            <nav class="flex gap-4 text-sm font-medium" aria-label="Primary navigation">
                <a href="{{ route('authors.index') }}" class="text-blue-600 hover:underline">Authors</a>
                <a href="{{ route('books.index') }}" class="text-blue-600 hover:underline">Books</a>
            </nav>
            <a href="{{ route('authors.index') }}" class="text-sm font-medium text-gray-600 hover:underline">Back to authors</a>
        </div>
    </header>

    <main class="mx-auto max-w-4xl px-4 py-8">
        <article class="rounded-lg border bg-white p-6 shadow-sm sm:p-8">
            <p class="text-sm font-medium uppercase tracking-wide text-blue-600">Author profile</p>
            <h1 class="mt-2 text-3xl font-bold">{{ $author->name }}</h1>
            <dl class="mt-6 border-t pt-6 text-sm">
                <div class="flex justify-between gap-4 py-2">
                    <dt class="font-medium text-gray-500">Birth date</dt>
                    <dd>{{ $author->birth_date }}</dd>
                </div>
            </dl>
        </article>

        <section class="mt-8" aria-labelledby="author-books-heading">
            <h2 id="author-books-heading" class="text-2xl font-semibold">Books by {{ $author->name }}</h2>
            @if ($author->books->isEmpty())
                <p class="mt-4 rounded-lg border bg-white p-6 text-gray-600">No books found for this author.</p>
            @else
                <ul class="mt-4 grid gap-4 sm:grid-cols-2">
                    @foreach ($author->books as $book)
                        <li class="rounded-lg border bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                            <a href="{{ route('books.show', $book->id) }}" class="mt-3 inline-block text-sm font-medium text-blue-600 hover:underline">View book</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</body>
</html>
</body>
</html>