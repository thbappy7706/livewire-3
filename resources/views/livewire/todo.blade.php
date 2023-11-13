<div>

    <form wire:submit="add">
{{--        <input type="text" wire:model.live.debounce.5ms="todoItem">--}}
        <input type="text" wire:model="todoItem">
        <span>Current todo: {{$todoItem}}</span>
        {{--    <button wire:click="add" type="button">Add Todo</button>--}}
        <button type="submit">Add Todo</button>
    </form>


    <ul>
        @if($todos)
            @foreach($todos as $todo)
                <li>{{$todo}}</li>
            @endforeach
        @endif
    </ul>
</div>
