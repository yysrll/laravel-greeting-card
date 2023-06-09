
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
                    style="{{ $type == 1 ? 'border-width: 4px; border-color: transparent; border-bottom-color: rgb(60 169 73); border-radius: 0.375rem; color: rgb(60 169 73)' : ''}}"
                    >Square</a>
                <a href="{{ route('greetingcard.show', $id) }}?is_potrait=0"
                    class="w-full px-16 py-4 text-center font-semibold text-xs tracking-widest text-gray-500"
                    style="{{ $type == 0 ? 'border-width: 4px; border-color: transparent; border-bottom-color: rgb(60 169 73); border-radius: 0.375rem; color: rgb(60 169 73)' : ''}}"
                    >Potrait</a>
            </div>

            <div id="loading" class="flex justify-center items-center m-24">
                <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-[#3CA949]"></div>
            </div>


            <div class="w-full" id="picture">
                <img src="" alt="" id="myImage">
            </div>


            <div class="flex my-4 mx-4 md:mx-0">
                <a href="{{ route('downloadImage', $id) }}?is_potrait={{ $type }}"
                    class="block w-full text-center px-16 py-4 bg-[#3CA949] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-1"
                    >Save</a>
                <button
                    onclick="shareImage()"
                    class="text-center px-6 py-4 ml-4 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-none"
                    style="background-color: rgb(32 110 168);"
                    >Bagikan</button>
            </div>
            <div class="flex justify-center my-4 mx-4 md:mx-0">
                <a href="{{ route('welcome') }}"
                    class="block text-center px-16 py-4 border border-transparent rounded-md font-semibold text-xs tracking-widest"
                    style="color: rgb(60 169 73);"
                    >
                    <div class="flex items-center">
                        <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-6"> <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/> </svg>
                        <p class="text-center">Buat lagi</p>
                    </div>
                </a>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ url('js/share.js') }}"></script>
    <script>
        // Get the image source URL
        const image = document.getElementById('myImage');
        const link = "{{ route('getImage', [$id, $type]) }}"
        loadImage(link)

        function loadImage(url) {
            // Show loading
            $('#loading').show()
            // Create a new image object
            const img = new Image();

            // Set the image source
            img.src = url;

            // When the image has loaded, set the image source to the image element
            img.onload = () => {
                image.src = url;
                $('#loading').hide()
            };
        }

        function shareImage() {
            // Get the image source URL
            console.log('share start')

            console.log('send data')
            if (navigator.share) {
                fetch(image.src)
                    .then(res => res.blob())
                    .then(blob => {
                        // Check if the share API is available in the browser
                        const file = new File([blob], 'kartu-ucapan.jpg', { type: 'image/jpeg' })
                        console.log(file)

                        console.log('create share data')
                        const shareData = {
                            title: 'Share Image', // Optional title
                            files: [file], // The image file to share
                        };
                        // Use the share API to share the image
                        navigator
                        .share(shareData)
                        .then(() => console.log("Shared!"))
                        .catch(err => console.error(err));;
                    })
            } else {
                // Use a fallback method to share the image
                alert('Fitur ini tidak support dengan browser anda, silahkan simpan gambar untuk dibagikan');
            }

            console.log('share end')
        }
    </script>
</x-app-layout>
