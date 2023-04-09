<x-app-layout>

    <x-slot:addonstyle>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.css" integrity="sha512-C4k/QrN4udgZnXStNFS5osxdhVECWyhMsK1pnlk+LkC7yJGCqoYxW4mH3/ZXLweODyzolwdWSqmmadudSHMRLA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>

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
                        <input type="file" id="image" name="photoUrl" accept="image/*"
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
                        type="button"
                        class="w-full py-4">
                            Buat Kartu
                        </x-primary-button>
                    </div>

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


        {{-- Modal --}}
        <div
            class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 w-full pb-12"
            id="my-modal"
        >
            <!--modal content-->
            <div
            class="relative w-full h-full overflow-y-scroll md:w-1/2 top-12 mb-12 mx-auto p-5 border shadow-lg rounded-md bg-white"
            >
                <div class="flex justify-center mt-3 text-center">
                    <div class="items-center px-2 py-2">
                        <img class="max-h-screen" id="imageCrop" src="{{ url('images/template.jpeg')}}">
                        <button
                            id="crop-btn"
                            class="mt-16 px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300"
                        >
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.js" integrity="sha512-CABi9vrtlQz9otMo5nT0B3nCBmn5BirYvO3oCnulsEzRDekxdMEZ2rXg85Is5pdnc9HNAcUEjm/7HagpqAFa1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.js" integrity="sha512-LjPH94gotDTvKhoxqvR5xR2Nur8vO5RKelQmG52jlZo7SwI5WLYwDInPn1n8H9tR0zYqTqfNxWszUEy93cHHwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#loading').hide()
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

    {{-- Generate Script --}}
    <script>
        let modal = document.getElementById("my-modal");
        let btn = document.getElementById("open-btn");
        let cropButton = document.getElementById("crop-btn");

        var image = document.getElementById('imageCrop');
        var cropper;
        var imageData;

        // We want the modal to open when the Open button is clicked
        function showModal() {
            modal.style.display = "block";
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
            });
        }

        document.getElementById("image").onchange = function(e) {
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                showModal()
            };

            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];
                console.log('set file')

                if (URL) {
                    console.log('masuk ke url')
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                        console.log('reader on load')
                    };
                reader.readAsDataURL(file);
                }
            }
        };


        // We want the modal to close when the OK button is clicked
        cropButton.onclick = function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var ImageURL = reader.result;

                    // Split the base64 string in data and contentType
                    var block = ImageURL.split(";");
                    // Get the content type of the image
                    var contentType = block[0].split(":")[1];// In this case "image/gif"
                    // get the real base64 content of the file
                    var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

                    // Convert it to a blob to upload
                    imageData = b64toBlob(realData, contentType);
                    console.log(imageData)

                    // Create a new image element
                    var imgPreview = document.getElementById("preview-image");

                    // Set the image source to the result of the reader
                    imgPreview.src = ImageURL;

                    document.getElementById("inputLabel").textContent = 'Ubah Gambar';

                }
            });


            modal.style.display = "none";
            cropper.destroy();
            cropper = null;
        }

        $("#generateButton").click(function (event) {
            $('#loading').show()
            console.log('submit')
            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Create an FormData object
            var data = new FormData();

            // If you want to add an extra field for the FormData
            data.append("_token", "{{ csrf_token() }}");
            data.append("sender_name", `${$('#sender').val()}`);
            data.append("recipient_name", null);
            data.append("message", null);
            data.append("photoUrl", imageData);
            console.log(`${$('#sender').val()}`)

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "{{ route('greetingcard.store') }}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (res) {
                    console.log('upload success')
                    console.log(res.url)
                    window.location.replace(res.url)
                },
                error: function (xhr, status, error) {
                    console.log("ERROR : ", error);
                    alert(`Error, ${error}`)
                    $('#loading').hide()
                }
            });

        });

        function b64toBlob(b64Data, contentType, sliceSize) {
            contentType = contentType || '';
            sliceSize = sliceSize || 512;

            var byteCharacters = atob(b64Data);
            var byteArrays = [];

            for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                var slice = byteCharacters.slice(offset, offset + sliceSize);

                var byteNumbers = new Array(slice.length);
                for (var i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i);
                }

                var byteArray = new Uint8Array(byteNumbers);

                byteArrays.push(byteArray);
            }

            var blob = new Blob(byteArrays, {type: contentType});
            return blob;
        }
    </script>
</x-app-layout>
