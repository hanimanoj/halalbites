@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow mt-6">

    <h2 class="text-2xl font-bold mb-4">{{ $brand->name }}</h2>

    <div class="grid grid-cols-2 gap-4">
        <p><b>Company :</b> {{ $brand->company_name }}</p>
        <p><b>Operating Hours :</b> {{ $brand->operating_hours }}</p>
        <p><b>JAKIM Ref. No. :</b> {{ $brand->jakim_ref_no }}</p>
        <p><b>Expiry Year :</b> {{ $brand->expiry_year }}</p>
        <p>
            <b>Status :</b>
            @if($brand->expiry_year >= now()->year)
                <span class="text-green-600 font-bold">Active</span>
            @else
                <span class="text-red-600 font-bold">Expired</span>
            @endif
        </p>
    </div>

</div>
@endsection
