<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\AdminsettingRepository;
use BtyBugHook\Membership\Models\User;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function postSaveQtyPrice (
        Request $request,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $adminsettingRepository->createOrUpdateToJson($request->except('_token'), 'pricing', 'qty');

        return redirect()->back();
    }
}