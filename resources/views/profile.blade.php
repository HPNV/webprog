@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
<div class="font-sans">
    <div class="relative flex flex-col sm:justify-center items-center bg-blue-50 py-16">
        <label for="" class="block mt-3 text-4xl text-blue-700 text-center font-bold mb-12">
            Profile Information
        </label>

        <div class="relative sm:max-w-3xl w-full">
            <div class="relative w-full rounded-3xl px-5 py-5 bg-white shadow-md">

                <div class="mt-8 text-center">
                    <div class="w-full mx-auto flex items-center justify-center">
                        <div class="flex flex-col gap-1">
                            <div class="w-[25rem] h-[25rem] rounded-xl shadow-3xl mb-3">
                                <img src="https://picsum.photos/200" alt="Profile" class="w-full rounded-xl">
                            </div>

                            <div class="text-2xl text-center text-gray-300 dark:text-black font-semibold mb-5">Hello, {{ Auth::user()->name }}</div>

                            <p class="text-lg text-gray-600">Email: <span class="text-gray-800">{{ Auth::user()->email }}</span></p>

                            <section class="mt-4">
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Password</h2>
                                <p class="text-gray-600">For security reasons, your password is hidden.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection