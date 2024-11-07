@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header text-center">
            Основная инфомация
        </div>

        <div class="card-body">
            <form action="{{ route('profile.update', $user->id)}}" method="post">
                @method('patch')
                @csrf

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Имя') }}</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Фамилия') }}</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="father_name" class="col-md-4 col-form-label text-md-end">{{ __('Отчество') }}</label>

                    <div class="col-md-6">
                        <input id="father_name" type="text" class="form-control" name="father_name" value="{{ $user->father_name }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Адрес почты') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Номер телефона') }}</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
                    </div>
                </div>
                <div class="row mb-3 @if(!(session('success') || session('failure'))) d-none @endif">
                    <label for="#####" class="col-md-4 col-form-label text-md-end"></label>
                    <div class="col-md-6">
                        @if(session('success'))
                            <span class="text-success">
                            {{ session('success') }}
                        </span>
                        @else
                            <span class="text-danger">
                            {{ session('failure') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="#####" class="col-md-4 col-form-label text-md-end"></label>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header text-center">
            Смена пароля
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update.password', $user->id)}}" method="post">
                @method('patch')
                @csrf

                <div class="row mb-3">
                    <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control" name="current_password" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('Новый пароль') }}</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Подтверждение пароля') }}</label>

                    <div class="col-md-6">
                        <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="#####" class="col-md-4 col-form-label text-md-end"></label>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
