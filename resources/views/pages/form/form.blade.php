<x-app-layout>

    <div class="min-h-screen grid grid-cols-1 md:grid-cols-3 bg-white md:bg-gray-200">
        <div class="col-span-1">

        </div>
        <div class="bg-white col-span-1">
            <div class="px-4 md:px-10 py-6 bg-[#1da1f2] sticky top-0">
                <div class="flex justify-start items-center">
                    <h1 class="text-2xl text-white font-bold">Isi Data Kamu</h1>
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

                <form method="POST" action="{{ route('greetingcard.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Sender -->
                    <div class="mx-4 md:mx-0">
                        <x-input-label for="sender" value="Pengirim"/>
                        <x-text-input id="sender" class="block mt-1 w-full" type="text" name="sender_name" :value="old('sender')" required autofocus autocomplete="sender" maxlength="60"/>
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                    </div>

                    <!-- Receive -->
                    <div class="mt-6 mx-4 md:mx-0 hidden">
                        <x-input-label for="recipient" value="Penerima: " />
                        <x-text-input id="recipient" class="block mt-1 w-full" type="text" name="recipient_name" :value="old('recipient')" autofocus autocomplete="recipient" />
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                    </div>

                    <!-- greetings -->
                    <div class="mt-6 mx-4 md:mx-0 hidden">
                        <x-input-label for="message" value="Kalimat ucapan: " />
                        <textarea id="message" name="message" :value="old('message')" autofocus autocomplete="message" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="5"></textarea>
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                    </div>

                    <div class="flex flex-col my-8 md:my-16">
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
                        class="flex justify-center text-[#1da1f2] text-lg mt-4"
                        >Upload/ambil gambar</label>

                    </div>

                    <div class="mt-4 mb-8 mx-4 md:mx-0">
                        <x-primary-button
                        type="submit"
                        class="w-full py-4">
                            Generate
                        </x-primary-button>
                    </div>
                </form>

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
            document.getElementById("inputLabel").textContent = 'Ubah Gambar';
            console.log('testes')
        }
    </script>
</x-app-layout>
