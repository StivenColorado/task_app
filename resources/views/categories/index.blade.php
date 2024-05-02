@extends('app')

@section('content')
    <div class="container w-75 mt-4 sborder p-4 d-flex flex-column justify-content-center align-items-center">
        <div class="row mx-auto">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror

                <div class="mb-3">
                    <label for="title" class="pt-1 m-1 text-white fs-5 fw-bold">Titulo de la Categoria</label>
                    <input type="text" class="form-control text-white" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter a category" style="background: #303030;">
                </div>

                <div class="mb-3">
                    <label for="color" class="pt-1 m-1 text-white fs-5 fw-bold">Color de la categoria</label>
                    <input type="color" class="form-control" name="color" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter a color" style="background: #303030;">
                </div>

                <button type="submit" class="btn button-custom rounded mt-3">Crear nueva tarea</button>
            </form>
            <div>
                @foreach ($categories as $category)
                    <div class="row py-1 w-auto m-2 rounded item-todo d-flex justify-content-center align-items-center">

                        <div class="col-md-9 d-flex align-items-center">
                            <div class="p-2 m-2" style="background-color: {{ $category->color }}"></div>

                            {{ $category->name }}
                        </div>

                        <div class="col-md-3 d-flex justify-content-end align-items-center gap-1">
                            <a class="text-decoration-none text-white"
                                href="{{ route('categories.show', ['category' => $category->id]) }}">
                                <button class="btn btn-warning btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </button>
                            </a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#{{ $category->id }}">

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
                        </div>
                    </div>

                    <div class="modal fade" id="{{ $category->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    deseas eliminar la categoria "{{ $category->name }}" ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
