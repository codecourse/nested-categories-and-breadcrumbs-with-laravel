<div>
    <a href="{{ route('categories.show', $category) }}">{{ $category->title }}</a>

    <div class="pl-6">
        @foreach($category->children as $child)
            <x-category-item :category="$child" />
        @endforeach
    </div>
</div>
