<x-app-layout>
    {{-- <x-slot:header>
        <meta property="og:url" content="{{ route('getImage', $greetingcard->id) }}" />
        <meta property="og:title" content="Kartu ucapan" />
        <meta property="og:image" content="{{ route('getImage', $greetingcard->id) }}" />
    </x-slot> --}}

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

            <div class="relative w-full" id="picture">
                <div class="">
                    <img src="{{url('images/template.png')}}" alt="">
                </div>
                <div class="absolute bottom-[170px] inset-0 flex justify-center items-center z-0">
                    <img
                    class="h-1/2 w-3/4 object-cover"
                    src="{{ Storage::url($greeting->photo_url) }}" alt="">
                </div>
                <div class="absolute top-0 z-10">
                    <img src="{{url('images/template.png')}}" alt="">
                </div>
                <div class="absolute z-20 w-full" style="bottom: 10%">
                    <p class="text-center text-lg text-white underline underline-offset-8">{{ $greeting->sender_name }}</p>
                </div>
            </div>


            <div class="my-4">
                <a href="{{ route('downloadImage', $greeting->id) }}"
                    class="block w-full text-center px-16 py-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Save</a>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ url('js/share.js') }}"></script>
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
