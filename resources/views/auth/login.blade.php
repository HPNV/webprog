@extends('layouts.app')

@section('title', 'Book Your Stay')

@section('content')
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-blue-50">
            <div class="relative sm:max-w-3xl w-full">
                <div class="card bg-blue-500 shadow-lg w-full h-full rounded-3xl absolute transform -rotate-6"></div>
                <div class="card bg-blue-700 shadow-lg w-full h-full rounded-3xl absolute transform rotate-6"></div>
                <div class="relative w-full rounded-3xl px-10 py-8 bg-white shadow-md">
                    <label for="" class="block mt-3 text-2xl text-blue-700 text-center font-bold">
                        Login
                    </label>
                    <form method="POST" action="{{ route('login.submit') }}" class="mt-12">
                        @csrf

                        <div>
                            <input type="email" name="email" placeholder="Email" class="pl-5 mt-1 block w-full border-none bg-blue-100 h-14 rounded-xl shadow-lg hover:bg-blue-200 focus:bg-blue-300 focus:ring-0">
                        </div>

                        <div class="mt-8">
                            <input type="password" name="password" placeholder="Password" class="pl-5 mt-1 block w-full border-none bg-blue-100 h-14 rounded-xl shadow-lg hover:bg-blue-200 focus:bg-blue-300 focus:ring-0">
                        </div>

                        <div class="mt-8 flex">
                            <div class="w-full text-right">
                                <a class="underline text-sm text-blue-600 hover:text-blue-900" href="#">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button class="bg-blue-600 w-full py-4 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                                Login
                            </button>
                        </div>
                    </form>

                        <div class="flex mt-8 items-center text-center">
                            <hr class="border-blue-300 border-1 w-full rounded-md">
                            <label class="block font-medium text-sm text-blue-600 w-full">
                                Sign in with
                            </label>
                            <hr class="border-blue-300 border-1 w-full rounded-md">
                        </div>

                        <div class="flex mt-8 justify-center w-full">
                            <button class="mr-5 bg-blue-700 border-none px-6 py-3 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                                <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M12 2.04C6.48 2.04 2 6.52 2 12c0 4.93 3.65 9.06 8.44 9.88v-7h-2.5v-2.88h2.5v-2.2c0-3.02 1.79-4.7 4.51-4.7 1.31 0 2.69.12 3.03.18v3h-2.13c-1.67 0-2.09.81-2.09 1.99v2.63h4.16l-.67 2.88h-3.5v7c4.79-.82 8.44-4.95 8.44-9.88 0-5.48-4.48-9.96-10-9.96z"/>
                                </svg>
                            </button>

                            <button class="bg-blue-500 border-none px-6 py-3 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                                <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="currentColor" class="w-6 h-6">
                                    <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12 c0-6.627 5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24 c0 11.045 8.955 20 20 20c11.045 0 20-8.955 20-20C44 22.659 43.862 21.35 43.611 20.083z"/>
                                    <path fill="#FF3D00" d="M6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657 C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691z"/>
                                    <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238C29.211 35.091 26.715 36 24 36 c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/>
                                    <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303c-0.792 2.237-2.231 4.166-4.087 5.571 c0.001-0.001 0.002-0.001 0.003-0.002l6.19 5.238C36.971 39.205 44 34 44 24C44 22.659 43.862 21.35 43.611 20.083z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="mt-8">
                            <div class="flex justify-center items-center">
                                <label class="mr-2 text-blue-600">New user?</label>
                                <a href="/register" class="text-blue-700 transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                                    Create an account
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
