@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.botox.title')</h3>
    
    {!! Form::model($botox, ['method' => 'PUT', 'route' => ['admin.botoxes.update', $botox->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('botox_name', trans('quickadmin.botox.fields.botox-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('botox_name', old('botox_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('botox_name'))
                        <p class="help-block">
                            {{ $errors->first('botox_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_per_unit', trans('quickadmin.botox.fields.price-per-unit').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('price_per_unit', old('price_per_unit'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_per_unit'))
                        <p class="help-block">
                            {{ $errors->first('price_per_unit') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_per_vial', trans('quickadmin.botox.fields.price-per-vial').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price_per_vial', old('price_per_vial'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_per_vial'))
                        <p class="help-block">
                            {{ $errors->first('price_per_vial') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('reward_points', trans('quickadmin.botox.fields.reward-points').'', ['class' => 'control-label']) !!}
                    {!! Form::number('reward_points', old('reward_points'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('reward_points'))
                        <p class="help-block">
                            {{ $errors->first('reward_points') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('popular', trans('quickadmin.botox.fields.popular').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('popular', 0) !!}
                    {!! Form::checkbox('popular', 1, old('popular', old('popular')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('popular'))
                        <p class="help-block">
                            {{ $errors->first('popular') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('apply_btn', trans('quickadmin.botox.fields.apply-btn').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('apply_btn', 0) !!}
                    {!! Form::checkbox('apply_btn', 1, old('apply_btn', old('apply_btn')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('apply_btn'))
                        <p class="help-block">
                            {{ $errors->first('apply_btn') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('expire', trans('quickadmin.botox.fields.expire').'', ['class' => 'control-label']) !!}
                    {!! Form::text('expire', old('expire'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('expire'))
                        <p class="help-block">
                            {{ $errors->first('expire') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('exclusive', trans('quickadmin.botox.fields.exclusive').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('exclusive', 0) !!}
                    {!! Form::checkbox('exclusive', 1, old('exclusive', old('exclusive')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exclusive'))
                        <p class="help-block">
                            {{ $errors->first('exclusive') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('exclusive_desc', trans('quickadmin.botox.fields.exclusive-desc').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('exclusive_desc', old('exclusive_desc'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exclusive_desc'))
                        <p class="help-block">
                            {{ $errors->first('exclusive_desc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('featured', trans('quickadmin.botox.fields.featured').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('featured', 0) !!}
                    {!! Form::checkbox('featured', 1, old('featured', old('featured')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('featured'))
                        <p class="help-block">
                            {{ $errors->first('featured') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('featured_desc', trans('quickadmin.botox.fields.featured-desc').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('featured_desc', old('featured_desc'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('featured_desc'))
                        <p class="help-block">
                            {{ $errors->first('featured_desc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('off_peak_available', trans('quickadmin.botox.fields.off-peak-available').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('off_peak_available', 0) !!}
                    {!! Form::checkbox('off_peak_available', 1, old('off_peak_available', old('off_peak_available')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('off_peak_available'))
                        <p class="help-block">
                            {{ $errors->first('off_peak_available') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('about_offpeak', trans('quickadmin.botox.fields.about-offpeak').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about_offpeak', old('about_offpeak'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('about_offpeak'))
                        <p class="help-block">
                            {{ $errors->first('about_offpeak') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('about_package', trans('quickadmin.botox.fields.about-package').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about_package', old('about_package'), ['class' => 'form-control editor', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('about_package'))
                        <p class="help-block">
                            {{ $errors->first('about_package') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clinic_name_id', trans('quickadmin.botox.fields.clinic-name').'', ['class' => 'control-label']) !!}
                    {!! Form::select('clinic_name_id', $clinic_names, old('clinic_name_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clinic_name_id'))
                        <p class="help-block">
                            {{ $errors->first('clinic_name_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop