<nav class="my-3 nav">
    @php
        $categories = App\Models\Admin\Category::orderBy('category_name', 'ASC')->limit(7)->get();
    @endphp

    <li class="nav-item"><a href="{{ url("/") }}" class="nav-link text-nowrap">Home</a></li>
    @foreach ($categories as $category )
        @php
            $subcategories = App\Models\Admin\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name', 'ASC')->get();
        @endphp

        @if ($subcategories->count() > 0)
            <li class="nav-item dropdown">
                <a href="#" class="nav-link text-nowrap" data-bs-toggle="dropdown">
                    {{ $category->category_name }}
                </a>
                <ul class="dropdown-menu">
                    @foreach ($subcategories as $subcategory)
                        <li>
                            <a class="dropdown-item" href="{{ url('newspost/subcategory/'.$subcategory->id."/".$subcategory->subcategory_slug) }}">
                                {{ $subcategory->subcategory_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ url('newspost/category/'.$category->id."/".$category->category_slug) }}" class="nav-link text-nowrap">
                    {{ $category->category_name }}
                </a>
            </li>
        @endif
    @endforeach
</nav>
