<div class="bg-white rounded-xl p-4 text-center shadow">

    <h4 class="font-semibold">{{ $brand->name }}</h4>

    <p class="text-sm text-gray-500">
        {{ optional($brand->locations->first())->address }}
    </p>

    <span class="text-sm font-bold
        {{ $brand->halal_status === 'Active' ? 'text-green-600' : 'text-red-600' }}">
        {{ $brand->halal_status }}
    </span>

    <a href="{{ route('brand.show', $brand->id) }}"
       class="block mt-3 bg-[#7a1f1f] text-white py-1 rounded">
        Go
    </a>
</div>
