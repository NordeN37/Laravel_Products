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
                <form action="{{ Route('mail_sendingAdmin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control richTextBox" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success">Отправить</button>
                </form>
            </div>
        </div>
    </div>


@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            var additionalConfig = {
                selector: 'textarea.richTextBox[name="body"]',
            }

            $.extend(additionalConfig, "{}")

            tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));
        });
    </script>
@stop
