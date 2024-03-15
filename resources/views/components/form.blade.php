<x-mary-form wire:submit="save">
    <x-mary-input label="Name" wire:model="name" />
    <x-mary-input label="Amount" prefix="USD" money hint="It submits an unmasked value" />

    <x-slot:actions>
        <x-mary-button label="Cancel" />
        <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-mary-form>