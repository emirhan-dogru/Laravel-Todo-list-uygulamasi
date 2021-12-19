@extends('layout')
@section('title', 'Todo-list')

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Çöp Kutusu</h3>
                </div>
                <div class="col-md-6 text-end">
                        <a href="{{ route('home.Index')  }}" class="btn btn-primary btn-sm">Geri Dön</a>
                </div>
            </div>
            <hr>
            @if(count($data['todo']))
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
                    <th scope="row">{{ $row++  }}</th>
                    <td>{{$todo->name}}</td>
                    <td>{{$todo->created_at->format('d-m-Y H:i')}}</td>
                    <td>
                        <a href="{{ route('home.Active' , ['id' => $todo->id])  }}" class="btn btn-primary btn-sm "><i class="fa fa-undo-alt"></i></a>
                        <a href="{{ route('home.Delete' , ['id' => $todo->id])  }}" onclick="return confirm('Bu Todolisti silmek istediğinizden emin misiniz? \n(Bu işlem geri alınamaz!)')" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <div class="container-fluid p-0">
                    <div class="alert alert-warning rounded-0 text-center" role="alert">
                        <b>Çöp Kutun Şuan Boş!</b>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
