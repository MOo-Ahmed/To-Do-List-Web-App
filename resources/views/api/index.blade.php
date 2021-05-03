<x-app-layout>
    <x-slot name="header">
        <h2 class="text-dark">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>
