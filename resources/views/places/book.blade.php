@extends('layouts.app')

@section('title', 'Book Your Stay')

@section('content')
    <div class="relative min-h-screen flex flex-col justify-center items-center bg-blue-50">
        <div class="relative sm:max-w-3xl w-full">
            <div class="card bg-blue-500 shadow-lg w-full h-full rounded-3xl absolute transform -rotate-6"></div>
            <div class="card bg-blue-700 shadow-lg w-full h-full rounded-3xl absolute transform rotate-6"></div>
        </div>

        <div class="relative w-full sm:w-5/5 lg:w-3/4 xl:w-2/3 2xl:w-1/2 px-12 py-14 bg-white rounded-3xl shadow-lg -mt-10 z-10">
            <div class="text-center font-bold mt-10 text-3xl">Book Your Stay at {{ $place->name }}</div>
            <div class="mt-3 text-center text-4xl font-bold">Make a Reservation</div>

            @if(session('success'))
                <div class="alert alert-success mb-4 bg-green-100 text-green-700 border-l-4 border-green-500 p-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger mb-4 bg-red-100 text-red-700 border-l-4 border-red-500 p-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('places.book.submit', $place->placeId) }}" method="POST" class="mt-12">
                @csrf
                <div class="flex gap-4 mb-6">
                    <div class="w-1/2">
                        <label for="hotelId" class="block text-xl font-medium text-gray-900">Select Hotel</label>
                        <select id="hotelId" name="hotelId" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" required>
                            <option value="">Select a Hotel</option>
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->hotelId }}">{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="roomId" class="block text-xl font-medium text-gray-900">Select Room</label>
                        <select id="roomId" name="roomId" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" required>
                            <option value="">Select a Room</option>
                        </select>
                    </div>
                </div>

                <div class="my-6">
                    <label for="date" class="block text-xl font-medium text-gray-900">Date of Stay</label>
                    <input type="date" id="date" name="date" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" required />
                </div>

                <div class="my-6">
                    <label for="specialRequest" class="block text-xl font-medium text-gray-900">Special Request</label>
                    <textarea name="specialRequest" id="specialRequest" cols="30" rows="5" class="resize-none w-full rounded-md border border-slate-300 p-5 font-semibold text-gray-300 placeholder-slate-400 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Any special requests or requirements?"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="w-full bg-blue-700 px-8 py-5 text-sm font-semibold text-white rounded-lg shadow-lg hover:shadow-inner transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                        Book Now
                    </button>
                </div>
            </form>
        </div>
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
