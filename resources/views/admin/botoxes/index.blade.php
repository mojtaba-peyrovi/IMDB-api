@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.botox.title')</h3>
    @can('botox_create')
    <p>
        <a href="{{ route('admin.botoxes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('botox_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.botoxes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.botoxes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($botoxes) > 0 ? 'datatable' : '' }} @can('botox_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('botox_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('botox_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
                                    @can('botox_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.botoxes.restore', $botox->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('botox_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.botoxes.perma_del', $botox->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('botox_view')
                                    <a href="{{ route('admin.botoxes.show',[$botox->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('botox_edit')
                                    <a href="{{ route('admin.botoxes.edit',[$botox->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('botox_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.botoxes.destroy', $botox->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('botox_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.botoxes.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection