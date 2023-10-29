@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'validate-list']) }}>
        @foreach ((array) $messages as $message)
            <li {{ $attributes->merge(['class' => 'text-danger']) }}>{{ $message }}</li>
        @endforeach
    </ul>
@endif
