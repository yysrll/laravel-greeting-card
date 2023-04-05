
<x-app-layout>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('getImage', [$greeting->id, 0]) }}" />
        <meta property="og:title" content="Kartu ucapan" />
        <meta property="og:image" content="{{ route('getImage', [$greeting->id, 0]) }}" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-lsFxiBOH+L9X9l+LEpIqwOsJsqmwMQfZG2rNtTAlTnJez10sKVdNjL9Ia+Lz3d3CJ19rk86wp1mAcKwJDlQGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </x-slot>

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

            <div class="relative w-full" id="picture">
                <div class="">
                    <img src="{{url('images/template.png')}}" alt="" id="myImage">
                </div>
                <div class="absolute bottom-[170px] inset-0 flex justify-center items-center z-0">
                    <img
                    class="h-1/2 w-3/4 object-cover"
                    src="{{ Storage::url($greeting->photo_url) }}" alt="">
                </div>
                <div class="absolute top-0 z-10">
                    <img src="{{url('images/template.png')}}" alt="">
                </div>
                <div class="absolute z-20 w-full" style="bottom: 10%">
                    <p class="px-4 text-center text-3xl text-white underline underline-offset-8"
                    style="font-family: Myriad-Pro-Regular"
                    ><u class="text-transparent">.</u>{{ $greeting->sender_name }}<u class="text-transparent">.</u></p>
                </div>
            </div>

            <div class="relative w-full" id="picture">
                <div class="">
                    <img src="{{url('images/template-square.png')}}" alt="" id="myImage">
                </div>
                <div class="absolute bottom-[150px] inset-0 flex justify-center items-center z-0">
                    <img
                    class="h-3/4 w-1/2 object-cover"
                    src="{{ Storage::url($greeting->photo_url) }}" alt="">
                </div>
                <div class="absolute top-0 z-10">
                    <img src="{{url('images/template-square.png')}}" alt="">
                </div>
                <div class="absolute z-20 w-full" style="bottom: 8%">
                    <p class="text-center text-3xl text-white underline underline-offset-8"
                    style="font-family: Myriad-Pro-Regular"
                    ><u class="text-transparent">.</u>{{ $greeting->sender_name }}<u class="text-transparent">.</u></p>
                </div>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ url('js/share.js') }}"></script>
</x-app-layout>
