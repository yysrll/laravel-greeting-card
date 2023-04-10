
<x-app-layout>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('getImage', [$id, $type]) }}" />
        <meta property="og:title" content="Kartu ucapan" />
        <meta property="og:image" content="{{ route('getImage', [$id, $type]) }}" />

    </x-slot>

    <div class="relative">
        <div class="min-h-screen md:grid md:grid-cols-3 bg-white">
            <div class="col-span-1">

            </div>
            <div class="col-span-1">
                <div class="flex mb-4 px-4 pt-6 bg-[#206EA8] sticky top-0">
                    <a href="{{ route('greetingcard.show', $id) }}"
                        class="flex-1 px-auto py-4 mr-1 text-center font-bold text-sm tracking-wides rounded-t-lg {{ $type == 1 ? 'text-[#206EA8] bg-white' : 'text-white bg-blue-300/40' }}"
                        >Square</a>
                    <a href="{{ route('greetingcard.show', $id) }}?is_potrait=0"
                        class="flex-1 px-auto py-4 ml-1 text-center font-bold text-sm tracking-wides rounded-t-lg {{ $type == 0 ? 'text-[#206EA8] bg-white' : 'text-white bg-blue-300/40' }}"
                        >Portrait</a>
                </div>

                {{-- <div id="loading" class="flex justify-center items-center m-24">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-[#3CA949]"></div>
                </div> --}}


                <div class="w-full" id="picture">
                    <img src="" alt="" id="myImage">
                </div>


                <div class="flex my-4 mx-4 md:mx-0">
                    <button
                        onclick="downloadImage()"
                        class="block w-full text-center px-16 py-4 bg-[#206EA8] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-1"
                        >Simpan</button>
                    <button
                        onclick="shareImage()"
                        class="text-center px-6 py-4 ml-4 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 flex-none"
                        style="background-color: rgb(32 110 168);"
                        >Bagikan</button>
                </div>
                <div class="flex justify-center my-4 mx-4 md:mx-0">
                    <a href="{{ route('welcome') }}"
                        class="block text-center px-16 py-4 border border-transparent rounded-md font-semibold text-xs tracking-widest text-[#206EA8]"
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

        <div id="loading" class="absolute flex justify-center items-center top-0 left-0 z-10 w-screen h-full bg-gray-700 bg-opacity-60">
            <div class="bg-white p-10 rounded-lg">
                <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-[#3CA949]"></div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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
            $('#loading').show()
            // Get the image source URL
            console.log('share start')

            console.log('send data')
            if (navigator.share) {
                fetch(image.src)
                    .then(res => res.blob())
                    .then(blob => {
                        try {
                            // Check if the share API is available in the browser
                            const file = new File([blob], 'kartu-ucapan.jpg', { type: 'image/jpeg' })
                            console.log(file)

                            console.log('create share data')
                            const shareData = {
                                files: [file], // The image file to share
                            };
                            // Use the share API to share the image
                            navigator
                            .share(shareData)
                            .then(() => {
                                console.log("Shared!")
                                $('#loading').hide()
                            })
                            .catch(err => {
                                console.log(err)
                                $('#loading').hide()
                            });
                        } catch (error) {
                            $('#loading').hide()
                            alert('Gagal memuat, ' + error)
                        }
                    })
            } else {
                // Use a fallback method to share the image
                $('#loading').hide()
                alert('Fitur ini tidak support dengan browser anda, silahkan simpan gambar untuk dibagikan');
            }
            console.log('share end')
        }


        function downloadImage() {
            $('#loading').show()
            console.log('download')
            $.ajax({
                url: link,
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'kartu-ucapan-' + '{{ $greetingcard->sender_name }}' + '.jpeg';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                    $('#loading').hide()
                }
            });
        }
    </script>
</x-app-layout>
