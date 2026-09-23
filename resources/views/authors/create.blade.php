<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Author</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-4 py-6">
            <h1 class="text-3xl font-bold">Add author</h1>
            <a href="{{ route('authors.index') }}" class="text-sm font-medium text-blue-600 hover:underline">
                Back to authors
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

        <form id="author-form" class="space-y-6 rounded-lg border bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="mt-2 block w-full rounded border px-3 py-2"
                >
            </div>

            <div>
                <label for="birth_date" class="block text-sm font-medium">Birth date</label>
                <input
                    type="date"
                    id="birth_date"
                    name="birth_date"
                    value="{{ old('birth_date') }}"
                    required
                    class="mt-2 block w-full rounded border px-3 py-2"
                >
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    Create author
                </button>
                <a href="{{ route('authors.index') }}" class="text-sm font-medium text-gray-600 hover:underline">
                    Cancel
                </a>
            </div>

            <p id="author-message"></p>
        </form>
    </main>
    <script>
        document.getElementById('author-form')
            .addEventListener('submit', async function (event) {
                event.preventDefault();

                const form = event.currentTarget;
                const response = await fetch('{{ route('authors.store') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .content
                    },
                    body: new FormData(form)
                });

                const data = await response.json()

                if (!response.ok) {
                    document.getElementById('author-message').textContent =
                        data.message || 'The author could not be created.';

                    return;
                }

                document.getElementById('author-message').textContent = data.message;
                form.reset();
            })
    </script>
</body>
</html>