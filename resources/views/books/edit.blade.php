<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Book</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-4 py-6">
            <h1 class="text-3xl font-bold">Edit book</h1>
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-blue-600 hover:underline">
                Back to books
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-3xl px-4 py-8">
        <form id="book-edit-form" method="POST" action="{{ route('books.update', $book) }}" class="space-y-6 rounded-lg border bg-white p-6 shadow-sm">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required autofocus class="mt-2 block w-full rounded border px-3 py-2">
            </div>

            <div>
                <label for="author_id" class="block text-sm font-medium">Author</label>
                <select id="author_id" name="author_id" required class="mt-2 block w-full rounded border px-3 py-2">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id) == $author->id)>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="publish_date" class="block text-sm font-medium">Publish date</label>
                <input type="date" id="publish_date" name="publish_date" value="{{ old('publish_date', $book->publish_date) }}" required class="mt-2 block w-full rounded border px-3 py-2">
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Save changes</button>
                <a href="{{ route('books.index') }}" class="text-sm font-medium text-gray-600 hover:underline">Cancel</a>
            </div>

            <p id="book-edit-message" class="text-sm" role="status"></p>
        </form>
    </main>

    <script>
        document.getElementById('book-edit-form').addEventListener('submit', async function (event) {
            event.preventDefault();

            const form = event.currentTarget;
            const message = document.getElementById('book-edit-message');
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: new FormData(form)
            });

            const data = await response.json();
            message.textContent = data.message || 'The book could not be updated.';
            message.className = response.ok ? 'text-sm text-green-600' : 'text-sm text-red-600';
        });
    </script>
</body>
</html>
