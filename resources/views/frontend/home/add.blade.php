@extends('layout')
@section('title', 'Todo-list')

@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Yeni Todo-list Ekle</h3>
                </div>
                <div class="col-md-6 text-end">
                        <a href="{{ route('home.Index')  }}" class="btn btn-primary btn-sm">Geri Dön</a>
                </div>
            </div>
            <hr>
           <div class="content">
               <form action="{{ route('home.Create') }}" method="post">
                   @csrf
                   <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">Todo-list Adı</label>
                       <input type="text" class="form-control" name="todoName" value="{{ old('todoName') }}">
                       @foreach ($errors->all() as $error)
                           <div class="form-text" style="color: red">{{ $error }}</div>
                       @endforeach

                   </div>
                   <div class="text-end">
                       <button type="submit" class="btn btn-success">Kaydet</button>
                   </div>
               </form>
           </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="/css/style.css">
@endpush
