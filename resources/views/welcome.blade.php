<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-1">
        </div>
        <div class="col-span-1 m-4 md:m-0">

            <div class="relative w-full pt-10 pb-16 px-4">
                <div class="">
                    <img
                    id="sliderImage"
                    class="w-full rounded-2xl bg-center bg-cover duration-500"
                    src="{{ url('images/template-square-ex.png')}}" alt="">
                    <img
                    id="sliderImage2"
                    class="w-full rounded-2xl bg-center bg-cover duration-500"
                    src="{{ url('images/template.jpeg')}}" alt="">
                </div>

                <div class="arrow-button absolute top-[43%] left-8 w-10 h-10 text-2xl rounded-full p-2 bg-black/20 text-white cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"
                        /> </svg>
                </div>

                <div class="arrow-button absolute top-[43%] right-8 w-10 h-10 text-2xl rounded-full p-2 bg-black/20 text-white cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/> </svg>
                </div>

                <div class="flex justify-center mt-6">
                    <div id="indicator1" class="h-1 w-2 rounded mr-1 bg-[#206EA8]"></div>
                    <div id="indicator2" class="h-1 w-2 rounded ml-1 bg-[#206EA8]"></div>
                </div>
            </div>

            <p class="flex justify-center text-sm">Buat kartu lebaranmu disini</p>

            <div class="w-full my-8 flex justify-center" style="bottom: 5%">
                <a href="{{ route('greetingcard.index') }}"
                class="text-center w-1/2 py-4 bg-[#206EA8] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >Create</a>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>

    <script>
        var index = 0;

        $('#sliderImage2').hide()
        $('#indicator2').addClass("bg-gray-500")
        $('.arrow-button').on("click", function() {
            arrowButton()
        })

        function arrowButton() {
            if (index == 0) {
                $('#sliderImage2').fadeIn()
                $('#sliderImage').hide()
                $('#sliderImage2').show()
                $('#indicator2').removeClass("bg-gray-500")
                $('#indicator1').addClass("bg-gray-500")
                index = 1
            } else {
                $('#sliderImage').fadeIn()
                $('#sliderImage2').hide()
                $('#sliderImage').show()
                $('#indicator1').removeClass("bg-gray-500")
                $('#indicator2').addClass("bg-gray-500")
                index = 0
            }
            console.log('change image '+ index)
        }
    </script>
</x-app-layout>
