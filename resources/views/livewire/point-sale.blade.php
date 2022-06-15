<div>
    <x-slot name="header">
        <x-header>
            <x-slot name="view">
                Punto de venta
            </x-slot>
        </x-header>
    </x-slot>
<div class="container grid grid-cols-1 gap-3 mx-auto mt-3 bg-gray-100 md:grid-cols-3">
    <section class="md:col-span-2">
    @livewire('components.search-product')
    </section>
    <section>
        @livewire('components.cart-sale')
    </section>
</div>
</div>
