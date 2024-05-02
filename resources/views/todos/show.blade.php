@extends('app')

@section('content')
    <div class="container w-50 mt-4 border p-4">
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
                <label for="title" class="pt-1 m-1 text-white fs-5 fw-bold">Titulo de la tarea</label>
                <input type="text" class="form-control text-white" name="title" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter a task" value="{{ $todo->title }}" style="background: #303030;">
            </div>
            <div class="mb-3">
                <div class="d-flex flex-column">
                    <label class="pt-1 m-1 text-white fs-5 fw-bold" for="">categoria</label>
                    <small class="text-white p-1">actual: {{ $todo->category->name ?? 'no asignado' }} </small>
                </div>
                <select name="category_id" class="form-select text-white" style="background: #303030;">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn button-custom rounded mt-3">Actualizar tarea</button>
        </form>
    </div>
@endsection
