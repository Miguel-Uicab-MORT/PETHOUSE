<div @if ($eventClickEnabled) wire:click.stop="onEventClick('{{ $event['id'] }}')" @endif
    class="px-3 py-2 @if ($event['status'] == 1) bg-green-500 @elseif ($event['status'] == 2) bg-orange-600 @elseif ($event['status'] == 3) bg-red-600 @endif border rounded-lg shadow-md cursor-pointer">

    <p class="text-sm font-medium text-white">
        {{ $event['title'] }}
    </p>
    <p class="mt-2 text-xs text-white">
        {{ $event['description'] ?? 'No description' }}
    </p>
</div>
