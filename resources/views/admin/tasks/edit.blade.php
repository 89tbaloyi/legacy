<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">               
                <div class="col-md-6">
                    <div class="card">
                       <div class="card-header">
                           Edit Task
                       </div>
                       <div class="card-body">
                        <form action="{{url('task/update/'.$task->id)}}" method="POST">
                            @csrf

                            <div class="form-group">                              
                              <input type="text" name="description" class="form-control" id="description" value="{{$task->description}}">
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
