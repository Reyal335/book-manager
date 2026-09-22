<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>Books</h1>
    </header>

    <main>
        <section>
            <h2 id="books-heading">All Books</h2>

            @if ($books->isEmpty())
                <p>No books found.</p>
            @else
                <ul>
                    @foreach ($books as $book)
                        <li>
                            <article>
                                <a href="{{ url('/book/' . $book['id']) }}">
                                    <h3>{{ $book['title'] }}</h3>
                                    <p>Author: {{ $book['author'] }}</p>
                                </a>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</body>
</html>