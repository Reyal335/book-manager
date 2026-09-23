<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-4 py-6">
            <h1 class="text-3xl font-bold">Add book</h1>
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-blue-600 hover:underline">
                Back to books
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-3xl px-4 py-8">
        @if ($errors->any())
            <div class="mb-6 rounded border border-red-200 bg-red-50 p-4 text-sm text-red-700" role="alert">
                <p class="font-medium">Please correct the following errors:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('books.store') }}" class="space-y-6 rounded-lg border bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    autofocus
                    class="mt-2 block w-full rounded border px-3 py-2"
                >
            </div>

            <div>
                <label for="author_id" class="block text-sm font-medium">Author</label>
                <select
                    id="author_id"
                    name="author_id"
                    required
                    class="mt-2 block w-full rounded border px-3 py-2"
                >
                    <option value="">Select an author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" @selected(old('author_id') == $author->id)>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="publish_date" class="block text-sm font-medium">Publish date</label>
                <input
                    type="date"
                    id="publish_date"
                    name="publish_date"
                    value="{{ old('publish_date') }}"
                    required
                    class="mt-2 block w-full rounded border px-3 py-2"
                >
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    Create book
                </button>
                <a href="{{ route('books.index') }}" class="text-sm font-medium text-gray-600 hover:underline">
                    Cancel
                </a>
            </div>
        </form>
    </main>
</body>
</html>