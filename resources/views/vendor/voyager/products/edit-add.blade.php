@extends('voyager::master')

{{--@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))--}}

@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
    @if(isset($dataTypeContent->id))
        <a href="{{config('app.url')}}/post/{{$dataTypeContent->slug}}" target="_blank" class="btn btn-primary">{{__('view post')}}</a>
    @endif
@stop

@section('content')
    <div class="page-content container-fluid">
        <form id="target-js" class="form-edit-add" role="form" action="@if(isset($dataTypeContent->id)){{ route('update', $dataTypeContent->id) }}@else{{ route('store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            {{ csrf_field() }}
            @if(isset($dataTypeContent->id))
                {{ method_field("POST") }}
            @endif

            <input type="hidden" name="views" value="1">
            <div class="row">
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> {{ __('voyager::post.title') }}
                                <span class="panel-desc"> {{ __('voyager::post.title_sub') }}</span>
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('voyager::multilingual.input-hidden', [
                                '_field_name'  => 'title',
                                '_field_trans' => get_field_translations($dataTypeContent, 'title')
                            ])
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('voyager::generic.title') }}" value="{{ $dataTypeContent->title ?? '' }}">
                        </div>
                    </div>

                    <!-- ### CONTENT ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('voyager::post.content') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>

                        <div class="panel-body">
                            @include('voyager::multilingual.input-hidden', [
                                '_field_name'  => 'body',
                                '_field_trans' => get_field_translations($dataTypeContent, 'body')
                            ])
                            @php
                                $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                                $row = $dataTypeRows->where('field', 'body')->first();
                            @endphp
                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                        </div>
                    </div><!-- .panel -->
                    

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('voyager::post.additional_fields') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @php
                                $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                                $exclude = ['title', 'body', 'excerpt', 'slug', 'status', 'category_id', 'sizes', 'author_id', 'featured', 'image_one','image_two','image_three','image_four', 'meta_description', 'meta_keywords', 'seo_title'];
                            @endphp

                            @foreach($dataTypeRows as $row)
                                @if(!in_array($row->field, $exclude))
                                    @php
                                        $display_options = $row->details->display ?? NULL;
                                    @endphp
                                    @if (isset($row->details->formfields_custom))
                                        @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                                    @else
                                        <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $row->slugify }}
                                            <label for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['options' => $row->details])
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> {{ __('voyager::post.details') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="slug">{{ __('voyager::post.slug') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'slug',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'slug')
                                ])
                                <input type="text" class="form-control" id="slug" name="slug"
                                       placeholder="slug"
                                       {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}
                                       value="{{ $dataTypeContent->slug ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="status">{{ __('voyager::post.status') }}</label>
                                <select class="form-control" name="status">
                                    <option value="PUBLISHED"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PUBLISHED') selected="selected"@endif>{{ __('voyager::post.status_published') }}</option>
                                    <option value="DRAFT"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'DRAFT') selected="selected"@endif>{{ __('voyager::post.status_draft') }}</option>
                                    <option value="PENDING"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PENDING') selected="selected"@endif>{{ __('voyager::post.status_pending') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">{{ __('voyager::post.category') }}</label>
                                <select class="form-control" name="category_id">
                                    @foreach(Voyager::model('Category')::all() as $category)
                                        <option value="{{ $category->id }}"@if(isset($dataTypeContent->category_id) && $dataTypeContent->category_id == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="featured">{{ __('voyager::generic.featured') }}</label>
                                <input type="checkbox" name="featured"@if(isset($dataTypeContent->featured) && $dataTypeContent->featured) checked="checked"@endif>
                            </div>
                        </div>
                    </div>

                    <!-- ### IMAGE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::post.image') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(isset($dataTypeContent->image_one))
                                <img src="{{ filter_var($dataTypeContent->image_one, FILTER_VALIDATE_URL) ? $dataTypeContent->image_one : Voyager::image( $dataTypeContent->image_one ) }}" style="width:100%" />
                            @endif
                            <input type="file" name="image_one">

                                @if(isset($dataTypeContent->image_two))
                                    <img src="{{ filter_var($dataTypeContent->image_two, FILTER_VALIDATE_URL) ? $dataTypeContent->image_two : Voyager::image( $dataTypeContent->image_two ) }}" style="width:100%" />
                                @endif
                            <input type="file" name="image_two">

                                @if(isset($dataTypeContent->image_three))
                                    <img src="{{ filter_var($dataTypeContent->image_three, FILTER_VALIDATE_URL) ? $dataTypeContent->image_three : Voyager::image( $dataTypeContent->image_three ) }}" style="width:100%" />
                                @endif
                            <input type="file" name="image_three">

                                @if(isset($dataTypeContent->image_four))
                                    <img src="{{ filter_var($dataTypeContent->image_four, FILTER_VALIDATE_URL) ? $dataTypeContent->image_four : Voyager::image( $dataTypeContent->image_four ) }}" style="width:100%" />
                                @endif
                            <input type="file" name="image_four">

                        </div>
                    </div>
                    <!-- ### SIZE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i>Размеры</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="sizes">86</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                                <input class="form-control" type="number" name="sizes[86]" value="{{ json_decode($dataTypeContent->sizes, true)[86] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">92</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                                <input class="form-control" type="number" name="sizes[92]" value="{{ json_decode($dataTypeContent->sizes, true)[92] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">98</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                                <input class="form-control" type="number" name="sizes[98]" value="{{json_decode($dataTypeContent->sizes, true)[98] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">104</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                                <input class="form-control" type="number" name="sizes[104]" value="{{json_decode($dataTypeContent->sizes, true)[104] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">110</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[110]" value="{{json_decode($dataTypeContent->sizes, true)[110] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">116</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[116]" value="{{json_decode($dataTypeContent->sizes, true)[116] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">122</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[122]" value="{{json_decode($dataTypeContent->sizes, true)[122] ?? null}}">
                            </div>
                            <div  class="form-group">
                                <label for="sizes">128</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[128]" value="{{json_decode($dataTypeContent->sizes, true)[128] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">134</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[134]" value="{{json_decode($dataTypeContent->sizes, true)[134] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">140</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[140]" value="{{json_decode($dataTypeContent->sizes, true)[140] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">146</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[146]" value="{{json_decode($dataTypeContent->sizes, true)[146] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">152</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[152]" value="{{json_decode($dataTypeContent->sizes, true)[152] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">158</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[158]" value="{{json_decode($dataTypeContent->sizes, true)[158] ?? null}}">
                            </div>
                            <div class="form-group">
                                <label for="sizes">164</label>
                                @include('voyager::multilingual.input-hidden', [
                                  '_field_name'  => 'sizes',
                                  '_field_trans' => get_field_translations($dataTypeContent, 'sizes')
                              ])
                             <input class="form-control" type="number" name="sizes[164]" value="{{json_decode($dataTypeContent->sizes, true)[164] ?? null}}">
                            </div>

                        </div>
                    </div>

                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i> {{ __('voyager::post.seo_content') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="meta_description">{{ __('voyager::post.meta_description') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'meta_description',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'meta_description')
                                ])
                                <textarea class="form-control" name="meta_description">{{ $dataTypeContent->meta_description ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">{{ __('voyager::post.meta_keywords') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'meta_keywords',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'meta_keywords')
                                ])
                                <textarea class="form-control" name="meta_keywords">{{ $dataTypeContent->meta_keywords ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="seo_title">{{ __('voyager::post.seo_title') }}</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'seo_title',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'seo_title')
                                ])
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="{{ $dataTypeContent->seo_title ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right">
                @if(isset($dataTypeContent->id)){{ __('voyager::post.update') }}@else <i class="icon wb-plus-circle"></i> {{ __('voyager::post.new') }} @endif
            </button>
        </form>

    <?php
        if(isset($_POST['sizes'])) {
            //код проверки
            if (empty($errors)) {
                $_POST['sizes'] = json_encode($_POST['sizes']);
                header("Location:"." ".route('voyager.products.store'));
                // код сохранения
                if(isset($dataTypeContent->id)){
                    header("Location:"." ".route('voyager.products.update', $dataTypeContent->id));
                    exit;
                }else{
                    header("Location:"." ".route('voyager.products.store'));
                    exit;
                }
            }
        }
        ?>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form>
    </div>
    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>
                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;
        function deleteHandler(tag, isMulti) {
            return function() {
                $file = $(this).siblings(tag);
                params = {
                    slug:   '{{ $dataType->slug }}',
                    filename:  $file.data('file-name'),
                    id:     $file.data('id'),
                    field:  $file.parent().data('field-name'),
                    multi: isMulti,
                    _token: '{{ csrf_token() }}'
                }
                $('.confirm_delete_name').text(params.filename);
                $('#confirm_delete_modal').modal('show');
            };
        }
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });
            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif
            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });
            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));
            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {
                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });
                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@stop
