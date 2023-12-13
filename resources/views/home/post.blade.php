<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    

        <div class="w-[400px] mx-auto mt-8">
            <div class="border border-blue-500 bg-white shadow-md p-8 rounded-lg">
                <img src="{{ asset('public/uploads/' . $post->image) }}" alt="Image" class="h-[300px] w-[300px] object-cover mx-auto mb-6">

                <p class="text-gray-700 text-xl font-semibold mb-2">
                    Description
                </p>
                <p class="text-gray-700 text-base mb-4">
                    {{ $post->description }}
                </p>

                <p class="text-gray-500 text-sm">
                    Posted by: {{ $post->name }}
                </p>

                <!-- Comment Form -->
                @auth
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Add Comment:</label>
                            <textarea name="content" id="content" rows="3" class="w-full border rounded-md p-2"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Comment</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
                @endauth

                <!-- Display Comments -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Comments:</h2>
                    @foreach($post->comments as $comment)
                        <div class="bg-gray-100 p-4 mb-2 rounded-md">
                            <p class="text-gray-700">{{ $comment->content }}</p>
                            <h1>by:{{  Auth::user()->name}}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    
</body>
</html>