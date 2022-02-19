@extends('welcome')

@section('content')

    <div class="main">
        <div class="card">
            <div class="application-card">
                <p class="id-card">№ заявки: {{$application->id}}</p>
                <p class="id-card">ID пользователя: {{$application->id_user}}</p>
                <img src="../public/storage/{{$application->img}}" alt="photo">
                <p>{{$application->created_at}}</p>
                <p>{{$application->title}}</p>
                <p class="description-applications">{{$application->description}}</p>
                <p>Категория: {{$application->name}}</p>
                <p>Статус: {{$application->status}}</p>
                @if($application->status == 'Новая')
                    <div class="btn-application-decision">
                        <a class="btn btn-primary-category" onclick="return acceptFunction()">Принять</a>
                        <a class="btn btn-primary-category" onclick="return rejectFunction()">Отклонить</a>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <form class="accept" action="{{route('changeStatusPost', ['id' => $application->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="file" name="new_img" class="form-control @error('new_img') is-invalid @enderror" id="inputImg" aria-describedby="inputImgValidation" accept="image/*">
            @error('new_img')
            <div id="inputImgValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <input type="hidden" name="id" value="{{$application->id}}">
        <input type="hidden" name="status" value="{{"Решена"}}">
        <button type="submit" class="btn btn-primary-category">Отправить</button>
    </form>

    <form class="reject" action="{{route('changeStatusPost', ['id' => $application->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <textarea  name="cause" class="form-textarea-control @error('cause') is-invalid @enderror" id="inputCause" aria-describedby="inputCauseValidation" placeholder="Причина отказа"></textarea>
            @error('cause')
            <div id="inputCauseValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <input type="hidden" name="id" value="{{$application->id}}">
        <input type="hidden" name="status" value="{{"Отклонена"}}">
        <button type="submit" class="btn btn-primary-category">Отправить</button>
    </form>
    <script>
        let accept = document.querySelector('.accept');
        let reject = document.querySelector('.reject');

        function acceptFunction(){
            reject.classList.remove('reject--active');
            accept.classList.add('accept--active');
        }
        function rejectFunction(){
            accept.classList.remove('accept--active');
            reject.classList.add('reject--active');
        }
    </script>


@endsection
