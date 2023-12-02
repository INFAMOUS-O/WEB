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
        <form class="mt-12" method="POST" action="">
            @csrf
            <form>

                
                <!-- Image preview -->
                <div id="imagePreviewContainer" class="w-[300px] h-[260px] mb-4 overflow-hidden hidden">
                    <img id="previewImage" class="object-cover w-full h-full" src="" alt="Image Preview">
                </div>

                <!-- Input field for image selection -->
                <input type="file" id="imageInput" class="hidden" accept="image/*">
                <label for="imageInput" class="cursor-pointer w-[300px] flex items-center mb-4 p-4 bg-white border border-gray-300 rounded-md shadow-md">
                  <span class="text-gray-700 mr-4">Select a picture</span>
                </label>
            
            
                <!-- Image description -->
                <div class="mb-4">
                  <label for="description" class="block text-gray-700 mb-2">Description</label>
                  <textarea id="description" name="imagedescription" rows="5" class=" w-[300px] w-full p-2 border border-gray-300 text-black rounded-md" placeholder="Enter image description..."></textarea>
                </div>
            
                <!-- Submit button -->
                <button type="submit" class="bg-blue-500 block mt-1 w-full text-white px-4 py-2 rounded-md">Post</button>
            
              </form>
            
              <script>
                document.getElementById('imageInput').addEventListener('change', function (event) {
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
    
</x-app-layout>
