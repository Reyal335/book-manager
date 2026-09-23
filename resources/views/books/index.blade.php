<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Books</title>

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
            <a href="{{ route('books.create') }}" class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Add book
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-8">
        <section aria-labelledby="books-heading">
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-wide text-blue-600">Book Manager</p>
                    <h1 class="mt-1 text-3xl font-bold">Books</h1>
                </div>
                <p class="hidden text-sm text-gray-500 sm:block">Browse your book library</p>
            </div>
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 id="books-heading" class="text-2xl font-semibold">All Books</h2>

                <form method="GET" action="{{ route('books.index') }}" class="flex gap-2">
                    <label for="book-search" class="sr-only">Search books</label>
                    <input
                        type="search"
                        id="book-search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search books"
                        class="rounded border px-3 py-2 text-sm"
                    >
                    <button type="submit" class="rounded bg-gray-800 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                        Search
                    </button>
                </form>
            </div>

            @if ($books->isEmpty())
                <p class="rounded border bg-white p-6 text-gray-600">No books found.</p>
            @else
                <ul class="grid gap-4">
                    @foreach ($books as $book)
                        <li>
                            <article class="rounded-lg border bg-white p-5 shadow-sm">
                                <header>
                                    <h3 class="text-xl font-semibold">{{ $book->title }}</h3>
                                </header>

                                <dl class="mt-4 space-y-2 text-sm text-gray-600">
                                    <div>
                                        <dt class="inline font-medium text-gray-900">Author:</dt>
                                        <dd class="inline">{{ $book->author_name ?? 'Unknown author' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="inline font-medium text-gray-900">Published:</dt>
                                        <dd class="inline">
                                            <time datetime="{{ $book->publish_date }}">
                                                {{ $book->publish_date }}
                                            </time>
                                        </dd>
                                    </div>
                                </dl>
                                <div>
                                    <a href="{{ route('books.show', $book->id) }}" class="mt-4 inline-block text-sm font-medium text-blue-600 hover:underline">
                                        View book
                                    </a>                                    
                                </div>
                                <div class="mt-4 flex gap-2">
                                    <button type="button" class="rounded bg-gray-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-600">
                                        Update
                                    </button>
                                    <button
                                        type="button"
                                        class="delete-book rounded bg-red-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-600"
                                        data-url="{{ route('books.destroy', $book) }}"
                                    >
                                        Delete
                                    </button>
                                </div>

                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
    <script>
        document.addEventListener('click', async function (event) {
            if (!event.target.matches('.delete-book')) {
                return;
            }

            if (!confirm('Delete this book?')) {
                return;
            }

            const button = event.target;
            const response = await fetch(button.dataset.url, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) {
                alert('The book could not be deleted.');
                return;
            }

            button.closest('li').remove();
        });
    </script>
</body>
</html>