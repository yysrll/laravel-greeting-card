
<x-app-layout>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('getImage', $id) }}" />
        <meta property="og:title" content="Kartu ucapan" />
        <meta property="og:image" content="{{ route('getImage', $id) }}" />

    </x-slot>

    <div class="md:grid md:grid-cols-3 pt-10">
        <div class="col-span-1">

        </div>
        <div class="col-span-1 m-4 md:m-0">

            <div class="w-full" id="picture">
                <img src="{{ route('getImage', $id) }}" alt="" id="myImage">
            </div>


            <div class="flex my-4">
                <a href="{{ route('downloadImage', $id) }}"
                    class="block w-full text-center px-16 py-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-1"
                    >Save</a>
                <a
                    href="javascript:void(0)"
                    onclick="shareImage()"
                    class="text-center px-6 py-4 ml-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-none"
                    >Bagikan</a>
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
