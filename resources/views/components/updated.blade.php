<p class="test-muted">
    {{ empty(trim($slot))?'Addded' : $slot }} {{ $date->diffForHumans()}}
    @if (isset($name))
        by{{ $name }}
    @endif
</p>
