<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Membership\Models\User;
use BtyBugHook\Payments\Http\Requests\AttributesRequest;
use BtyBugHook\Payments\Http\Requests\AttributeTermsRequest;
use BtyBugHook\Payments\Repository\AttributesRepository;
use BtyBugHook\Payments\Repository\AttributeTermsRepository;

class AttributesController extends Controller
{
    private $model = null;

    public function getAttributes ()
    {
        return view('payments::settings.attributes.list');
    }

    public function getAttributesCreate ()
    {
        return view('payments::settings.attributes.create_or_update')->with('model', $this->model);
    }

    public function getAttributesEdit (
        $id,
        AttributesRepository $attributesRepository
    )
    {
        $this->model = $attributesRepository->findOrFail($id);

        return view('payments::settings.attributes.create_or_update')->with('model', $this->model);
    }

    public function postAttributesCreate (
        AttributesRequest $createRequest,
        AttributesRepository $attributesRepository
    )
    {
        $attributesRepository->create($createRequest->except('_token'));

        return redirect()->route('payments_settings_attributes')->with('message', 'Created successfully');
    }

    public function postAttributesEdit (
        AttributesRequest $request,
        AttributesRepository $attributesRepository,
        AttributeTermsRepository $attributeTermsRepository,
        $id
    )
    {
        $model = $attributesRepository->update($id, $request->except('_token','terms','extravalidation','term_name','term_slug','term_description'));
        $terms = $request->get('terms');
        $existingTerms = $model->terms()->pluck('id','id')->toArray();
        $attributeTermsRepository->destroy(array_except($existingTerms,array_keys($terms)));
        if(count($terms)){
            foreach ($terms as $key => $term){
                if(in_array($key,$existingTerms)){
                    $attributeTermsRepository->update($key,$term);
                }else{
                    $attributeTermsRepository->create($term + ['attribute_id' => $model->id]);
                }
            }
        }

        return redirect()->route('payments_settings_attributes')->with('message', 'Edited successfully');
    }

    public function getAttributesDelete (
        $id,
        AttributesRepository $attributesRepository
    )
    {
        $this->model = $attributesRepository->findOrFail($id);
        $this->model->delete();

        return redirect()->route('payments_settings_attributes')->with('message', 'Deleted successfully');
    }

    public function getTerms (
        $id
    )
    {
        return view('payments::settings.attributes.terms', compact('id'))->with('model', $this->model);
    }

    public function postTermCreate (
        AttributeTermsRequest $createRequest,
        AttributeTermsRepository $attributesRepository,
        $id
    )
    {
        $attributesRepository->create($createRequest->except('_token'));

        return redirect()->back()->with('message', 'Created successfully');
    }

    public function getTermEdit (
        $id, $term_id,
        AttributeTermsRepository $attributeTermsRepository
    )
    {
        $this->model = $attributeTermsRepository->findOrFail($id);

        return view('payments::settings.attributes.term_edit', compact('id'))->with('model', $this->model);
    }

    public function postTermEdit (
        AttributeTermsRequest $request,
        AttributeTermsRepository $attributeTermsRepository,
        $attr_id,
        $id
    )
    {
        $attributeTermsRepository->update($id, $request->except('_token'));

        return redirect()->route('payments_settings_attributes_terms', ['id' => $attr_id])->with('message', 'Edited successfully');
    }

    public function getTermDelete (
        $attr_id,
        $id,
        AttributeTermsRepository $attributesRepository
    )
    {
        $this->model = $attributesRepository->findOrFail($id);
        $this->model->delete();

        return redirect()->back()->with('message', 'Deleted successfully');
    }
}