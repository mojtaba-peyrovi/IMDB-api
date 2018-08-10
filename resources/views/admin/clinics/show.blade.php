@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clinics.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clinics.fields.clinic-name')</th>
                            <td field-key='clinic_name'>{{ $clinic->clinic_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clinics.fields.photo')</th>
                            <td field-key='photo's> @foreach($clinic->getMedia('photo') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clinics.fields.logo')</th>
                            <td field-key='logo'>@if($clinic->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clinic->logo) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clinics.fields.city')</th>
                            <td field-key='city'>{{ $clinic->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clinics.fields.area')</th>
                            <td field-key='area'>{{ $clinic->area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clinics.fields.location')</th>
                            <td field-key='location'>{{ $clinic->location_address }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#botox" aria-controls="botox" role="tab" data-toggle="tab">Botox</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="botox">
<table class="table table-bordered table-striped {{ count($botoxes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.botox.fields.botox-name')</th>
                        <th>@lang('quickadmin.botox.fields.price-per-unit')</th>
                        <th>@lang('quickadmin.botox.fields.price-per-vial')</th>
                        <th>@lang('quickadmin.botox.fields.reward-points')</th>
                        <th>@lang('quickadmin.botox.fields.popular')</th>
                        <th>@lang('quickadmin.botox.fields.apply-btn')</th>
                        <th>@lang('quickadmin.botox.fields.expire')</th>
                        <th>@lang('quickadmin.botox.fields.exclusive')</th>
                        <th>@lang('quickadmin.botox.fields.exclusive-desc')</th>
                        <th>@lang('quickadmin.botox.fields.featured')</th>
                        <th>@lang('quickadmin.botox.fields.featured-desc')</th>
                        <th>@lang('quickadmin.botox.fields.off-peak-available')</th>
                        <th>@lang('quickadmin.botox.fields.about-offpeak')</th>
                        <th>@lang('quickadmin.botox.fields.about-package')</th>
                        <th>@lang('quickadmin.botox.fields.clinic-name')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($botoxes) > 0)
            @foreach ($botoxes as $botox)
                <tr data-entry-id="{{ $botox->id }}">
                    <td field-key='botox_name'>{{ $botox->botox_name }}</td>
                                <td field-key='price_per_unit'>{{ $botox->price_per_unit }}</td>
                                <td field-key='price_per_vial'>{{ $botox->price_per_vial }}</td>
                                <td field-key='reward_points'>{{ $botox->reward_points }}</td>
                                <td field-key='popular'>{{ Form::checkbox("popular", 1, $botox->popular == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='apply_btn'>{{ Form::checkbox("apply_btn", 1, $botox->apply_btn == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='expire'>{{ $botox->expire }}</td>
                                <td field-key='exclusive'>{{ Form::checkbox("exclusive", 1, $botox->exclusive == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='exclusive_desc'>{!! $botox->exclusive_desc !!}</td>
                                <td field-key='featured'>{{ Form::checkbox("featured", 1, $botox->featured == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='featured_desc'>{!! $botox->featured_desc !!}</td>
                                <td field-key='off_peak_available'>{{ Form::checkbox("off_peak_available", 1, $botox->off_peak_available == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='about_offpeak'>{!! $botox->about_offpeak !!}</td>
                                <td field-key='about_package'>{!! $botox->about_package !!}</td>
                                <td field-key='clinic_name'>{{ $botox->clinic_name->clinic_name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['botoxes.restore', $botox->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['botoxes.perma_del', $botox->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('botoxes.show',[$botox->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('botoxes.edit',[$botox->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['botoxes.destroy', $botox->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="20">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clinics.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
