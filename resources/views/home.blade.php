@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('Главная страница') }}
                </div>

                <div class="text-center mt-4">
                    Активные заказы
                </div>
                @foreach(Auth::user()->holidays as $holiday)
                    <div class="card ms-4 me-4 mt-2">
                        <div class="card-body">
                            <div>Идетификатор праздника: {{ $holiday->id }}</div>
                            <div>Контактная информация: {{ $holiday->contact_info }}</div>
                            <div>Дата праздника: {{ $holiday->date_of_holiday }}</div>
                            <div>Место: {{ $holiday->place }}</div>
                            <div>Количество гостей: {{ $holiday->count_of_guests }}</div>
                            <div>Статус: {{ $holiday->status }}</div>
                            <div>Приоритет: {{ $holiday->priority }}</div>
                            <div>Организатор:{{ $holiday->supervisor->name }} {{ $holiday->supervisor->last_name }} {{ $holiday->supervisor->father_name }}</div>
                            <div>Контактная информация организатор: {{ $holiday->supervisor->contact_info }}</div>
                            <div>Заказ сделан: {{ $holiday->created_at }}</div>
                        </div>
                    </div>
                @endforeach

                <div class="mb-2">
                    <form method="get" action="#"></form>
                    <div class="text-center mt-4">
                        История заказов
                    </div>
                    @foreach(Auth::user()->holidaysHistory as $holiday)
                        <div class="card ms-4 me-4 mt-2">
                            <div class="card-body">
                                <div>Дата заказа: {{ $holiday->created_at }}</div>
                                <div>Дата начала: {{ $holiday->start_date }}</div>
                                <div>Дата окончания: {{ $holiday->end_date }} </div>
                            </div>
                        </div>
                    @endforeach
{{--                    <div class="container d-flex align-items-center justify-content-center">--}}
{{--                        <div>--}}
{{--                            <input type="submit" class="btn btn-primary mt-2" value="Смотреть больше">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
