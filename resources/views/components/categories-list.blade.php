<div class="btn-group mb-4 d-flex" role="group" aria-label="Basic outlined example">
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @foreach($categoriesList as $category)
        <a href="{{route('getPostsByCategory', $category->slug)}}" class="btn btn-outline-primary">{{$category->title}}</a>
    @endforeach
</div>
