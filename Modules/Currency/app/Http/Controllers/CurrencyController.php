<?php

namespace Modules\Currency\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Currency\Enums\CurrencyEnum;
use Modules\Currency\Http\Requests\CurrencyRequest;
use Modules\Currency\Models\Currency;

class CurrencyController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('permission:currency-show', ['index']),
            new Middleware('permission:currency-create', ['create', 'store']),
            new Middleware('permission:currency-edit', ['update','edit']),
            new Middleware('permission:currency-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::latest()->paginate(10);
        return view('currency::index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCurrencies = CurrencyEnum::getAllCurrencies();
        return view('currency::create', compact('allCurrencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
        if($request->is_default) {
            Currency::where('is_default', true)->update(['is_default' => false]);
        }

        $currency = Currency::create($request->validated());

        if ($currency) {
            return redirect()->route('admin.currency.index')->with('success', __('notification.created', ['field' => __('admin.currency')]));
        }
        return redirect()->back()->with('error', __('notification.failed'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        $allCurrencies = CurrencyEnum::getAllCurrencies();
        return view('currency::edit', compact('currency', 'allCurrencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);

        $isCurrentlyDefault = $currency->is_default;
        $isBecomingDefault = $request->boolean('is_default');

        // Prevent removing the only default currency
        if (!$isBecomingDefault && $isCurrentlyDefault && Currency::where('is_default', true)->count() === 1) {
            return redirect()->back()->with('error', __('rules.default_currency_at_least_one'));
        }

        DB::transaction(function () use ($request, $currency, $isCurrentlyDefault, $isBecomingDefault) {

        if ($isBecomingDefault && !$isCurrentlyDefault) {
            $newDefaultRate = $request->exchange_rate;

            // Set all other currencies relative to new default
            $currencies = Currency::where('id', '!=', $currency->id)->get();
            foreach ($currencies as $cur) {
                $newRate = round($cur->exchange_rate / $newDefaultRate, 2);
                $cur->update([
                    'exchange_rate' => $newRate,
                    'is_default' => false,
                ]);
            }

            // Update the new default currency
            $currency->update([
                'name' => $request->name,
                'code' => $request->code,
                'symbol' => $request->symbol,
                'exchange_rate' => 1.00,
                'status' => $request->status,
                'symbol_position' => $request->symbol_position,
                'is_default' => true,
            ]);

            // Reset session & cache
            Cache::forget('allCurrencies');
            session()->forget('currency');
            session([
                'currency' => [
                    'code' => $currency->code,
                    'symbol' => $currency->symbol,
                    'rate' => 1.00,
                    'symbol_position' => $currency->symbol_position,
                ]
            ]);
        } else {
            // Just update basic fields
            $currency->update($request->validated());
        }
    });


    return redirect()->route('admin.currency.index')->with('success', __('notification.updated', ['field' => __('admin.currency')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);

        if ($currency->is_default) {
            return redirect()->route('admin.currency.index')->with('error', __('notification.default_currency_cant_delete'));
        }

        $currency->delete();

        // Reset session & cache
        Cache::forget('allCurrencies');
        session()->forget('currency');

        return redirect()->route('admin.currency.index')->with('success', __('notification.deleted', ['field' => __('admin.currency')]));
    }
}
