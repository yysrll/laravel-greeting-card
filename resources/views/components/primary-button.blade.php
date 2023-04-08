<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-[#206EA8] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-blue-500 focus:bg-blue-300 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
