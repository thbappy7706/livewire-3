<div>
    Counter: {{$count}}

    <button wire:click.throttle.1000ms="increment">+</button>
    <button wire:click="decrement">-</button>
    <button wire:click="square(2)">Square</button>
    <button wire:click="resetVal">Reset</button>
</div>
