<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClinicsRequest;
use App\Http\Requests\Admin\UpdateClinicsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ClinicsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Clinic.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('clinic_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('clinic_delete')) {
                return abort(401);
            }
            $clinics = Clinic::onlyTrashed()->get();
        } else {
            $clinics = Clinic::all();
        }

        return view('admin.clinics.index', compact('clinics'));
    }

    /**
     * Show the form for creating new Clinic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('clinic_create')) {
            return abort(401);
        }
        return view('admin.clinics.create');
    }

    /**
     * Store a newly created Clinic in storage.
     *
     * @param  \App\Http\Requests\StoreClinicsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicsRequest $request)
    {
        if (! Gate::allows('clinic_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $clinic = Clinic::create($request->all());


        foreach ($request->input('photo_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $clinic->id;
            $file->save();
        }

        return redirect()->route('admin.clinics.index');
    }


    /**
     * Show the form for editing Clinic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('clinic_edit')) {
            return abort(401);
        }
        $clinic = Clinic::findOrFail($id);

        return view('admin.clinics.edit', compact('clinic'));
    }

    /**
     * Update Clinic in storage.
     *
     * @param  \App\Http\Requests\UpdateClinicsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicsRequest $request, $id)
    {
        if (! Gate::allows('clinic_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $clinic = Clinic::findOrFail($id);
        $clinic->update($request->all());


        $media = [];
        foreach ($request->input('photo_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $clinic->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $clinic->updateMedia($media, 'photo');

        return redirect()->route('admin.clinics.index');
    }


    /**
     * Display Clinic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('clinic_view')) {
            return abort(401);
        }
        $botoxes = \App\Botox::where('clinic_name_id', $id)->get();

        $clinic = Clinic::findOrFail($id);

        return view('admin.clinics.show', compact('clinic', 'botoxes'));
    }


    /**
     * Remove Clinic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('clinic_delete')) {
            return abort(401);
        }
        $clinic = Clinic::findOrFail($id);
        $clinic->deletePreservingMedia();

        return redirect()->route('admin.clinics.index');
    }

    /**
     * Delete all selected Clinic at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('clinic_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Clinic::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Clinic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('clinic_delete')) {
            return abort(401);
        }
        $clinic = Clinic::onlyTrashed()->findOrFail($id);
        $clinic->restore();

        return redirect()->route('admin.clinics.index');
    }

    /**
     * Permanently delete Clinic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('clinic_delete')) {
            return abort(401);
        }
        $clinic = Clinic::onlyTrashed()->findOrFail($id);
        $clinic->forceDelete();

        return redirect()->route('admin.clinics.index');
    }
}
