<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Elenco dipendenti') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @can('create', App\Models\User::class)
                <x-mary-button label="AGGIUNGI DIPENDENTE" class="mb-6 btn-outline" link="/users/create" />
            @endcan

            @if (session('success'))
                <div class="mb-6 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @php
                    $headers = [
                        ['key' => 'name', 'label' => 'Nome dipendente'],
                        ['key' => 'role.name', 'label' => 'Ruolo aziendale'],
                    ]
                @endphp
                <x-mary-table :headers="$headers" :rows="$users" striped>
                    @can('delete', App\Models\User::class)
                        @scope('actions', $user)
                            <x-mary-button icon="o-trash" wire:click="delete({{ $user->id }})" wire:confirm='Sei sicuro di eliminare questo dipendente?' spinner class="btn-sm" />
                        @endscope
                    @endcan
                </x-mary-table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
