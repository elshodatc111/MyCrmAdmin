@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">O'quv markazlar</div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>#</th>
                            <th>O'quv Markaz</th>
                            <th>Drektor</th>
                            <th>Telefon</th>
                            <th>Sayt manzili</th>
                            <th>Status</th>
                        </tr>
                        @foreach($Markaz as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['markaz'] }}</td>
                                <td>{{ $item['drektor'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td>{{ $item['link'] }}</td>
                                <td>
                                    <a href="{{ route('show',$item['id'] ) }}" class="btn btn-primary px-1 py-0"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('update',$item['id'] ) }}" class="btn btn-warning text-white px-1 py-0"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Yangi o'quv markazlar</div>
                <div class="card-body">
                    <form action="{{ route('create') }}" method="post">
                        @csrf 
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">O'quv markaz nomi</label>
                                <input type="text" name="markaz" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">O'quv markaz drektori</label>
                                <input type="text" name="drektor" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Sayt manzili</label>
                                <input type="text" name="link" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">O'quv markaz telefon raqami</label>
                                <input type="text" name="phone" required class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50 mt-2">O'quv markazni saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
