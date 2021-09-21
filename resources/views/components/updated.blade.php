<p class="test-muted">
    {{ empty(trim($slot))?'Addded' : $slot }} {{ $date->diffForHumans()}}
    @if (isset($name))
        @if(isset($userId))
            by <a href="{{ route('users.show', ['user' => $userId]) }}">{{ $name }}</a>
        @else
            by{{ $name }}
        @endif
    @endif
</p>
