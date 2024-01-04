<!-- resources/views/livewire/click-counter.blade.php -->

<div>
    <h1>Contador de Clics</h1>
    <p>
        Clics: {{ $count }}
    </p>
    <button wire:click="increment">Incrementar</button>
</div>
