<div
    class="fixed inset-x-0 bottom-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center"
    wire:click.stop="">

    <div class="fixed inset-0 transition-opacity" wire:click.stop="$set('isModalOpen', false)">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full sm:p-6"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modal-headline">

        <h1 class="text-xl font-medium text-indigo-600">
            New Appointment
        </h1>

        <div class="grid grid-cols-1 row-gap-6 col-gap-4 mt-4 sm:grid-cols-6">
            <div class="sm:col-span-6">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                    Title
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input
                        wire:model.lazy="newAppointment.title"
                        class="block w-full p-2 border rounded sm:text-sm sm:leading-5"
                        placeholder="What's the appointment about?"
                    />
                </div>
            </div>

            <div class="sm:col-span-6">
                <label for="about" class="block text-sm font-medium leading-5 text-gray-700">
                    Notes
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <textarea
                        rows="3"
                        wire:model.lazy="newAppointment.notes"
                        placeholder="Details regarding the appointment"
                        class="block w-full p-2 transition duration-150 ease-in-out border rounded sm:text-sm sm:leading-5"
                    ></textarea>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                    Scheduled At
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input
                        type="date"
                        wire:model.lazy="newAppointment.scheduled_at"
                        class="block w-full p-2 border rounded sm:text-sm sm:leading-5"
                        placeholder="What's the appointment about?"
                    />
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                    Priority
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <select
                        wire:model.lazy="newAppointment.priority"
                        class="block w-full p-2 bg-white border rounded appearance-none sm:text-sm sm:leading-5">
                        <option value="high">High</option>
                        <option value="normal">Normal</option>
                        <option value="low">Low</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <div class="flex w-full rounded-md shadow-sm sm:col-start-2">
                <button
                    type="button"
                    wire:click.prevent="saveAppointment"
                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo sm:text-sm sm:leading-5">
                    Confirm
                </button>
            </div>
            <div class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:col-start-1">
                <button
                    type="button"
                    wire:click="$set('isModalOpen', false)"
                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
