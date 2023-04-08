<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-[#3CA949] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-green-500 focus:bg-green-300 active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
