<nav class="my-3 nav">
    @php
        $categories = App\Models\Admin\Category::orderBy('category_name', 'ASC')->limit(7)->get();
    @endphp

    <li class="nav-item"><a href="{{ url("/") }}" class="nav-link text-nowrap">Home</a></li>
    @foreach ($categories as $category )
        <li class="nav-item dropdown"><a href="#" class="nav-link text-nowrap " data-bs-toggle="dropdown"> {{ $category->category_name }} </a>
            @php
              $subcategories = App\Models\Admin\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name', 'ASC')->get();
            @endphp

            <ul class="dropdown-menu">
              @foreach ($subcategories as $subcategory )
                  <li><a class="dropdown-item" href="#">{{ $subcategory->subcategory_name }}</a></li>
              @endforeach
            </ul>
        </li>
    @endforeach
</nav>
