@extends('welcome')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">Заявка успешно отправлена</div>
    @endif
    @error('field')
    <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    <form method="POST" enctype="multipart/form-data">
        <p>Создание новой заявки</p>
        @csrf
        <div class="mb-3">
            <input type="text" name="name_animal" class="form-control @error('name_animal') is-invalid @enderror" id="inputName_animal" aria-describedby="inputName_animalValidation" placeholder="Кличка питомца">
            @error('name_animal')
            <div id="inputName_animalValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-textarea-control @error('description') is-invalid @enderror" id="inputDescription" placeholder="Опишите, какую работу необходимо выполнить"></textarea>
            @error('description')
            <div id="inputDescriptionValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select-control @error('id_category') is-invalid @enderror" name="id_category" id="inputId_category" aria-describedby="inputId_categoryValidation">
                <option selected disabled>Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('id_category')
            <div id="inputId_categoryValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="file" name="photo" class="form-file-control @error('photo') is-invalid @enderror" id="inputPhoto" aria-describedby="inputPhotoValidation" accept="image/*">
            @error('photo')
            <div id="inputPhotoValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
        <input type="hidden" name="status" value="{{"Новая"}}">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

@endsection
































































