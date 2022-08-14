@if (isset($selectedBy))
    @foreach ($categories as $index => $category)
        <option {{ $selectedBy->categories->contains($category) ? 'selected' : '' }} value="{{ $category->id }}">
            {{ $index + 1 . '. ' . $category->name }}</option>
        @if ($category->categories->count())
            @foreach ($category->categories as $indexChild => $categoryChild)
                <option {{ $selectedBy->categories->contains($categoryChild) ? 'selected' : '' }} value="{{ $categoryChild->id }}">
                    {{ $index + 1 . '.' . ($indexChild + 1) . '. ' . $categoryChild->name }}
                </option>
            @endforeach
        @endif
    @endforeach
@else
    @foreach ($categories as $index => $category)
        <option value="{{ $category->id }}">{{ $index + 1 . '. ' . $category->name }}</option>
        @if ($category->categories->count())
            @foreach ($category->categories as $indexChild => $categoryChild)
                <option value="{{ $categoryChild->id }}">
                    {{ $index + 1 . '.' . ($indexChild + 1) . '. ' . $categoryChild->name }}
                </option>
            @endforeach
        @endif
    @endforeach
@endif
