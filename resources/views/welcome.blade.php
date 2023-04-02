<x-app-layout>
    <div class="md:grid md:grid-cols-3">
        <div class="col-span-1">

        </div>
        <div class="relative col-span-1 m-4 md:m-0">

            <div class="flex justify-center">
                <img src="{{url('images/template.jpeg')}}" alt="">
            </div>

            <form action="" class="absolute inset-0 flex justify-center items-center top-[700px]">
                <div class="my-4">
                    <a href="{{ route('greetingcard.index') }}"
                    class="block w-full text-center px-16 py-4 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Create</a>
                </div>
            </form>

        </div>
        <div class="col-span-1">

        </div>
    </div>
</x-app-layout>
