<x-app-layout>
    <x-slot name="header">
        <h2 class="text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@section('content')
<div class="container">
    <div class="card mt-5 mx-auto" style="width: 60rem;">
        <div class="bg-white mt-3 ml-3">
            <div class='row'>
                <h3 class="col-7 text-dark mb-4">Tasks List</h3>
                
                <div class="col-5 text-right">
                    <a href="/task" class="bg-primary mr-2 py-1 h4 px-3 text-white font-bold rounded" style= "hover:bg-danger">+</a>
                </div>
            </div>
            <table class="text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Task</th>
                    <th class="text-left p-3">Creation date</th>
                    <th class="text-left p-3">Number of comments</th>
                    <th class="text-left p-3">Actions</th>
                    
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->tasks as $task)
                    <tr class="border-b hover:bg-orange-100">
                        <td class="p-3 px-5">
                            {{$task->description}}
                        </td>

                        <td class="p-3 px-1">
                            {{$task->created_at}}
                        </td>

                        <td class="p-3 px-1">
                            {{count($task->comments)}}
                        </td>

                        <td class="p-3">
                            
                            <a href="/task/{{$task->id}}" name="edit" class="border-0 p-2 mr-3 text-sm bg-secondary text-white rounded">Edit</a>
                            <button data-toggle='modal' data-target='#confirmDeleteTaskModal' class="border-0 p-2 mr-3 text-sm bg-danger text-white rounded btn-outline-light shadow-none">Delete</button>
                            {{ csrf_field() }}
                            <button onclick="loadComments({{$task->id}})" id='viewComments' name="comments" data-toggle='modal' data-target='#commentsModal'  formmethod="GET" class="border-0 p-2 text-sm bg-info text-white rounded btn-outline-light shadow-none">Comments</button>
                            <input type='hidden' id='task_id' value="{{$task->id}}">
                            
                            <div class="modal" id="confirmDeleteTaskModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure to delete this task ?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <form action="/task/{{$task->id}}" class="inline-block">
                                        <button type="submit" name="delete" formmethod="POST" class="border-0 p-2 text-sm bg-danger text-white rounded btn-outline-light shadow-none">Proceed</button>
                                            {{ csrf_field() }}
                                    </form>
                                    </div>

                                    

                                    </div>
                                </div>
                            </div>

                            <div class="modal" id="commentsModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">All comments for this task</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div id='commentsModalBody' class="modal-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection

</x-app-layout>
