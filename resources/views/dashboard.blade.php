<x-app-layout>
    <div class="fixed h-screen items-center left-0  w-[210px] m-0 flex flex-col bg-gray-700 text-white shadow-lg">
        <a href="#" class="mt-9 flex flex-col items-center justify-center"> <x-fas-home class="w-7 " />Home</a>
        <a href="#" class="mt-9 flex flex-col items-center justify-center"><x-iconpark-like class="w-7" />Liked Post</a>
        <a href="#" class="mt-9 flex flex-col items-center justify-center"><x-ri-inbox-archive-line class="w-7" />Saved Post</a>
        <a href="#" class="mt-9 flex flex-col items-center justify-center"><x-far-message class="w-7"/>Messages</a>
        <a href="#" class="mt-9 flex flex-col items-center justify-center"><x-iconsax-lin-notification class="w-7" />Notifications</a>
        <a href="#" class="mt-9 flex flex-col items-center justify-center"><x-css-more-o class="w-9"/>More</a>
    </div>

    <div class="fixed h-screen items-center  w-[400px] ml-[210px] flex flex-col bg-white  text-white shadow-lg">
        <div class="font-sans font-bold pt-7 pb-1 border-b text-black"><h1>Upload New Post</h1></div>
        <form action="{{ route('dashboard.store', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <!-- Image preview -->
                <div id="imagePreviewContainer" class="w-[300px] h-[260px] mb-4 overflow-hidden hidden">
                    <img id="previewImage" class="object-cover w-full h-full" src="" alt="Image Preview">
                </div> 

                <!-- Input field for image selection -->
                <input type="file" id="image" name="image" class="hidden" accept="image/*">
                <label for="image" class="cursor-pointer w-[300px] flex items-center mb-4 p-4 bg-white border border-gray-300 rounded-md shadow-md">
                  <span class="text-gray-700 mr-4">Select a picture</span>
                </label>
  
        
                        <!-- Image description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 mb-2">Description:</label>
                    <textarea type="text" name="description" rows="5"  class="w-full p-2 border border-gray-300 text-black rounded-md" placeholder="Description of the Post"></textarea>
                </div>
                
            
                <!-- Submit button -->
                <button type="submit" class="bg-blue-500 block mt-1 w-full text-white px-4 py-2 rounded-md">Add Post</button>
            
            
            
              <script>
                document.getElementById('image').addEventListener('change', function (event) {
                  const previewImage = document.getElementById('previewImage');
                  const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            
                  if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
            
                    reader.onload = function (e) {
                      previewImage.src = e.target.result;
                      imagePreviewContainer.classList.remove('hidden'); // Show the image preview container
                    };
            
                    reader.readAsDataURL(event.target.files[0]);
                  }
                });
              </script> 
        </form>
     </div>
     <div class="fixed flex items-center justify-center left-[610px] w-[920px] h-[294px] bg-black border border-black border-opacity-5 overflow-hidden">
      <div class="bg-white w-[430px] h-[250px] shadow-lg rounded-lg">

         
      </div>
  </div>


     <div class="fixed left-[600px] top-[400px]  flex ">
      @foreach($posts as $post)
          <div class="bg-white shadow-md p-6 rounded-lg max-w-md mx-4 mb-8">
              <!-- Image div -->
              <div class="mb-4">
                  <img src="{{ asset('public/uploads/' . $post->image) }}" alt="Image" width="50" height="50">
              </div>

              <!-- Description div -->
              <div>
                  <p class="text-gray-700 text-base">
                      Description: {{ $post->description }}
                      
                  </p>
                  <a href="{{ route('dashboard.delete', $post->id) }}">delete</a>
                  <a href="{{ route('dashboard.edit', $post->id) }}">edit</a>
              </div>
          </div>

          
      @endforeach
    </div>

  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    
</x-app-layout>
