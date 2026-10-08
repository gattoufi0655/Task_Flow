@props(['title'=>null])

<div class="card">

    @if($title)
    <h3>{{ $title }}</h3>
    @endif

    {{ $slot }}

</div>