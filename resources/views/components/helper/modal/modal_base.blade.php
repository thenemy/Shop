<div

    class="fixed z-10 h-full w-full inset-0 hide_during_loading  overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class=" sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left
            shadow-xl transform transition-all sm:my-8 sm:align-middle
            sm:max-w-max sm:w-full">
            {!!  $slot !!}
        </div>
    </div>
</div>

