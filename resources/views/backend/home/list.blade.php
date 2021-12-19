@extends('layout')
@section('title', 'Todo-list')

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{ $data['user']->name }} <span class="span">adlı kullanıcının listesi</span></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.Index')  }}" class="btn btn-primary btn-sm">Geri Dön</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Adı</th>
                            <th scope="col">Eklenme Tarihi</th>
                            <th>Durumu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($row = 1)
                        @foreach($data['todo'] as $todo)
                            <tr>
                                <th scope="row">{{ $row++  }}</th>
                                <td>{{ $todo->name}}</td>
                                <td>{{$todo->created_at->format('d-m-Y H:i')}}</td>
                                <td>
                                    @if($todo->status == 0)
                                        <span class="text-success">Yapıldı</span>
                                    @else
                                        <span class="text-danger">Yapılmadı</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span>{{ $data['todo']->links('pagination::bootstrap-4') }}</span>
        </div>
    </div>

    <style>
        .w-5 {
            display: none;
        }

        .span {
            font-weight: normal;
        }

    </style>
@endsection
