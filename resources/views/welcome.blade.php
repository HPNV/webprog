@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="bg-gradient-to-r from-blue-600 to-primary text-white p-8 mb-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">Explore Amazing Places!</h1>
        <p class="mb-4">Discover the best destinations you can visit. Check out our recommendations below!</p>
        <a href="#places" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors duration-300">See Places</a>
    </div>

    <section id="places" class="mb-8">
        <div class="flex flex-col md:flex-row items-center mb-6 px-4">
            <h2 class="text-gray-900 text-2xl font-semibold mb-4 md:mb-0">Recommended Places to Go</h2>
        </div>

        <div id="placesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
            @foreach($randomPlaces as $place)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                    <img src="{{ $place->imagePath }}" alt="{{ $place->name }}" class="w-full h-48 object-cover rounded-t-lg">

                    <div class="p-6">
                        <h3 class="font-bold text-lg place-name text-gray-900">{{ $place->name }}</h3>
                        <p class="text-gray-600">{{ $place->description }}</p>
                        <a href="{{ route('places.show', $place->placeId) }}" class="text-blue-600 hover:underline">Learn More</a>
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

        <div id="placesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach($places as $place)
                <div class="place-card bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                    <img src="{{ $place->imagePath }}" alt="{{ $place->name }}" class="w-full h-48 object-cover rounded-t-lg">

                    <div class="p-6">
                        <h3 class="font-bold text-lg place-name text-gray-900">{{ $place->name }}</h3>
                        <p class="text-gray-600">{{ $place->description }}</p>
                        <a href="{{ route('places.show', $place->placeId) }}" class="text-blue-600 hover:underline">Learn More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function filterPlaces() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const placeCards = document.getElementsByClassName('place-card');

            for (let i = 0; i < placeCards.length; i++) {
                const placeName = placeCards[i].getElementsByClassName('place-name')[0].innerText.toLowerCase();

                if (placeName.includes(input)) {
                    placeCards[i].style.display = "";
                } else {
                    placeCards[i].style.display = "none";
                }
            }
        }

        filterPlaces();
    </script>
@endsection
