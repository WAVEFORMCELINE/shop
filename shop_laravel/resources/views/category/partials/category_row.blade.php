<tr>
    <td>
        <span class="expandable" style="margin-left: {{ $level * 20 }}px;">
             <a href="{{ route('category.show', $category->id) }}"> — {{ $category->name }}</a>
        </span>
    </td>
</tr>
@if($category->children->isNotEmpty())
    @foreach($category->children as $child)
        <tr class="child-row" style="display: none;">
            @include('category.partials.category_row', ['category' => $child, 'level' => $level + 1])
        </tr>
    @endforeach
@endif