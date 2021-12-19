@extends('layout')
@section('title', 'Todo-list')

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Listem</h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('home.Add')  }}" class="btn btn-success btn-sm">Yeni Ekle</a>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Adı</th>
                    <th scope="col">Eklenme Tarihi</th>
                    <th scope="col" style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @php($row = 1)
                @foreach($data['todo'] as $todo)
                    <tr>
                        <th scope="row">{{ $todo->id  }}</th>
                        <td>{{$todo->name}}</td>
                        <td>{{$todo->created_at->format('d-m-Y H:i')}}</td>
                        <td>
                            <a href="{{ route('home.Edit' , ['id' => $todo->id])  }}" class="btn btn-primary btn-sm "><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('home.Deactive' , ['id' => $todo->id])  }}"
                               class="btn btn-success btn-sm "><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span>{{ $data['todo']->links('pagination::bootstrap-4') }}</span>
        </div>
    </div>

    <style>
        .w-5 {
            display: none;
        }

    </style>
@endsection
