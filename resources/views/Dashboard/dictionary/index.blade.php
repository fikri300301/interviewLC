@extends('layouts.mainlayouts')

@section('title', 'dashboard')

@section('content')

<h1>Dictionary</h1>

<div class="container">
    <form id="my_form" onsubmit="myFunction()" method="POST" action="">
        @csrf
        <input type="text" name="word" required>
        <input type="submit" value="Search">
    </form>
</div>

<div>
    <h1>hasil</h1>
    @if (isset($meanings['word']) && isset($meanings['meanings']))
        <h2>Meanings for "{{ $meanings['word'] }}"</h2>
        <ul>
            @foreach ($meanings['meanings'] as $meaning)
                <li>
                    <strong>Definitions:</strong>
                    <ul>
                        <li>{{ $meaning['definition'] }}</li>
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>No meanings found.</p>
    @endif
</div>

@endsection
