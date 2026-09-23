<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6">
            <div class="flex items-center gap-6">
                <nav class="flex gap-4 text-sm font-medium" aria-label="Primary navigation">
                    <a href="{{ route('authors.index') }}" class="text-blue-600 hover:underline">Authors</a>
                    <a href="{{ route('books.index') }}" class="text-blue-600 hover:underline">Books</a>
                </nav>
            </div>
            <a href="{{ route('authors.create') }}" class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Add author
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-8">
        <section aria-labelledby="authors-heading">
            <div class="text-3xl font-bold">Authors</div>
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 id="authors-heading" class="text-2xl font-semibold">All Authors</h2>

                <form method="GET" action="{{ route('authors.index') }}" class="flex gap-2">
                    <label for="author-search" class="sr-only">Search authors</label>
                    <input
                        type="search"
                        id="author-search"
                        name="search"
                        value=""
                        placeholder="Search authors"
                        class="rounded border px-3 py-2 text-sm"
                    >
                    <button type="submit" class="rounded bg-gray-800 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                        Search
                    </button>
                </form>
            </div>

            @if ($authors->isEmpty())
                <p class="rounded border bg-white p-6 text-gray-600">No authors found.</p>
            @else
                <ul class="grid gap-4">
                    @foreach ($authors as $author)
                        <li>
                            <article class="rounded-lg border bg-white p-5 shadow-sm">
                                <h3 class="text-xl font-semibold">{{ $author['name'] }}</h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    Birth date: {{ $author['birth_date'] }}
                                </p>
                                <div>
                                    <a href="{{ route('authors.show', $author['id']) }}" class="mt-4 inline-block text-sm font-medium text-blue-600 hover:underline">
                                        View author
                                    </a>
                                </div>

                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</body>
</html>