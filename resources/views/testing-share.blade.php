
<x-app-layout>
    <x-slot:meta>
        <meta property="og:url" content="https://media.moddb.com/cache/images/members/5/4550/4549205/thumb_620x2000/duck.jpg" />
        <meta property="og:title" content="bebek" />
        <meta property="og:image" content="https://media.moddb.com/cache/images/members/5/4550/4549205/thumb_620x2000/duck.jpg" />

    </x-slot>

    <div class="min-h-screen md:grid md:grid-cols-3 pt-4 bg-white">
        <div class="col-span-1">

        </div>
        <div class="col-span-1">

            <div class="w-full" id="picture">
                <img src="https://media.moddb.com/cache/images/members/5/4550/4549205/thumb_620x2000/duck.jpg" alt="" id="myImage">
            </div>


            <div class="flex my-4 mx-4 md:mx-0">
                <button
                    onclick="shareImage()"
                    class="text-center px-6 py-4 ml-4 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    style="background-color: rgb(32 110 168);"
                    >Bagikan</button>
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
            console.log('share start')
            const image = document.getElementById('myImage');

            console.log('create share data')
            const shareData = {
                title: 'Share Image', // Optional title
                files: [image.src], // The image file to share
                text: 'Check out this image!', // Optional text
            };

            // Check if the share API is available in the browser

            console.log('send data')
            if (navigator.share) {
                // Use the share API to share the image
                navigator
                .share(shareData)
                .then(() => console.log("Shared!"))
                .catch(err => console.error(err));;
            } else {
                // Use a fallback method to share the image
                alert('Share API is not supported in this browser');
            }

            console.log('share end')
        }
    </script>
</x-app-layout>
