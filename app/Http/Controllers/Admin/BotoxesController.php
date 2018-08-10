<?php

namespace App\Http\Controllers\Admin;

use App\Botox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBotoxesRequest;
use App\Http\Requests\Admin\UpdateBotoxesRequest;

class BotoxesController extends Controller
{
    /**
     * Display a listing of Botox.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('botox_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('botox_delete')) {
                return abort(401);
            }
            $botoxes = Botox::onlyTrashed()->get();
        } else {
            $botoxes = Botox::all();
        }

        return view('admin.botoxes.index', compact('botoxes'));
    }

    /**
     * Show the form for creating new Botox.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('botox_create')) {
            return abort(401);
        }
        
        $clinic_names = \App\Clinic::get()->pluck('clinic_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.botoxes.create', compact('clinic_names'));
    }

    /**
     * Store a newly created Botox in storage.
     *
     * @param  \App\Http\Requests\StoreBotoxesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBotoxesRequest $request)
    {
        if (! Gate::allows('botox_create')) {
            return abort(401);
        }
        $botox = Botox::create($request->all());



        return redirect()->route('admin.botoxes.index');
    }


    /**
     * Show the form for editing Botox.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('botox_edit')) {
            return abort(401);
        }
        
        $clinic_names = \App\Clinic::get()->pluck('clinic_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $botox = Botox::findOrFail($id);

        return view('admin.botoxes.edit', compact('botox', 'clinic_names'));
    }

    /**
     * Update Botox in storage.
     *
     * @param  \App\Http\Requests\UpdateBotoxesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBotoxesRequest $request, $id)
    {
        if (! Gate::allows('botox_edit')) {
            return abort(401);
        }
        $botox = Botox::findOrFail($id);
        $botox->update($request->all());



        return redirect()->route('admin.botoxes.index');
    }


    /**
     * Display Botox.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('botox_view')) {
            return abort(401);
        }
        $botox = Botox::findOrFail($id);

        return view('admin.botoxes.show', compact('botox'));
    }


    /**
     * Remove Botox from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('botox_delete')) {
            return abort(401);
        }
        $botox = Botox::findOrFail($id);
        $botox->delete();

        return redirect()->route('admin.botoxes.index');
    }

    /**
     * Delete all selected Botox at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('botox_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Botox::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Botox from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('botox_delete')) {
            return abort(401);
        }
        $botox = Botox::onlyTrashed()->findOrFail($id);
        $botox->restore();

        return redirect()->route('admin.botoxes.index');
    }

    /**
     * Permanently delete Botox from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('botox_delete')) {
            return abort(401);
        }
        $botox = Botox::onlyTrashed()->findOrFail($id);
        $botox->forceDelete();

        return redirect()->route('admin.botoxes.index');
    }
}
