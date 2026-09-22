<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>Authors</h1>
    </header>

    <main>
        <section>
            <h2 id="authors-heading">All Authors</h2>

            @if ($authors->isEmpty())
                <p>No authors found.</p>
            @else
                <ul>
                    @foreach ($authors as $author)
                        <li>
                            <article>
                                <a href="{{ url('/author/' . $author['id']) }}">
                                    <h3>{{ $author['name'] }}</h3>
                                    <p>
                                        <span>Birth date:</span>
                                        <time datetime="{{ $author['birth_date'] }}">
                                            {{ $author['birth_date'] }}
                                        </time>
                                    </p>
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