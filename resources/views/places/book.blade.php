@extends('layouts.app')

@section('title', 'Book Your Stay')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Book Your Stay at {{ $place->name }}</h1>

        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('places.book.submit', $place->placeId) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="hotelId" class="block text-xl font-medium text-gray-900">Select Hotel</label>
                <select id="hotelId" name="hotelId" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <option value="">Select a Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotelId }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="roomId" class="block text-xl font-medium text-gray-900">Select Room</label>
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
