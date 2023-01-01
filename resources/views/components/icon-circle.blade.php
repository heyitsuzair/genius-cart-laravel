@props(['badge', 'badgeValue'])
<div {{ $attributes->merge(['class' => 'bg-gray-100 flex items-center justify-center rounded-full']) }}>
    <i class="{{ $slot }}" aria-hidden="true"></i>
    @if ($badge)
        <div
            class="bg-gray-700 top-0 absolute badge transition-all -left-1 flex items-center justify-center w-6 h-6 text-white text-xs rounded-full">
            <span>{{ $badgeValue }}</span>
        </div>
    @endif
</div>
