{{--
injected models: 
$survey, 
(if Questionnaire@show): $questionnaire 

used in three routes:
frontend.create
admin.surveys.show
admin.questionnaires.show
--}}


{{-- form tag; only in frontend.create route --}}
@if (\Route::currentRouteName() == 'frontend.create')
<form action="{{route('frontend.store')}}" 
    method="POST"
    class="form form-horizontal gw-form" 
    style="margin-top: 50px; margin-bottom: 30px;"
    id="questionnaire"
    >
{{ csrf_field() }}
<input type="hidden" name="survey_id" id="survey_id" class="form-control" value="{{$survey->id}}">
@endif

{{-- fields list (in all routes) --}}
<fieldset @if (\Route::currentRouteName() == 'frontend.create') class="gw-fieldset" @endif>

    {{-- questionnaire title --}}
    <legend id="qst_{{ $questionnaire->id or 'create' }}">{{$survey->title}}</legend>

    {{-- introduction --}}
    <div class="mb-4 gw-introduction">{!! $survey->introduction or '' !!}</div>
    
    {{-- items --}}
    @foreach ( $survey->items()->orderBy('order')->get() as $item)

        {{-- item --}}
        <section class="form-group gw-item q_{{$item->question->id ?? ''}} row" id="i_{{$item->id ?? ''}}" style="page-break-inside:avoid;">
            {{-- label (question) --}}
            <label 
                class="@if (\Route::currentRouteName() == 'admin.surveys.show' && !$item->label ) col-md-6 col-lg-8 col-lg-offset-2 @else col-xs-12 @endif {{-- control-label --}} gw-label @if ($item->label) bg-primary gw-item-label @endif ">

                {{-- debug --}}
                {{-- @if ($survey->id == 2023 and Auth::check() )
                    i_{{$item->id ?? ''}} (q_{{$item->question->id ?? ''}})
                @endif --}}

                {{-- question text --}}
                {!! $item->order !!} {!! $item->question->title ?? '' !!}
            </label>

            {{-- answer(s) --}}

                {{-- item is label; display no question --}}
                @if( $item->label )

                {{-- answerlist type == radio|checkbox --}}
                @elseif ($item->question->answerlist->type == 'radio' || $item->question->answerlist->type == 'checkbox')

                    <div class="gw-answers @if (\Route::currentRouteName() == 'admin.surveys.show') col-md-6 col-lg-6 col-lg-offset-3 @else col-xs-10 col-xs-offset-1 @endif ">

                        {{-- report-or-answer begin--}}
                        {{-- if report, just show chart --}}
                        @if (\Route::currentRouteName() == 'admin.surveys.show')
                            @if ($item->label != 1)
                                {{-- report --}}
                                @if (\Request::query('rawdata')) @include('partials.answerData') @else @include('partials.answerChart') @endif
                            @endif

                        @else
                            {{-- answer --}}
                            @foreach ($item->question->answerlist->answers as $answer)
                                <div class="{{$item->question->answerlist->type}} {{-- form-check --}} gw-answer" >
                                    {{-- label --}}
                                    <label 
                                        class="form-check-label font-weight-normal"
                                        for="{{$item->question->id}}_{{$answer->id}}_select"
                                        >

                                            {{-- input --}}
                                            <input 
                                                type="{{$item->question->answerlist->type}}" 
                                                class="form-check-input" 
                                                id="{{$item->question->id}}_{{$answer->id}}_select"
                                                
                                                {{-- name --}}
                                                @if($item->question->answerlist->type == 'checkbox')
                                                    name="{{$item->question->id}}_id_{{$answer->id}}"
                                                @else
                                                    name="{{$item->question->id}}_id"
                                                @endif

                                                value="{{$answer->id}}" 

                                                {{-- disable input on show/index --}}
                                                @if (\Route::currentRouteName() != 'frontend.create')
                                                    disabled = "disabled"
                                                @endif
                                                
                                                {{-- is checked --}}
                                                @if ( 
                                                        /** display filled questionnaire */
                                                        (
                                                            \Route::currentRouteName() != 'frontend.create' 
                                                            && isset($questionnaire)
                                                            && $questionnaire->is_question_answered($item->question_id,$answer->id)
                                                        ) ||
                                                        /** radio input returning from error */
                                                        (
                                                            \Route::currentRouteName() == 'frontend.create' 
                                                            && $item->question->answerlist->type == 'radio'
                                                            && old($item->question->id.'_id') == $answer->id
                                                        ) ||
                                                        /** checkbox input returning from error */
                                                        (
                                                            \Route::currentRouteName() == 'frontend.create' 
                                                            && $item->question->answerlist->type == 'checkbox'
                                                            && old($item->question->id.'_id_'.$answer->id) == $answer->id
                                                        ) 
                                                    )
                                                    checked="checked"
                                                @endif
                                            >
                                            
                                            {{-- label text --}}
                                            <span 
                                                id="{{$item->question->id}}_{{$answer->id}}_text"
                                                class="@if ( isset($questionnaire) && $questionnaire->is_question_answered($item->question_id,$answer->id) ) font-weight-bold @endif "
                                                >

                                                {{-- debug --}}
                                                {{-- @if ($survey->id == 2023 and Auth::check())
                                                    {{$item->question->id}}_{{$answer->id}}_select
                                                @endif --}}

                                                {{ $answer->title }}
                                            </span>
                                            
                                            @include('partials.js.boldOnSelect')
                                    </label>

                                        {{-- textarea response content --}}
                                        @if ( 
                                            /** display filled */
                                            \Route::currentRouteName() == 'admin.questionnaires.show'
                                            && !empty($questionnaire->responses->where('answer_id',$answer->id)->where('question_id',$item->question->id)->first()->content) 
                                            )
                                            <br>
                                            {{$questionnaire->responses->where('answer_id',$answer->id)->where('question_id',$item->question_id)->first()->content or ''}}
                                        @elseif (
                                            /** create new */
                                            \Route::currentRouteName() == 'frontend.create'
                                            && $answer->open == 1
                                            )
                                            <textarea
                                                name="{{$item->question->id}}_content_{{$answer->id}}" 
                                                id="{{$item->question->id}}_content_{{$answer->id}}" 
                                                class="form-control" 
                                                rows="5" 
                                                placeholder=""
                                                required="required"
                                                >{{old($item->question->id.'_content_'.$answer->id, '')}}</textarea>

                                            @include('partials.js.toggleTextarea')
                                        
                                        @endif
                                </div>
                            @endforeach

                        {{-- report-or-answer end--}}
                        @endif
                        
                        {{-- info tooltip for checkbox --}}
                        @if ($item->question->answerlist->type == 'checkbox' && \Route::currentRouteName() == 'frontend.create')
                            <i class="fa fa-info-circle text-muted"></i> <small class="text-muted">@lang('Επιλέξτε όσα ισχύουν')</small>
                        @endif

                    </div>

                    {{-- display any content value in admin.surveys.show --}}
                    @if (
                        \Route::currentRouteName() == 'admin.surveys.show' && 
                        App\Response::whereIn('questionnaire_id',$item->survey->questionnaires->pluck('id'))->where('question_id',$item->question_id)->where('content','!=',"")
                    )
                        <div class="col-md-6 col-lg-6 col-lg-offset-3">
                            <table class="table table-condensed table-hover table-bordered text-muted small">
                                {{-- <thead> <tr> <th>Προσαρμοσμένες τιμές</th></tr></thead> --}}
                                <tbody>
                                    @foreach (App\Response::whereIn('questionnaire_id',$item->survey->questionnaires->pluck('id'))->where('question_id',$item->question_id)->where('content','!=',"")->pluck('content')->toArray() as $row)
                                        <tr><td>•</td><td>{{$row}}</td> </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif                                

                {{-- @todo add more types --}}
                
                {{-- @elseif ($item->question->answerlist->type == 'text') --}}
                {{-- @elseif ($item->question->answerlist->type == 'number') --}}
                {{-- @elseif ($item->question->answerlist->type == 'range') --}}
                {{-- @elseif ($item->question->answerlist->type == 'color') --}}
                {{-- @elseif ($item->question->answerlist->type == 'date') --}}
                {{-- @elseif ($item->question->answerlist->type == 'time') --}}
                {{-- @elseif ($item->question->answerlist->type == 'datetime') --}}
                {{-- @elseif ($item->question->answerlist->type == 'email') --}}
                {{-- @elseif ($item->question->answerlist->type == 'url') --}}
                
                {{-- OLD answerlist->type is anything else --}}
                @else

                    {{-- hidden value (id) --}}
                    {{-- @todo you may improve this (static answer: id 129) --}}
                    <input type="hidden" class="hidden" id="{{$item->question->id}}_129_select" name="{{$item->question->id}}_id_129" value="129" >

                    {{-- input (content) --}}
                    @if (\Route::currentRouteName() == 'frontend.create')
                        <input 
                            {{-- type="{{$item->question->answerlist->type}}"  --}}
                            type="text" 
                            name="{{$item->question->id}}_content_129" 
                            id="{{$item->question->id}}_content_129" 
                            class="col-md-6 col-lg-6 col-lg-offset-3"
                            value="{{old($item->question->id.'_content_129')}}"
                            required="required"
                        >
                    @elseif(\Route::currentRouteName() == 'admin.questionnaires.show')
                        <input 
                            {{-- type="{{$item->question->answerlist->type}}"  --}}
                            type="text" 
                            name="{{$item->question->id}}_content_129" 
                            id="{{$item->question->id}}_content_129" 
                            class="col-md-6 col-lg-6 col-lg-offset-3"
                            value="{{ $questionnaire->responses->where('question_id',$item->question->id)->first()->content }}"
                            disabled = "disabled"
                        >
                    @elseif (\Route::currentRouteName() == 'admin.surveys.show')
                        @if ($item->question->answerlist->type == 'number')
                            <div class="well col-md-6 col-lg-6 col-lg-offset-3">
                                {{ 
                                implode(
                                    ", ",
                                    App\Response::whereIn('questionnaire_id',$item->survey->questionnaires->pluck('id'))
                                        ->where('question_id',$item->question_id)->pluck('content')->toArray()
                                    )
                                }}
                                {{-- count: {{count($array)}}
                                    mean: {{array_sum($array)/count($array)}}
                                    std: {{stats_standard_deviation($array)}}
                                    min: {{min($array)}}
                                    max: {{max($array)}}
                                    @php
                                    Arsort($array);
                                    $keys = array_keys($array);
                                    $median = $keys[round(count($keys)/2)];
                                    @endphp
                                    median: {{$median}} --}}                            
                            </div>
                        @else
                            <div class="col-md-6 col-lg-6 col-lg-offset-3">
                                <table class="table table-condensed table-hover table-bordered">
                                    <tbody>
                                        @foreach (App\Response::whereIn('questionnaire_id',$item->survey->questionnaires->pluck('id'))
                                                ->where('question_id',$item->question_id)->pluck('content')->toArray() as $row)
                                            <tr><td>{{$row}}</td> </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    @endif

                @endif

            {{-- answers end --}}

        </section> {{-- item end --}}

    @endforeach
</fieldset>

{{-- close form tag --}}
@if (\Route::currentRouteName() == 'frontend.create')
    <button type="submit" 
        class="btn btn-success btn-lg"
        >
        <i class="fa fa-save"></i>  @lang('Send')
    </button>
</form>
@endif

{{-- chart js --}}
@if (\Route::currentRouteName() == 'admin.surveys.show')
    @section('head')
        <script src="/js/chart.2.5.0.min.js"></script>
    @endsection
@endif