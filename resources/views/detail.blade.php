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
            <h2 class="text-3xl font-semibold text-gray-900 mb-4">About {{ $place->name }}</h2>
            <p class="text-gray-600 leading-relaxed mb-6">{{ $place->description }}</p>
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Gallery</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($place->galleryImages as $image)
                    <img src="{{ $image }}" alt="Gallery Image" class="rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                @endforeach
            </div>
        </div>

        <div class="md:w-1/3 mt-8 md:mt-0 bg-white p-6 rounded-lg shadow-lg">
            <div class="mb-6">
                <button class="w-full bg-orange-500 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-orange-600 transition duration-300">Book Now</button>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Details</h3>
                <p class="text-gray-600 mb-2"><strong>Location:</strong> {{ $place->location }}</p>
                <p class="text-gray-600 mb-2"><strong>Rating:</strong> {{ $place->rating }} / 5</p>
                <p class="text-gray-600 mb-2"><strong>Category:</strong> {{ $place->category }}</p>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Location Map</h3>
                <div class="h-64 bg-gray-200 rounded-lg shadow-inner">
                    <img src="{{ $place->mapImage }}" alt="Map" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto p-6 mt-8 bg-gray-100 rounded-lg shadow-lg">
        <h3 class="text-2xl font-semibold text-gray-900 mb-6">User Reviews</h3>

        @foreach($place->reviews as $review)
            <div class="bg-white p-4 rounded-lg mb-4 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="font-semibold text-gray-900">{{ $review->user }}</h4>
                    <span class="text-sm text-gray-600">{{ $review->date }}</span>
                </div>
                <p class="text-gray-600 mb-2">{{ $review->text }}</p>
                <span class="text-yellow-500">{{ str_repeat('★', $review->rating) }}</span>
            </div>
        @endforeach

        <div class="mt-6">
            <h4 class="text-xl font-semibold text-gray-900 mb-4">Leave a Review</h4>
            <textarea class="w-full p-4 border border-gray-300 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary" rows="4" placeholder="Write your review..."></textarea>
            <button class="mt-4 bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Submit</button>
        </div>
    </section>

@endsection
