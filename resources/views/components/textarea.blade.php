@props(['name', 'label'])
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
<textarea id="{{ $name }}"
    {{ $attributes->merge(['class' => 'block w-full text-gray-900 border-0 rounded-md bg-gray-200 sm:text-xs focus:ring-0']) }}>
{{ $slot }}
</textarea>
@error($name)
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
