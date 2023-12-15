<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <!-- Fonts -->
         <link rel="preconnect" href="https://fonts.bunny.net">
         <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
 
         <!-- Styles -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="w-[300px] justify-center ">
    <div class="font-sans font-bold border-b text-black"><h1>Upload New Post</h1></div>
        <form action="{{ route('dashboard.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                

                <!-- Input field for image selection -->
                <input type="file" id="image" value="{{ asset('public/uploads/' . $post->image) }}"  name="image" class="hidden" accept="image/*">
                <label for="image" class="cursor-pointer w-[300px] flex items-center mb-4 p-4 bg-white border border-gray-300 rounded-md shadow-md">select an image
                </label>
  
        
                        <!-- Image description -->
                <div class="mb-4">
                    <label for="description"  class="block text-gray-700 mb-2">Description:</label>
                    <textarea type="text"  value="{{$post->description}}" name="description" rows="5"  class="w-full p-2 border border-gray-300 text-black rounded-md" placeholder="Description of the Post"></textarea>
                </div>

                <button type="submit" class="bg-blue-500 block mt-1 w-full text-white px-4 py-2 rounded-md">update</button>

        </form>
</body>
</html>