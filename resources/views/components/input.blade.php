@props(['name', 'label', 'value', 'placeholder', 'type'])
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
<input type={{ $type }} id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
    value="{{ $value }}"
    {{ $attributes->merge(['class' => 'block w-full text-gray-900 border-0 rounded-md bg-gray-200 sm:text-xs focus:ring-0']) }}>
@error($name)
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
