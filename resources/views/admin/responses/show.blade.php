@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.responses.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.responses.fields.question')</th>
                            <td field-key='question'>{{ $response->question->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.responses.fields.answer')</th>
                            <td field-key='answer'>{{ $response->answer->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.responses.fields.content')</th>
                            <td field-key='content'>{!! $response->content !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.responses.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
