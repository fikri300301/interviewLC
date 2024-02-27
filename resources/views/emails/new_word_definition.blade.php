{{-- <p>Word: {{ $word }}</p>
@foreach ($definitions as $definition)
    <p>Definition: {{ $definition }}</p>
@endforeach --}}

<p>Word: {{ $word }}</p>
@if (!is_null($definitions))
    @foreach ($definitions as $definition)
        <p>Definition: {{ $definition }}</p>
    @endforeach
@else
    <p>No definitions found.</p>
@endif