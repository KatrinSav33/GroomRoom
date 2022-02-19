@extends('welcome')

@section('content')
    @if(session()->has('add'))
        <div class="alert alert-success">Категория успешно добавлена</div>
    @endif
    <form class="form-category" method="POST" enctype="multipart/form-data">
        <p>Добавить категорию</p>
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control-category @error('name') is-invalid @enderror" id="inputName" aria-describedby="inputNameValidation" placeholder="Название категории">
            @error('name')
            <div id="inputNameValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary-category">Добавить категорию</button>
    </form>
    @if(session()->has('destroy'))
        <div class="alert alert-success">Категория удалена</div>
    @endif
    <table class="table-category">
        <thead>
        <tr>
            <th>Название категории</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr class="tr-category">
                <td>{{$category->name}}</td>
                <td>
                    <form class="delete-form-category" action="{{route('destroyCategory', ['category' => $category->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="" value="Удалить">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="invalid-feedback">Категории отсутствуют</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
