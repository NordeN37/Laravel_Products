@extends('voyager::master')

{{--@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))--}}

@section('css')

@stop

@section('page_header')
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
                <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("POST") }}
            @endif
            {{ csrf_field() }}

                <div class="container">
                    <div class="card bg-light mt-3">
                        <div class="card-body">
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">Import User Data</button>
                                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
                            </form>
                        </div>
                    </div>
                </div>


@stop

@section('javascript')

@stop
