<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Crea nuovo dipendente') }}
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

                <x-mary-form wire:submit='save' class="py-12 sm:px-12 lg:px-36">
                    <x-mary-input label="Nome" inline wire:model.live='name' />
                    <x-mary-input label="Email" inline wire:model.live='email' type='email' />
                    <x-mary-input label="Password temporanea" inline wire:model.live='password' type='password' />
                    <x-mary-input label="Conferma password temporanea" inline wire:model.live='password_confirmation' type='password' />
                    <x-mary-select label="Ruolo aziendale" inline :options="$roles" option-value='id' option-label='name' placeholder="..." wire:model.live="role" />

                    <x-slot:actions>
                        <x-mary-button label="ANNULLA" link='/users' />
                        <x-mary-button label="CREA" class="btn-primary" type="submit" spinner='save' />
                    </x-slot:actions>
                </x-mary-form>

            </div>
        </div>
    </div>
</div>
