@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <section id="places" class="mb-8">
        <div class="flex flex-col md:flex-row items-center mb-6 px-4">
            <h2 class="text-gray-900 text-2xl font-semibold mb-4 md:mb-0">Recommended Places to Go</h2>
        </div>

        <div id="recommendedPlacesGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 px-2">
            @foreach($randomPlaces as $place)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                    <div class="relative">
                        <img src="{{ $place->imagePath }}" alt="{{ $place->name }}" class="w-full h-64 object-cover"/>
                    </div>

                    <div class="p-5 space-y-4 text-center">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">{{ $place->name }}</h3>
                            <p class="text-gray-500 mt-1">{{ $place->description }}</p>
                        </div>

                        <a href="{{ route('places.show', $place->placeId) }}" 
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition-colors text-center block">
                            Learn More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="all-places" class="mb-8">
        <div class="flex flex-col md:flex-row items-center mb-6 px-4">
            <h2 class="text-gray-900 text-2xl font-semibold mb-4 md:mb-0">All Places</h2>

            <div class="w-full md:w-1/2 lg:w-1/3 ml-5">
                <input
                    type="text"
                    id="searchInput"
                    class="p-3 border border-gray-300 rounded w-full shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    placeholder="Search for places..."
                    onkeyup="filterPlaces()">
            </div>
        </div>

        <div id="allPlacesGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 px-2">
            @foreach($places as $place)
                <div class="place-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                    <div class="relative">
                        <img src="{{ $place->imagePath }}" alt="{{ $place->name }}" class="w-full h-64 object-cover"/>
                    </div>

                    <div class="p-5 space-y-4 text-center">
                        <div>
                            <h3 class="place-name text-xl font-bold text-gray-900">{{ $place->name }}</h3>
                            <p class="text-gray-500 mt-1">{{ $place->description }}</p>
                        </div>

                        <a href="{{ route('places.show', $place->placeId) }}" 
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition-colors text-center block">
                            Learn More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function filterPlaces() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const placeCards = document.querySelectorAll('#allPlacesGrid .place-card');

            placeCards.forEach(card => {
                const placeName = card.querySelector('.place-name').innerText.toLowerCase();
                if (placeName.includes(input)) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>
@endsection