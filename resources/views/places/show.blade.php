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
            <h2 class="text-4xl font-semibold text-gray-900 mb-6">About {{ $place->name }}</h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-8">{{ $place->description }}</p>

            <h3 class="text-3xl font-semibold text-gray-900 mb-6">Gallery</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($place->galleryImages as $image)
                    <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <img src="{{ $image }}" alt="Gallery Image" class="w-full h-full object-cover transition duration-500 group-hover:opacity-80 cursor-pointer" onclick="openModal('{{ $image }}')">
                    </div>
                @endforeach
            </div>
        </div>

        <div id="imageModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-70 hidden z-50">
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

        <div class="md:w-1/3 mt-8 md:mt-0 bg-white p-6 rounded-lg shadow-xl">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Details</h3>
            <div class="mb-8">
                <p class="text-gray-700 text-lg mb-2"><strong>📍 Location:</strong> {{ $place->address }}</p>
                <p class="text-gray-700 text-lg mb-2"><strong>⭐ Rating:</strong> {{ $place->rating }} / 5</p>
                <p class="text-gray-700 text-lg"><strong>📂 Category:</strong> {{ $place->description }}</p>
            </div>

            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Location Map</h3>
            <div class="h-64 bg-gray-200 rounded-lg shadow-inner overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509123!2d144.9537353153165!3d-37.81627997975157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11f3b3%3A0x5045675218ceed30!2sBinus%20University!5e0!3m2!1sen!2sus!4v1616161616161!5m2!1sen!2sus" 
                    width="100%" 
                    height="100%" 
                    frameborder="0" 
                    style="border:0;" 
                    allowfullscreen 
                    loading="lazy">
                </iframe>
            </div>

            <div class="mt-8">
                <a href="{{ route('places.book', ['placeId' => $place->placeId]) }}" class="w-full bg-blue-500 text-white py-3 px-6 rounded-lg text-lg font-semibold text-center hover:bg-blue-600 transition duration-300 block text -center">
                    Book Now
                </a>
            </div>
        </div>
    </section>
@endsection
