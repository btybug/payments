<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;
use BtyBugHook\Payments\Http\Requests\AttributesRequest;
use BtyBugHook\Payments\Http\Requests\AttributeTermsRequest;
use BtyBugHook\Payments\Http\Requests\TaxServiceRequest;
use BtyBugHook\Payments\Repository\AttributesRepository;
use BtyBugHook\Payments\Repository\AttributeTermsRepository;
use BtyBugHook\Payments\Repository\TaxServiceRepository;

class TaxServicesController extends Controller
{
    private $model = null;

    public function getTaxServices ()
    {
        return view('payments::settings.tax_services.list');
    }

    public function getCreate ()
    {
        return view('payments::settings.tax_services.create_or_update')->with('model', $this->model);
    }

    public function getEdit (
        $id,
        TaxServiceRepository $taxServiceRepository
    )
    {
        $this->model = $taxServiceRepository->findOrFail($id);

        return view('payments::settings.tax_services.create_or_update')->with('model', $this->model);
    }

    public function postCreate (
        TaxServiceRequest $createRequest,
        TaxServiceRepository $taxServiceRepository
    )
    {
        $taxServiceRepository->create($createRequest->except('_token'));

        return redirect()->route('payments_settings_tax_services')->with('message', 'Created successfully');
    }

    public function postEdit (
        TaxServiceRequest $request,
        TaxServiceRepository $taxServiceRepository,
        $id
    )
    {
        $taxServiceRepository->update($id, $request->except('_token'));

        return redirect()->route('payments_settings_tax_services')->with('message', 'Edited successfully');
    }

    public function getDelete (
        $id,
        TaxServiceRepository $attributesRepository
    )
    {
        $this->model = $attributesRepository->findOrFail($id);
        $this->model->delete();

        return redirect()->route('payments_settings_tax_services')->with('message', 'Deleted successfully');
    }
}