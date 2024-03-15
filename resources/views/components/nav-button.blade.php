<!-- Dark mode -->
<div class="relative me-3">
    <span class="inline-flex rounded-md">
        <x-mary-theme-toggle class="btn btn-circle btn-ghost" @theme-changed="console.log($event.detail)" />
    </span>
</div>
@guest
<x-mary-button link="{{ route('login') }}" wire:navigate
    class="text-gray-200 btn-primary btn-sm me-3 dark:text-gray-100">
    <x-mary-icon name="o-user" /> {{ __('login') }}
</x-mary-button>
@endguest