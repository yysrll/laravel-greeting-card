<x-app-layout>
    <div class="md:grid md:grid-cols-3 pt-10">
        <div class="col-span-1">

        </div>
        <div class="col-span-1 m-4 md:m-0">
            @if (session('error'))
                <x-alert>
                    {{ session('error') }}
                </x-alert>
            @endif
            @if (session('success'))
                <x-alert>
                    {{ session('success') }}
                </x-alert>
            @endif

            <div class="relative bg-black ">
                <div class="">
                    <img src="{{url('images/template.jpeg')}}" alt="">
                </div>
                <div class="absolute bottom-[150px] inset-0 flex justify-center items-center">
                    <img
                    class="h-72 w-72 object-cover"
                    src="{{ Storage::url($greeting->photo_url) }}" alt="">
                </div>
                {{-- <div class="absolute top-24">
                    <p>From: {{ $greeting->sender_name }}</p>
                </div> --}}
            </div>


            <div class="my-4">
                <x-primary-button
                type="submit"
                class="block w-full">
                    Save
                </x-primary-button>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script>
        const dropdownButton = document.getElementById('dropdownHoverButton');
        const dropdownMenu = document.getElementById('dropdownHover');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        function previewImage() {
            // Get the selected image
            var file = document.getElementById("image").files[0];

            // Create a FileReader object
            var reader = new FileReader();

            // Set the callback function when the reader is done reading the file
            reader.onload = function(e) {
                // Create a new image element
                var img = document.getElementById("preview-image");

                // Set the image source to the result of the reader
                img.src = e.target.result;

                // Append the image to the preview container
                // document.getElementById("preview-container").appendChild(img);
            }

            // Read the file as a Data URL
            reader.readAsDataURL(file);
            dropdownMenu.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
