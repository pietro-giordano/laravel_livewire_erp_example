<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registra ingresso/uscita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">

                <div class="flex flex-col items-center py-20">
                    @if (!$isChecked)
                        <button class="text-5xl text-white rounded-full h-[100px] w-[320px] bg-success">
                            Check-in
                        </button>
                    @endif

                    @if ($isChecked)
                        <button class="h-[100px] w-[320px] text-5xl text-white rounded-full bg-error">
                            Check-out
                        </button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
