<div>
    <div>
        <input type="text" wire:model="word" />
        <button wire:click="search">Cari</button>
    
        @if ($definition)
            <p>{{ $definition }}</p>
        @endif
    </div>
</div>
