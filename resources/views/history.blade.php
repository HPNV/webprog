@extends('layouts.app')

@section('title', 'Booking History')

@section('content')
    <div class="relative bg-gradient-to-r from-blue-700 to-primary h-64">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl font-bold">Your Booking History</h1>
        </div>
    </div>

    <section class="container mx-auto p-6 md:flex md:space-x-6 mt-8">
        <div class="md:w-full bg-white p-6 rounded-lg shadow-lg">
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
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-left bg-gradient-to-r from-gray-100 to-white rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 text-xl font-medium text-gray-700">Place</th>
                                <th class="py-2 px-4 text-xl font-medium text-gray-700">Hotel</th>
                                <th class="py-2 px-4 text-xl font-medium text-gray-700">Room</th>
                                <th class="py-2 px-4 text-xl font-medium text-gray-700">Check-in Date</th>
                                <th class="py-2 px-4 text-xl font-medium text-gray-700">Check-out Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $book->place->name }}</td>
                                    <td class="py-2 px-4">{{ $book->hotel->name }}</td>
                                    <td class="py-2 px-4">{{ $book->room->name }}</td>
                                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($book->date)->format('d-m-Y') }}</td>
                                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($book->date)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection
