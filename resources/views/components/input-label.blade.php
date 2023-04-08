@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-[#206EA8]']) }}>
    {{ $value ?? $slot }}
</label>
