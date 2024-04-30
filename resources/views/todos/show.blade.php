@extends('app')

@section('content')
    <div class="container w-25 mt-4 sborder p-4">
        <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror

            <div class="mb-3">
                <label for="title">Titulo de la tarea</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter a task" value="{{ $todo->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar tarea</button>
        </form>
    </div>
@endsection
