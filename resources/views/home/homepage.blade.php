
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>

                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


    
            <div class=" mx-auto mt-16">
                @foreach($posts as $post)
                    <div class="border border-blue-500 bg-white shadow-md p-8 rounded-lg mb-8 flex flex-col justify-center">
                        <!-- Image div -->
                        <div class="mb-6">
                            <a href="{{ route('posts.show', $post) }}">
                                <img src="{{ asset('public/uploads/' . $post->image) }}" alt="Image" class="h-[300px] w-[300px] object-cover mx-auto">
                            </a>
                        </div>
            
                        <!-- Description div -->
                        <div>
                            <p class="text-gray-700 text-xl font-semibold mb-2">
                                Description
                            </p>
                            <p class="text-gray-700 text-base">
                                {{ $post->description }}
                            </p>
                        </div>
            
                        <!-- User Name -->
                        <div class="mt-4">
                            <p class="text-gray-500 text-sm">
                                Posted by: {{ optional($post->user)->name ?? 'Unknown User' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>    
       


        
    
    
    
    </body>
</html>
