<div>
    <x-slot name="header">
        <x-header>
            <x-slot name="view">
                Calendario
            </x-slot>
        </x-header>
    </x-slot>

    <livewire:components.index-calendar
        before-calendar-view="livewire.components.header-calendar"
    />

</div>
