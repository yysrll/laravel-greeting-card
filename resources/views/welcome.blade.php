<x-app-layout>
    <div class="md:grid md:grid-cols-3 pt-10">
        <div class="col-span-1">

        </div>
        <div class="col-span-1 m-4 md:m-0">

            <div class="flex justify-center">
                <img src="{{url('images/template.jpeg')}}" alt="">
            </div>

            <form action="">
                <div class="my-4">
                    <a href="{{ route('greetingcard.index') }}"
                    class="block w-full text-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Create</a>
                </div>
            </form>

        </div>
        <div class="col-span-1">

        </div>
    </div>
</x-app-layout>
