<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-1">
        </div>
        <div class="relative col-span-1 m-4 md:m-0">

            <div class="flex justify-center">
                <img src="{{url('images/template.jpeg')}}" alt="">
            </div>

            <div class="absolute w-full my-4 flex justify-center z-10" style="bottom: 5%">
                <a href="{{ route('greetingcard.index') }}"
                class="text-center w-1/2 py-4 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-300 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >Create</a>
            </div>

        </div>
        <div class="col-span-1">

        </div>
    </div>
</x-app-layout>
