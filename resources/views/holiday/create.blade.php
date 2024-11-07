@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Заказ праздника
                </div>

                <div class="card-body">
                    <form action="{{ route('holidays.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="contact_info" class="col-md-4 col-form-label text-md-end">{{ __('Контактная информация') }}</label>

                            <div class="col-md-6">
                                <input id="contact_info" type="text" class="form-control" name="contact_info" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_of_holiday" class="col-md-4 col-form-label text-md-end">{{ __('Дата праздница') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_holiday" type="date" class="form-control" name="date_of_holiday" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="count_of_guests" class="col-md-4 col-form-label text-md-end">{{ __('Число гостей') }}</label>

                            <div class="col-md-6">
                                <input id="count_of_guests" type="text" class="form-control" name="count_of_guests" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="place" class="col-md-4 col-form-label text-md-end">{{ __('Место проведения') }}</label>

                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control" name="place" value="">
                            </div>
                        </div>

                        <div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="row mb-3">
                            <label for="#####" class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary" value="Отправить заявку">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
