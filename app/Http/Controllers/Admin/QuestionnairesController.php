<?php

namespace App\Http\Controllers\Admin;

use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuestionnairesRequest;
use App\Http\Requests\Admin\UpdateQuestionnairesRequest;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of Questionnaire.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('questionnaire_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('questionnaire_delete')) {
                return abort(401);
            }
            $questionnaires = Questionnaire::onlyTrashed()->get();
        } else {
            $questionnaires = Questionnaire::all();
        }

        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    /**
     * Show the form for creating new Questionnaire.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('questionnaire_create')) {
            return abort(401);
        }
        
        $surveys = \App\Survey::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.questionnaires.create', compact('surveys'));
    }

    /**
     * Store a newly created Questionnaire in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionnairesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionnairesRequest $request)
    {
        if (! Gate::allows('questionnaire_create')) {
            return abort(401);
        }
        $questionnaire = Questionnaire::create($request->all());



        return redirect()->route('admin.questionnaires.index');
    }


    /**
     * Show the form for editing Questionnaire.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('questionnaire_edit')) {
            return abort(401);
        }
        
        $surveys = \App\Survey::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $questionnaire = Questionnaire::findOrFail($id);

        return view('admin.questionnaires.edit', compact('questionnaire', 'surveys'));
    }

    /**
     * Update Questionnaire in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionnairesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionnairesRequest $request, $id)
    {
        if (! Gate::allows('questionnaire_edit')) {
            return abort(401);
        }
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->update($request->all());



        return redirect()->route('admin.questionnaires.index');
    }


    /**
     * Display Questionnaire.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('questionnaire_view')) {
            return abort(401);
        }
        $questionnaire = Questionnaire::findOrFail($id);

        return view('admin.questionnaires.show', compact('questionnaire'));
    }


    /**
     * Remove Questionnaire from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('questionnaire_delete')) {
            return abort(401);
        }
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->delete();

        return redirect()->route('admin.questionnaires.index');
    }

    /**
     * Delete all selected Questionnaire at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('questionnaire_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Questionnaire::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Questionnaire from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('questionnaire_delete')) {
            return abort(401);
        }
        $questionnaire = Questionnaire::onlyTrashed()->findOrFail($id);
        $questionnaire->restore();

        return redirect()->route('admin.questionnaires.index');
    }

    /**
     * Permanently delete Questionnaire from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('questionnaire_delete')) {
            return abort(401);
        }
        $questionnaire = Questionnaire::onlyTrashed()->findOrFail($id);
        $questionnaire->forceDelete();

        return redirect()->route('admin.questionnaires.index');
    }
}