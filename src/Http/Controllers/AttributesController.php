<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;
use BtyBugHook\Payments\Http\Requests\AttributesRequest;
use BtyBugHook\Payments\Repository\AttributesRepository;

class AttributesController extends Controller
{
    private $model = null;

    public function getAttributes()
    {
        return view('payments::settings.attributes.list');
    }

    public function getAttributesCreate()
    {
        return view('payments::settings.attributes.create_or_update')->with('model', $this->model);
    }

    public function getAttributesEdit(
        $id,
        AttributesRepository $attributesRepository
    )
    {
        $this->model = $attributesRepository->findOrFail($id);
        return view('payments::settings.attributes.create_or_update')->with('model', $this->model);
    }

    public function postAttributesCreate(
        AttributesRequest $createRequest,
        AttributesRepository $attributesRepository
    )
    {
        $attributesRepository->create($createRequest->except('_token'));

        return redirect()->route('payments_settings_attributes')->with('message', 'Created successfully');
    }

    public function postAttributesEdit(
        AttributesRequest $request,
        AttributesRepository $attributesRepository,
        $id
    )
    {
        $attributesRepository->update($id, $request->except('_token'));

        return redirect()->route('payments_settings_attributes')->with('message', 'Edited successfully');
    }

    public function getAttributesDelete(
        $id,
        AttributesRepository $attributesRepository
    )
    {
        $this->model = $attributesRepository->findOrFail($id);
        $this->model->delete();
        return redirect()->route('payments_settings_attributes')->with('message', 'Deleted successfully');
    }
}