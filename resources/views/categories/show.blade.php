@extends('app')

@section('content')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror

                <div class="mb-3">
                    <label for="title">Titulo de la tarea</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter a task" value="{{$category->name}}">
                </div>

                <div class="mb-3">
                    <label for="color">Color de la categoria</label>
                    <input type="color" class="form-control" name="color" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter a color" value="{{$category->color}}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>

        </div>
    </div>
@endsection
