@extends('layouts.app')

@section('content')
<section class="saved">
    <!-- SAVED SECTION -->
<div class="container">
    <h1>Saved</h1>
    <p>Lets bookmark and view your favourite halal-certified places you plan to visit.</p>

    <div class="card-row">
        @foreach($savedPlaces as $place)
        <div class="card">
            <img src="{{ asset('images/'.$place['image']) }}">
            <div class="card-body">
                <h4>{{ $place['name'] }}</h4>
                <p>{{ $place['location'] }}</p>
                <div class="card-footer">

                    <!-- View button -->
                    <button class="btn-view">View</button>

                    <!-- Saved button AJAX -->
                    <button class="btn-saved" data-id="{{ $place->id }}">
                        {{ $place['is_saved'] ? 'Saved' : 'Save' }}
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>

</section>
@endsection

<script>
document.querySelectorAll('.btn-saved').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();
        let placeId = this.dataset.id;
        let self = this;

        fetch(`/toggle-save/${placeId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
            // Tukar text button ikut status baru
            self.textContent = data.saved ? 'Saved' : 'Save';
        })
        .catch(err => console.error(err));
    });
});
</script>


<script>
const searchBtn = document.getElementById('searchBtn');
const searchModal = document.getElementById('searchModal');
const closeSearch = document.getElementById('closeSearch');
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

searchBtn.addEventListener('click', () => {
  searchModal.style.display = 'flex';
  searchInput.focus();
});

closeSearch.addEventListener('click', () => {
  searchModal.style.display = 'none';
  searchInput.value = '';
  searchResults.innerHTML = '';
});

// Optional: click outside modal to close
window.addEventListener('click', (e) => {
  if(e.target == searchModal) {
    searchModal.style.display = 'none';
    searchInput.value = '';
    searchResults.innerHTML = '';
  }
});

// Simple search logic (for demo, you can fetch from backend)
searchInput.addEventListener('input', async () => {
  const query = searchInput.value.trim();
  if(query.length < 1){
    searchResults.innerHTML = '';
    return;
  }

  // Fetch from backend route (example)
  const res = await fetch(`/search-restaurants?q=${query}`);
  const data = await res.json();

  searchResults.innerHTML = data.map(r => `<li>${r.name}</li>`).join('');
});

</script>
