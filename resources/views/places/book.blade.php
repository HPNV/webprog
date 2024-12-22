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
                <div class="mt-3 text-center text-4xl font-bold">Make an Appointment</div>
                    <div class="p-8">
                        <div class="flex gap-4 mb-6">
                            <select id="hotelId" name="hotelId" class="block w-1/2 rounded-md border border-gray-300 bg-white px-3 py-4 font-semibold text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm transition duration-300 hover:ring-2 hover:ring-blue-500" required>
                                <option value="">Select a Hotel</option>
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->hotelId }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>

                            <select id="roomId" name="roomId" class="block w-1/2 rounded-md border border-gray-300 bg-white px-3 py-4 font-semibold text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm transition duration-300 hover:ring-2 hover:ring-blue-500" required>
                                <option value="">Select a Room</option>
                            </select>
                        </div>

                        <div class="flex gap-4 mb-6">
                            <input type="date" id="checkIn" name="checkIn" class="block w-1/2 rounded-md border border-gray-300 bg-white px-3 py-4 placeholder-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm transition duration-300 hover:ring-2 hover:ring-blue-500" required />
                            <input type="date" id="checkOut" name="checkOut" class="block w-1/2 rounded-md border border-gray-300 bg-white px-3 py-4 placeholder-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm transition duration-300 hover:ring-2 hover:ring-blue-500" required />
                        </div>

                        <div class="mb-6">
                            <textarea name="message" id="message" cols="30" rows="10" class="h-40 w-full resize-none rounded-md border border-gray-300 p-5 font-semibold text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm transition duration-300 hover:ring-2 hover:ring-blue-500" placeholder="Message"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-5 text-sm font-semibold text-white hover:bg-blue-800 hover:shadow-lg transition duration-300">Book Appointment</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="md:w-1/3 mt-10 md:mt-0 mb-2 bg-white p-6 rounded-lg shadow-xl">
            <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">{{ $place->name }}</h3>
            <div class="mb-9">
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
