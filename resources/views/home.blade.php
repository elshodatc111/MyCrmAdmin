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
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Yangi o'quv markazlar</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">O'quv markaz nomi</label>
                                <input type="text" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">O'quv markaz drektori</label>
                                <input type="text" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Sayt manzili</label>
                                <input type="text" required class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">O'quv markaz telefon raqami</label>
                                <input type="text" required class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50 mt-2">O'quv markazni saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
