@if (!is_null($posts) && count($posts) > 0)
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@else
    <p>No results found.</p>
@endif
