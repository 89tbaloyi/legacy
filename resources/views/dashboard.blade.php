<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <b>{{Auth::user()->name}}</b>
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="card">
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>{{session('success')}}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                         </div>
                      @endif
                      <div class="card-header">
                          All Tasks
                      </div>
                          <div class="card-body">
                              <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Created</th>                                       
                                      <th scope="col">Modify</th>                                                         
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($tasks as $task )                                         
                                    <tr>                       
                                      <td>{{$task->id}}</td>
                                      <td>{{$task->description}}</td>
                                      <td>{{$task->created_at}}</td>                                         
                                      <td><a href="{{url('task/edit/'.$task->id)}}" class="btn btn-success">Edit</a></td> 
                                      <td><a href="{{url('task/delete/'.$task->id)}}" class="btn btn-danger">Delete</a></td>                                   
                                    </tr>
                                    @endforeach
                                   
                                  </tbody>
                                </table>
                          </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                     <div class="card-header">
                         Create Task
                     </div>
                     <div class="card-body">
                      <form action="{{route('task-store')}}" method="POST">
                          @csrf
                          <div class="form-group">                              
                            <input type="text" name="description" class="form-control" id="description" placeholder="Enter Task">
                            @error('description')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror                                                          
                          </div>

                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                     </div>
                  </div>
              </div>
              
          </div>

      </div>
  </div>
</x-app-layout>
