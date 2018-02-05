<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\Console\Repository\FrontPagesRepository;
use BtyBugHook\Membership\Models\User;
use Illuminate\Http\Request;

class PaymentSettingsConroller extends Controller
{
    private $settingsPath;
    private $settings;

    public function __construct ()
    {
        $this->settingsPath = storage_path('app' . DS . 'payments.json');
        if (\File::exists($this->settingsPath)) {
            $this->settings = json_decode(\File::get($this->settingsPath), true);
        } else {
            $this->settings = [];
            \File::put($this->settingsPath, json_encode($this->settings, true));
        }
    }

    public function getSettings ()
    {
        return view('payments::settings.index');
    }

    public function getGeneral ()
    {
        return view('payments::settings.general');
    }

    public function getCheckout (
        FrontPagesRepository $repository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $checkout = $adminsettingRepository->getSettings('payment', 'checkout', true);
        $page = $repository->findBy('slug', 'check_out');
        $thankYouPage = $repository->findBy('slug', 'thank_you');

        return view('payments::settings.checkout', compact('page', 'thankYouPage', 'checkout'));
    }

    public function postCheckout (
        Request $request,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $data = json_encode($request->except(['_token']), true);
        $adminsettingRepository->createOrUpdate($data, 'payment', 'checkout');

        return back();
    }

    public function getAttributes ()
    {
        return view('payments::settings.attributes');
    }

    public function getTaxServices ()
    {
        return view('payments::settings.tax_services');
    }

    public function getPrice ()
    {
        $prices = get_prices_data();

        return view('payments::settings.price', compact(['prices']));
    }

    public function getPriceForm ($slug)
    {
        $price = find_price($slug);
        if (! $price) abort(404, 'Price structure not found');

        return view('payments::settings.price.price_form', compact('price'));
    }

    public function getPaymentGateways ()
    {
        $settings = $this->settings;

        return view('payments::settings.payment_gateways', compact('settings'));
    }

    public function postSaveStripe (Request $request)
    {
        $data = $request->except('_token');
        $data['model'] = User::class;
        $this->settings['stripe'] = $data;
        \File::put($this->settingsPath, json_encode($this->settings, true));

        return redirect()->back();
    }

    public function saveStripe ()
    {
        \Config::set('services.stripe', [
            'model'  => User::class,
            'key'    => 'pk_test_zr3Wfst8jb4GrKU8BcLEUkh9',
            'secret' => 'sk_test_5hlaHU2ovKmWpyK33i7sZxxx',
        ]);
    }

    public function getSoppingCart (FrontPagesRepository $repository)
    {
        $page = $repository->findBy('slug', 'shopping-card');

        return view('payments::settings.shopping_cart.index', compact('page'));
    }

    public function postSaveManager (Request $request, FrontPagesRepository $repository)
    {
        $page = $repository->findBy('slug', 'check_out');
        $thankYouPage = $repository->findBy('slug', 'thank_you');
        $data = $request->except('_token');
        $repository->update($page->id, ['template' => $request->check_out_unit]);
        $repository->update($thankYouPage->id, ['template' => $request->thank_you]);

        return redirect()->back()->with('message', 'Saved!!!');
    }

    public function postSaveCheckOutManager (Request $request, FrontPagesRepository $repository)
    {
        $page = $repository->findBy('slug', 'check_out');
        $data = $request->except('_token');
        $page->template = $data['check_out_unit'];
        $page->save();

        return redirect()->back()->with('message', 'Saved!!!');
    }
}