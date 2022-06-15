<div>

    {{-- Controls --}}
    <div class="p-2">
        <div class="relative z-0 inline-flex shadow-sm">
            <button
                wire:click.stop="goToPreviousMonth"
                type="button"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-l-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                <
            </button>
            <button
                wire:click.stop="goToCurrentMonth"
                type="button"
                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                Today
            </button>
            <button
                wire:click.stop="goToNextMonth"
                type="button"
                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                >
            </button>
            <button
                type="button"
                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-700 border border-gray-300 rounded-r-md focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100">
                {{ $startsAt->format('F Y') }}
            </button>
        </div>
    </div>

    {{-- Unscheduled Events --}}
    <div class="p-2 bg-orange-100">
        <h1 class="text-lg font-medium">
            Unscheduled Events
        </h1>
        <div class="flex py-2">
            @foreach($unscheduledEvents as $event)
                <div
                    class="p-2 mr-2 bg-white border rounded shadow"
                    ondragstart="onLivewireCalendarEventDragStart(event, '{{ $event->id }}')"
                    draggable="true">
                    <p class="text-sm font-medium">
                        {{ $event->title }}
                    </p>
                    <p class="text-xs">
                        {{ $event->notes }}
                    </p>
                    <button
                        wire:click.stop="deleteEvent({{ $event->id }})"
                        type="button"
                        class="inline-flex items-center px-2 py-1 mt-2 text-xs font-medium leading-4 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200">
                        Delete
                    </button>
                </div>
            @endforeach
            @if($unscheduledEvents->isEmpty())
                <p class="text-sm text-gray-700">
                    No events found
                </p>
            @endif
        </div>
    </div>

    <div>
        <div>
            @if($isModalOpen)
                @include('components.create-appointment-modal')
            @endif
        </div>

        <div>
            @if($selectedAppointment)
                @include('components.appointment-details-modal')
            @endif
        </div>
    </div>
</div>
