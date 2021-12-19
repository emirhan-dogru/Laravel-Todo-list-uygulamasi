@extends('layout')
@section('title', 'Todo-list')

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Kullanıcılar</h3>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Adı</th>
                    <th scope="col">Eklenme Tarihi</th>
                    <th scope="col" style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['users'] as $user)
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td>{{$user->email }}</td>
                        <td>
                            <a href="{{ route('admin.todoList' , ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Görüntüle</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span>{{ $data['users']->links('pagination::bootstrap-4') }}</span>
        </div>
    </div>

    <style>
        .w-5 {
            display: none;
        }

    </style>
@endsection
