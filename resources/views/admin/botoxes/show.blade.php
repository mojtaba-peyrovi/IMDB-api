@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.botox.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.botox.fields.botox-name')</th>
                            <td field-key='botox_name'>{{ $botox->botox_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.price-per-unit')</th>
                            <td field-key='price_per_unit'>{{ $botox->price_per_unit }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.price-per-vial')</th>
                            <td field-key='price_per_vial'>{{ $botox->price_per_vial }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.reward-points')</th>
                            <td field-key='reward_points'>{{ $botox->reward_points }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.popular')</th>
                            <td field-key='popular'>{{ Form::checkbox("popular", 1, $botox->popular == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.apply-btn')</th>
                            <td field-key='apply_btn'>{{ Form::checkbox("apply_btn", 1, $botox->apply_btn == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.expire')</th>
                            <td field-key='expire'>{{ $botox->expire }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.exclusive')</th>
                            <td field-key='exclusive'>{{ Form::checkbox("exclusive", 1, $botox->exclusive == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.exclusive-desc')</th>
                            <td field-key='exclusive_desc'>{!! $botox->exclusive_desc !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.featured')</th>
                            <td field-key='featured'>{{ Form::checkbox("featured", 1, $botox->featured == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.featured-desc')</th>
                            <td field-key='featured_desc'>{!! $botox->featured_desc !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.off-peak-available')</th>
                            <td field-key='off_peak_available'>{{ Form::checkbox("off_peak_available", 1, $botox->off_peak_available == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.about-offpeak')</th>
                            <td field-key='about_offpeak'>{!! $botox->about_offpeak !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.about-package')</th>
                            <td field-key='about_package'>{!! $botox->about_package !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.botox.fields.clinic-name')</th>
                            <td field-key='clinic_name'>{{ $botox->clinic_name->clinic_name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.botoxes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
