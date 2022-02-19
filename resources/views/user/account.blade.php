@extends('welcome')

@section('content')
    @forelse($applications as $application)
        <div class="main">
            <div class="card">
                <div class="application-card">
                    <p class="id-card">ID: {{$application->id}}</p>
                    <img src="../public/storage/{{$application->photo}}" alt="photo">
                    <p>{{$application->created_at}}</p>
                    <p>{{$application->name_animal}}</p>
                    <p class="description-applications">{{$application->description}}</p>
                    <p>Категория: {{$application->name}}</p>
                    <p>Статус: {{$application->status}}</p>
                    @if($application->status == 'Новая')
                        <form class="delete-form" action="{{route('delete', ['id' => $application->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary" onclick="return confirmDelete();" data-confirm = "true" data-operation = "delete" data-id = "{{$application->id}}">Удалить</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <h4 class="no-applications">Вы не создали ни одной заявки <a href="{{route('create')}}">Создать заявку</a></h4>
    @endforelse


    <script>
        function confirmDelete(){
            return confirm('Вы действительно хотите удалить заявку?');
        }
    </script>

@endsection
