@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header text-center">{{ $Markaz['markaz'] }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Drektor</th>
                            <td style="text-align:right;">{{ $Markaz['drektor'] }}</td>
                            <th>Yaratildi</th>
                            <td style="text-align:right;">{{ $Markaz['created_at'] }}</td>
                        </tr>
                        <tr>
                            <th>Telefon</th>
                            <td style="text-align:right;">{{ $Markaz['phone'] }}</td>
                            <th>Ogohlantirish</th>
                            <td style="text-align:right;">{{ $setting['EndData'] }}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td style="text-align:right;">{{ $Markaz['link'] }}</td>
                            <th>Status</th>
                            <td style="text-align:right;">{{ $setting['Status'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header text-center">Sozlamalar</div>
                <div class="card-body">
                    <form action="{{ route('settings') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $Markaz['id'] }}">
                        <input type="date" name="EndData" class="form-control" placeholder="Ogohlantirish" required>
                        <input type="test" name="Status" class="form-control mt-2" placeholder="true / false" required>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header text-center">To'lov</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $Markaz['id'] }}">
                        <input type="number" name="plus" class="form-control" placeholder="Summa" required>
                        <input type="test" name="plus" class="form-control mt-2" placeholder="To'lov haqida" required>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header text-center">Aktiv Talabalar</div>
                <div class="card-body">
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>{{ $active[1]['data'] }}</th>
                            <td>{{ $active[1]['count'] }}</td>
                            <th>{{ $active[2]['data'] }}</th>
                            <td>{{ $active[2]['count'] }}</td>
                            <th>{{ $active[3]['data'] }}</th>
                            <td>{{ $active[3]['count'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ $active[4]['data'] }}</th>
                            <td>{{ $active[4]['count'] }}</td>
                            <th>{{ $active[5]['data'] }}</th>
                            <td>{{ $active[5]['count'] }}</td>
                            <th>{{ $active[6]['data'] }}</th>
                            <td>{{ $active[6]['count'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ $active[7]['data'] }}</th>
                            <td>{{ $active[7]['count'] }}</td>
                            <th>{{ $active[8]['data'] }}</th>
                            <td>{{ $active[8]['count'] }}</td>
                            <th>{{ $active[9]['data'] }}</th>
                            <td>{{ $active[9]['count'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ $active[10]['data'] }}</th>
                            <td>{{ $active[10]['count'] }}</td>
                            <th>{{ $active[11]['data'] }}</th>
                            <td>{{ $active[11]['count'] }}</td>
                            <th>{{ $active[12]['data'] }}</th>
                            <td>{{ $active[12]['count'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header text-center">Sozlamalar</div>
                <div class="card-body">
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>Yuborildi</th>
                            <th>Mavjud</th>
                        </tr>
                        <tr>
                            <td>{{ $sms['counte'] }}</td>
                            <td>{{ $sms['maxsms'] }}</td>
                        </tr>
                    </table>
                    <form action="{{ route('createSms') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $Markaz['id'] }}">
                        <input type="number" name="plus" class="form-control" placeholder="SMS soni" required>
                        <button type="submit" class="btn btn-primary mt-1 w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header text-center">SMSlar kiritildi</div>
                <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>#</th>
                        <th>SMS soni</th>
                        <th>Qoshilgan vaqt</th>
                    </tr>
                    @foreach($SmsHistory as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header text-center">To'lovlar</div>
                <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>#</th>
                        <th>To'lov summasi</th>
                        <th>To'lov haqida</th>
                        <th>To'lov vaqti</th>
                    </tr>
                    @foreach($SmsHistory as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
