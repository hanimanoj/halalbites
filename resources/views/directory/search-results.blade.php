@forelse($brands as $brand)
<div class="search-item"
     onclick="window.location='{{ route('directory.show', $brand->slug) }}'">
    <img src="{{ asset($brand->logo) }}">
    <div class="search-info">
        <h4>{{ $brand->name }}</h4>
        <p>{{ $brand->locations->first()->address ?? '' }}</p>
    </div>
</div>
@empty
<p class="search-empty">No results found</p>
@endforelse
