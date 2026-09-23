<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} | Books</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6">
            <nav class="flex gap-4 text-sm font-medium" aria-label="Primary navigation">
                <a href="{{ route('authors.index') }}" class="text-blue-600 hover:underline">Authors</a>
                <a href="{{ route('books.index') }}" class="text-blue-600 hover:underline">Books</a>
            </nav>
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-gray-600 hover:underline">Back to books</a>
        </div>
    </header>

    <main class="mx-auto max-w-4xl px-4 py-8">
        <article class="rounded-lg border bg-white p-6 shadow-sm sm:p-8">
            <p class="text-sm font-medium uppercase tracking-wide text-blue-600">Book details</p>
            <h1 class="mt-2 text-3xl font-bold">{{ $book->title }}</h1>
            <dl class="mt-6 border-t pt-6 text-sm">
                <div class="flex justify-between gap-4 py-2">
                    <dt class="font-medium text-gray-500">Author</dt>
                    <dd>{{ $book->author?->name ?? 'Unknown author' }}</dd>
                </div>
                <div class="flex justify-between gap-4 py-2">
                    <dt class="font-medium text-gray-500">Publish date</dt>
                    <dd>{{ $book->publish_date }}</dd>
                </div>
            </dl>
        </article>
    </main>
</body>
</html>