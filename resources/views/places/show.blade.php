@extends('layouts.app')

@section('title', $place->name)

@section('content')
    <div class="relative bg-gradient-to-r from-blue-700 to-primary h-96">
        <img src="{{ $place->imagePath }}" alt="{{ $place->name }}" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl font-bold">{{ $place->name }}</h1>
            <p class="text-xl mt-2">{{ $place->tagline }}</p>
        </div>
    </div>

    <section class="container mx-auto p-6 md:flex md:space-x-6 mt-8">
        <div class="md:w-2/3">
            <h2 class="text-3xl font-semibold text-gray-900 mb-6">About {{ $place->name }}</h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-8">{{ $place->description }}</p>

            <h3 class="text-2xl font-semibold text-gray-900 mb-6">Gallery</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($place->galleryImages as $image)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <img src="{{ $image }}" alt="Gallery Image" class="w-full h-full object-cover transition duration-500 group-hover:opacity-80 cursor-pointer" onclick="openModal('{{ $image }}')">
                    </div>
                @endforeach
            </div>
        </div>

        <div id="imageModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden z-50">
            <div class="relative max-w-xl bg-white rounded-lg p-6">
                <button type="button" class="absolute top-2 right-2 rounded-full bg-white text-gray-500 p-2" onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <img id="modalImage" src="" alt="Modal Image" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>

        <script>
            function openModal(imageUrl) {
                document.getElementById('modalImage').src = imageUrl;
                document.getElementById('imageModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('imageModal').classList.add('hidden');
            }
        </script>

        <div class="md:w-1/3 mt-8 md:mt-0 bg-gray-50 p-6 rounded-lg shadow-xl">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Details</h3>
            <div class="mb-8">
                <p class="text-gray-700 text-lg mb-2"><strong>📍 Location:</strong> {{ $place->location }}</p>
                <p class="text-gray-700 text-lg mb-2"><strong>⭐ Rating:</strong> {{ $place->rating }} / 5</p>
                <p class="text-gray-700 text-lg"><strong>📂 Category:</strong> {{ $place->category }}</p>
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Location Map</h3>
            <div class="h-64 bg-gray-200 rounded-lg shadow-inner">
                    <img src="{{ $place->mapImage }}" alt="Map" class="w-full h-full object-cover rounded-lg">
            </div>

            <div class="mt-8">
                <a href="{{ route('places.book', ['placeId' => $place->placeId]) }}" class="w-full bg-orange-500 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-orange-600 transition duration-300 block text-center">
                    Book Now
                </a>
            </div>
        </div>
    </section>
@endsection