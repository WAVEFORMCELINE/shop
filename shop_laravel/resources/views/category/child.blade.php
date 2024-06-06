<li>
    {{ $child->name }}
    @if($child->children->isNotEmpty())
        <ul>
            @foreach($child->children as $child)
                @include('category.child', ['child' => $child])
            @endforeach
        </ul>
    @endif
</li>