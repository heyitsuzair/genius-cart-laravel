@props(['name', 'label', 'value', 'placeholder', 'type'])
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
<input type={{ $type }} id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
    value="{{ $value }}"
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) }}>
@error($name)
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
