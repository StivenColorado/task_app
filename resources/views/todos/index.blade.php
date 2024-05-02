@extends('app')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')
    <div class="container col-sm-12 w-50 mt-4 sborder p-4 d-flex flex-column justify-content-center align-items-center">
        <form class="w-75" action="{{ route('todos') }}" method="POST">
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
                    aria-describedby="emailHelp" placeholder="Enter a task" style="background: #303030;">
            </div>
            <label for="category_id" class="pt-1 m-1 text-white fs-5 fw-bold">Categoria de la tarea</label>
            <select name="category_id" class="form-select text-white" style="background: #303030;">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn button-custom rounded mt-3">Crear nueva tarea</button>
        </form>
        @foreach ($todos as $todo)
            <a class="text-decoration-none text-white w-75" href="{{ route('todos-show', ['id' => $todo->id]) }}">
                <div class="row py-1 w-auto m-2 rounded item-todo d-flex justify-content-center align-items-center"
                    title="presiona para editar">
                    <div class="col-md-9 d-flex align-items-center">
                        {{ $todo->title }}
                    </div>
                    <div class="col-md-3 d-flex justify-content-end align-items-center" style="max-height: 2.2em;">
                        <small class="p-1 m-2 rounded" style="min-width: 7em;width:auto;background: {{ $todo->category->color ?? 'gray' }}">
                            {{ $todo->category->name ?? 'n-found' }}
                        </small>

                        <form action="{{ route('todos-destroy', ['id' => $todo->id]) }}" method="POST" class="d-flex">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="btn btn-danger btn-sm d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
