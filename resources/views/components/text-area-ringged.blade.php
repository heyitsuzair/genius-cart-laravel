@props(['name', 'label', 'value', 'placeholder'])
<label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
<textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" rows="4"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
    placeholder="Write your thoughts here... *">{{ $value }}</textarea>
@error($name)
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
