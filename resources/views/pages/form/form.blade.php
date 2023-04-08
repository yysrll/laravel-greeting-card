<x-app-layout>

    <div class="relative">
        <div class="grid grid-cols-1 md:grid-cols-3 bg-white md:bg-gray-200">
            <div class="col-span-1">

            </div>
            <div class="bg-white col-span-1 min-h-screen ">
                <div class="px-4 md:px-10 py-6 bg-[#206EA8] sticky top-0">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl text-white font-bold">Isi Data Kamu</h1>
                        <img class="h-6 mr-4"
                        src="{{ url('images/logo-white.png') }}" alt="">
                    </div>
                </div>
                <div class="py-4 px-10 md:m-0 pt-8">
                    @if (session('error'))
                        <x-alert status="error">
                            {{ session('error') }}
                        </x-alert>
                    @endif
                    @if (session('success'))
                        <x-alert>
                            {{ session('success') }}
                        </x-alert>
                    @endif

                    <form id="formSubmit" method="POST" action="{{ route('greetingcard.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Sender -->
                        <div class="mx-4 md:mx-0">
                            <x-input-label for="sender" value="Nama"/>
                            <x-text-input id="sender" class="block mt-1 w-full" type="text" name="sender_name" :value="old('sender')" required autofocus autocomplete="sender" maxlength="60"/>
                        </div>

                        <!-- Receive -->
                        <div class="mt-6 mx-4 md:mx-0 hidden">
                            <x-input-label for="recipient" value="Penerima: " />
                            <x-text-input id="recipient" class="block mt-1 w-full" type="text" name="recipient_name" :value="old('recipient')" autofocus autocomplete="recipient" />
                        </div>

                        <!-- greetings -->
                        <div class="mt-6 mx-4 md:mx-0 hidden">
                            <x-input-label for="message" value="Kalimat ucapan: " />
                            <textarea id="message" name="message" :value="old('message')" autofocus autocomplete="message" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="5"></textarea>
                        </div>

                        <div class="flex flex-col mt-10 md:mt-16">
                            <div class="flex justify-center">
                                <img id="preview-image" class="h-64 w-64 object-cover rounded-full" src="{{ url('images/placeholder.png') }}" alt="Current profile photo" />
                            </div>
                            <input type="file" id="image" name="photoUrl" accept="image/*" onchange="previewImage()"
                                    class="hidden"
                                    required/>
                            <label
                            id="inputLabel"
                            for="image"
                            style="cursor: pointer;"
                            class="flex justify-center text-[#206EA8] text-lg mt-4"
                            >Upload/ambil gambar</label>

                        </div>

                        <div class="mt-20 md:mt-24 mx-4 md:mx-0">
                            <x-primary-button
                            id="generateButton"
                            type="submit"
                            class="w-full py-4">
                                Buat Kartu
                            </x-primary-button>
                        </div>

                    </form>

                    <div class="flex justify-center mb-4 mx-4 md:mx-0">
                        <a href="{{ route('welcome') }}"
                            class="block text-center text-[#206EA8] px-16 py-4 border border-transparent rounded-md font-semibold text-xs tracking-widest"
                            >
                            <div class="flex items-center">
                                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-6"> <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/> </svg>
                                <p class="text-center">Kembali</p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-span-1">

            </div>
        </div>

        <div id="loading" class="absolute flex justify-center items-center top-0 left-0 z-10 w-screen h-screen bg-gray-700 bg-opacity-60">
            <div class="bg-white p-10 rounded-lg">
                <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-[#3CA949]"></div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script>
        const generateButton = document.getElementById('generateButton');
        $('#loading').hide()

        generateButton.addEventListener('click', () => {
        });
        $('#formSubmit').submit(function(){
            // do ajax now
            $('#loading').show()
            console.log("submitted");
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
            document.getElementById("inputLabel").textContent = 'Ubah Gambar';
            console.log('testes')
        }
    </script>
</x-app-layout>
