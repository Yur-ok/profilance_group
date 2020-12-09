@extends('layouts.app')

@section('form')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['url' => route('links.store')]) }}
    {{ Form::label('origin_url', 'Укажите ссылку в поле ниже') }}
    {{ Form::text('origin_url', $value=null, ['autofocus', 'class' => 'form-control form-control-lg', 'placeholder' => 'www.example.com'] ) }}
    <div class="row justify-content-center">
        {{ Form::submit('Укоротить', ['class' => 'btn btn-primary my-4 col-4']) }}
    </div>
    {{ Form::close() }}
@endsection

@section('result')
    @isset($link)
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('links.show', $link) }}" target="_blank" class="mr-3 result"><h3 class="mb-0">{{ $link->getShort() }}</h3></a>
            <button class="btn btn-success" id='copy' onclick='toClipboard()'>Скопировать в буфер</button>
        </div>
    @endisset
@endsection
