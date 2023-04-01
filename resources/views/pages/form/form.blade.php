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

            <form method="POST" action="{{ route('greetingcard.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Sender -->
                <div>
                    <x-input-label for="sender" value="Pengirim" />
                    <x-text-input id="sender" class="block mt-1 w-full" type="text" name="sender_name" :value="old('sender')" required autofocus autocomplete="sender" />
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <!-- Receive -->
                <div>
                    <x-input-label for="recipient" value="Penerima: " />
                    <x-text-input id="recipient" class="block mt-1 w-full" type="text" name="recipient_name" :value="old('recipient')" required autofocus autocomplete="recipient" />
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <!-- greetings -->
                <div>
                    <x-input-label for="message" value="Kalimat ucapan: " />
                    <textarea id="message" name="message" :value="old('message')" required autofocus autocomplete="message" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="5"></textarea>
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <div class="flex justify-center mt-6 mb-16 relative">
                    <div class="relative w-40">
                        <div class="shrink-0">
                            <img id="preview-image" class="h-40 w-40 object-cover rounded-full" src="https://via.placeholder.com/150?text=upload image" alt="Current profile photo" />
                        </div>
                        <div class="absolute top-0 right-0">
                            <x-primary-button
                            id="dropdownHoverButton"
                            type="button"
                                class="rounded-full"
                                data-dropdown-toggle="dropdownHover"
                                >
                                <p class="text-lg">+</p>
                            </x-primary-button>
                        </div>
                    </div>
                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="hidden absolute top-12 right-0 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <input type="file" name="img" accept="image/*" capture="camera"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                            {{-- <button id="take-picture" class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Take from camera</button> --}}
                        </li>
                        <li>
                            <input type="file" id="image" name="photoUrl" accept="image/*" onchange="previewImage()"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            required/>
                        </li>
                        </ul>
                    </div>
                </div>


                <div class="mt-4">
                    <x-primary-button
                    type="submit"
                    class="block w-full">
                        Generate
                    </x-primary-button>
                </div>
            </form>

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
