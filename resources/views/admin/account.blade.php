@extends('welcome')

@section('content')
  <p class="admin-p">Заявки пользователей</p>
    @forelse($applications as $application)
        <div class="main">
            <div class="card">
                <div class="application-card">
                    <p class="id-card">ID пользователя: {{$application->id_user}}</p>
                    <p class="id-card">№ заявки: {{$application->id}}</p>
                    <img src="../public/storage/{{$application->photo}}" alt="photo">
                    <p>{{$application->created_at}}</p>
                    <p>{{$application->name_animal}}</p>
                    <p class="description-applications">{{$application->description}}</p>
                    <p>Категория: {{$application->name}}</p>
                    <p>Статус: {{$application->status}}</p>
                    @if($application->status == 'Новая')
                        <a class="status-change" href="{{route('changeStatus', ['id' => $application->id])}}">Изменить статус</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <h4 class="no-applications">Заявки отсутствуют</h4>
    @endforelse


    <script>
        function confirmDelete(){
            return confirm('Вы действительно хотите удалить заявку?');
        }
    </script>

@endsection
