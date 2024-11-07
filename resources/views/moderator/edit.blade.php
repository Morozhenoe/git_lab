@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">
                    Карточка пользователя
                </div>
                <div class="card-body">
                    <form action="{{ route('moderator.holiday.update', $user->id) }}" method="post">
                        @method('patch')
                        @csrf

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    Имя: {{ $user->first_name }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    Фамилия: {{ $user->last_name }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    Отчество: {{ $user->father_name }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    Адрес почты: {{ $user->email }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    Номер телефона: {{ $user->phone_number }}
                                </div>
                            </div>

                            @foreach($user->holidays as $holiday)
                                <div>
                                    <ul>
                                        <li>Заказ: {{ $holiday->id }}</li>
                                        <li>Адрес: {{ $holiday->place }}</li>
                                        <li><input type="checkbox" name="is_finished[{{ $holiday->id }}]" value="true"></li>
                                    </ul>
                                </div>
                            @endforeach

                            <div class="row mb-3">
                                <label for="#####" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Обновить">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
