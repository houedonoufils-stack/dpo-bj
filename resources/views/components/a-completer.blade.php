@props(['valeur'])

@if (filled($valeur))
    {{ $valeur }}
@else
    <span class="a-completer">à compléter</span>
@endif