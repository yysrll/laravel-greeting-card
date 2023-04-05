
<x-app-layout>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('getImage', [$id, $type]) }}" />
        <meta property="og:title" content="Kartu ucapan" />
        <meta property="og:image" content="{{ route('getImage', [$id, $type]) }}" />

    </x-slot>

    <div class="min-h-screen md:grid md:grid-cols-3 pt-4 bg-white">
        <div class="col-span-1">

        </div>
        <div class="col-span-1">
            <div class="flex mb-4 mx-4 md:mx-0">
                <a href="{{ route('greetingcard.show', $id) }}"
                    class="w-full px-16 py-4 text-center font-semibold text-xs tracking-widest text-gray-500"
                    style="{{ $type == 1 ? 'border-width: 4px; border-color: transparent; border-bottom-color: rgb(32 110 168); border-radius: 0.375rem; color: rgb(59 130 246)' : ''}}"
                    >Square</a>
                <a href="{{ route('greetingcard.show', $id) }}?is_potrait=0"
                    class="w-full px-16 py-4 text-center font-semibold text-xs tracking-widest text-gray-500"
                    style="{{ $type == 0 ? 'border-width: 4px; border-color: transparent; border-bottom-color: rgb(32 110 168); border-radius: 0.375rem; color: rgb(59 130 246)' : ''}}"
                    >Potrait</a>
            </div>

            <div class="w-full" id="picture">
                <img src="{{ route('getImage', [$id, $type]) }}" alt="" id="myImage">
            </div>


            <div class="flex my-4 mx-4 md:mx-0">
                <a href="{{ route('downloadImage', $id) }}?is_potrait={{ $type }}"
                    class="block w-full text-center px-16 py-4 bg-[#206EA8] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-1"
                    >Save</a>
                <a
                    href="javascript:void(0)"
                    onclick="shareImage()"
                    class="text-center px-6 py-4 ml-4 border border-transparent rounded-md font-semibold text-xs tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-none"
                    style="background-color: rgb(251 191 36);"
                    >Bagikan</a>
            </div>
            <div class="my-4 mx-4 md:mx-0">
                <a href="{{ route('welcome') }}"
                    class="block w-full text-center px-16 py-4 border border-transparent rounded-md font-semibold text-xs tracking-widest"
                    style="color: rgb(32 110 168);"
                    >Buat lagi</a>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ url('js/share.js') }}"></script>
    <script>

        function shareImage() {
            // Get the image source URL
            const image = document.getElementById('myImage');

            const shareData = {
                title: 'Share Image', // Optional title
                files: [image.src], // The image file to share
                text: 'Check out this image!', // Optional text
            };

            // Check if the share API is available in the browser
            if (navigator.share) {
                // Use the share API to share the image
                navigator.share(shareData);
            } else {
                // Use a fallback method to share the image
                alert('Share API is not supported in this browser');
            }
        }
    </script>
</x-app-layout>
