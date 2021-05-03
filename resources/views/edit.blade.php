<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Task') }}
    </h2>
</x-slot>
@section('content')
<div class="card mt-5 mx-auto rounded" style='width:35rem;'>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        
            <form method="POST" action="/task/{{ $task->id }}">

                <div class="form-group">
                    <textarea name="description" class="rounded border leading-normal resize-none w-full h-20 py-2 px-3 font-medium focus:outline-none focus:bg-white"  style='width:28rem;'>{{$task->description }}</textarea>	
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" name="update" class="border-0 bg-primary text-white font-bold py-2 px-4 rounded">Update task</button>
                </div>
            {{ csrf_field() }}
            </form>

            <div class="form-group">
                    <textarea id="comment_description" class="leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" style='min-width:28rem;' placeholder='Enter your comment'></textarea>  
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button onclick="addComment(document.getElementById('comment_description').value, {{ $task->id }})" type="button" class="bg-primary text-white font-bold py-2 px-4 border-0 rounded">Add comment</button>
                </div>
                {{ csrf_field() }}
        </div>
    </div>
</div>
@endsection

</x-app-layout>