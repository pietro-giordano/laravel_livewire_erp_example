<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registra ingresso/uscita') }}
        </h2>
    </x-slot>

    @if (session('error'))
        <div class="mb-6 alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">

                <div class="flex flex-col items-center pt-20 pb-12">
                    @if ($spinner)
                        <span class="loading loading-spinner loading-lg"></span>
                    @endif

                    @if (!$isChecked)
                    <button wire:click='checkIn'
                        class="text-5xl text-white rounded-full h-[100px] w-[320px] bg-success">
                        Check-in
                    </button>
                    @endif

                    @if ($isChecked)
                    <button wire:click='checkOut' class="h-[100px] w-[320px] text-5xl text-white rounded-full bg-error">
                        Check-out
                    </button>
                    @endif

                    @if ($lastAttendance)
                        <div class="mt-16 text-white">
                            @if ($lastAttendance->check_out)
                                <div>Ora e data ultimo check: {{ $lastAttendance->check_out }}</div>
                            @else
                                <div>Ora e data ultimo check: {{ $lastAttendance->check_in }}</div>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>