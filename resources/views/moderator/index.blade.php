@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($users as $user)
                <div class="card mt-4">
                    <div class="card-header text-center">
                        Карточка пользователя
                    </div>

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
                                Имя: {{ $user->father_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                Имя: {{ $user->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                Имя: {{ $user->phone_number }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <a href="{{ route('moderator.holiday.edit', $user->id) }}" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
