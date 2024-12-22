@extends('layouts.app')

@section('title', 'Book Your Stay')

@section('content')
    <div class="relative bg-gradient-to-r from-blue-700 to-primary h-64">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl font-bold">Book Your Stay at {{ $place->name }}</h1>
        </div>
    </div>

    <section class="container mx-auto p-6 md:flex md:space-x-6 mt-8">
        <div class="md:w-2/3 bg-white p-6 rounded-lg shadow-lg">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 border border-green-400 rounded-lg p-4 mb-6">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="bg-red-100 text-red-700 border border-red-400 rounded-lg p-4 mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('places.book.submit', $place->placeId) }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="hotelId" class="block text-xl font-medium text-gray-900 mb-2">Select Hotel</label>
                    <select id="hotelId" name="hotelId" class="w-full p-3 border border-gray-300 rounded-md" required>
                        <option value="">Select a Hotel</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->hotelId }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="roomId" class="block text-xl font-medium text-gray-900 mb-2">Select Room</label>
                    <select id="roomId" name="roomId" class="w-full p-3 border border-gray-300 rounded-md" required>
                        <option value="">Select a Room</option>
                        <!-- Room options will be populated via JavaScript -->
                    </select>
                </div>

                <div class="mb-6">
                    <button type="submit" class="w-full bg-orange-500 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-orange-600 transition duration-300">
                        Book Now
                    </button>
                </div>
            </form>
        </div>

        <div class="md:w-1/3 mt-8 md:mt-0 bg-gradient-to-br from-gray-100 to-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Booking Information</h3>
            <p class="text-gray-600 mb-2"><strong>Place:</strong> {{ $place->name }}</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> {{ $place->address }}</p>
            <p class="text-gray-600 mb-2"><strong>Rating:</strong> {{ $place->rating }} / 5</p>
            <p class="text-gray-600 mb-2"><strong>Description:</strong> {{ $place->description }}</p>

            <div class="h-64 bg-gray-200 rounded-lg shadow-inner mt-6">
                <img src="{{ $place->mapImage }}" alt="Map" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </section>

    <script>
        document.getElementById('hotelId').addEventListener('change', function () {
            const hotelId = this.value;
            const roomSelect = document.getElementById('roomId');

            roomSelect.innerHTML = '<option value="">Select a Room</option>';

            if (hotelId) {
                fetch(`/api/hotels/${hotelId}/rooms`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.rooms && data.rooms.length > 0) {
                            data.rooms.forEach(room => {
                                const option = document.createElement('option');
                                option.value = room.roomId;
                                option.textContent = `${room.name} - $${room.price}`;
                                roomSelect.appendChild(option);
                            });
                        } else {
                            const option = document.createElement('option');
                            option.disabled = true;
                            option.textContent = "No rooms available";
                            roomSelect.appendChild(option);
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching rooms:', error);
                    });
            }
        });
    </script>
@endsection
