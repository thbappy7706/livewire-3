<div>
    <h2>Post List</h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr wire:key="{{$post->id}}">
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{str($post->content)->words(8)}}</td>
                <td>
                    <button wire:click="delete({{$post->id}})" wire:confirm="Are you sure?" class="btn btn-danger">Delete</button>
                </td>

            </tr>
        @endforeach


        </tbody>
    </table>
</div>
