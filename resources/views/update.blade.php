@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">O'quv markazni yangilash</div>
                <div class="card-body">
                    <form action="{{ route('updatePost') }}" method="post">
                        @csrf 
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">O'quv markaz nomi</label>
                                <input type="text" value="{{ $Markaz['markaz'] }}" name="markaz" required class="form-control">
                                <input type="hidden" name="id" value="{{ $Markaz['id'] }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">O'quv markaz drektori</label>
                                <input type="text" value="{{ $Markaz['drektor'] }}" name="drektor" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Sayt manzili</label>
                                <input type="text" value="{{ $Markaz['link'] }}" name="link" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">O'quv markaz telefon raqami</label>
                                <input type="text" value="{{ $Markaz['phone'] }}" name="phone" required class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50 mt-2">O'zgarishlarni saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
