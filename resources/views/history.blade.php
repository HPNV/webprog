@extends('layouts.app')

@section('title', 'Booking History')

@section('content')
    <div class="relative bg-gradient-to-r from-blue-700 to-primary h-64">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl font-bold">Your Booking History</h1>
        </div>
    </div>

    <section class="container mx-auto p-6 mt-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 border border-green-400 rounded-lg p-4 mb-6">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="bg-red-100 text-red-700 border border-red-400 rounded-lg p-4 mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if ($books->isEmpty())
                <div class="bg-gray-100 text-gray-700 border border-gray-300 rounded-lg p-6">
                    You have no bookings yet.
                </div>
            @else
                <div class="space-y-6">
                    @foreach ($books as $book)
                        <article class="flex items-start gap-6 p-6 rounded-xl border-2 border-gray-100 bg-white shadow-lg">
                            <a href="#" class="block shrink-0">
                                <img alt="{{ $book->place->name }}"src="{{ $book->place->image_url ?? 'https://via.placeholder.com/800x400' }}"class="w-64 h-48 rounded-lg object-cover"/>
                            </a>

                            <div class="flex flex-col justify-between w-full">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-800">
                                        <a href="#" class="hover:underline">{{ $book->place->name }}</a>
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-600">
                                        Hotel: {{ $book->hotel->name }}<br>
                                        Room: {{ $book->room->name }}
                                    </p>
                                    <p class="mt-4 text-sm text-gray-500">
                                        Check-in: {{ \Carbon\Carbon::parse($book->check_in)->format('d M Y') }}<br>
                                        Check-out: {{ \Carbon\Carbon::parse($book->check_out)->format('d M Y') }}
                                    </p>
                                </div>

                                <div class="flex justify-end mt-4">
                                    <strong class="-mb-[2px] -me-[2px] inline-flex items-center gap-1 rounded-ee-xl rounded-ss-xl bg-green-600 px-3 py-1.5 text-white">
                                        <svg xmlns="https://www.w3.org/2000/svg" class="h-4 w-4" fill="none"viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                        </svg>
                                        <span class="text-[10px] font-medium sm:text-xs">Booked!</span>
                                    </strong>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection