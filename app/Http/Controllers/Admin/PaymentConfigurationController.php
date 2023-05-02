<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentConfiguration;
use LaravelLocalization;
use DataTables;

class PaymentConfigurationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:payment-configuration-list');
        $this->middleware('permission:payment-configuration-edit', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {  
        if($request->ajax()){
            $configurations = PaymentConfiguration::orderBy('created_at', 'asc');
             return Datatables::of($configurations)
                    ->addIndexColumn()
                    ->addColumn('action', function($configuration){
                     
                        if (\Auth::user()->can('payment-configuration-edit')) { 
                            $btn = '<a href="' . route('manage-payment-configuration.edit', [$configuration->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $btn = '';
                        }
                             return $btn;
                     })
                     ->editColumn('created_at', function ($configuration) {
                        return [
                           'display' => e($configuration->created_at->format('m/d/Y')),
                           'timestamp' => $configuration->created_at->timestamp
                        ];
                     })
                     
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.payment_configuration.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $configuration = PaymentConfiguration::findOrFail($id);
        return view('admin.payment_configuration.edit',compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'value_dzd'  =>'required',
            'value_usd'  =>'required',
            'value_euro'  =>'required',
        ]);

        $configuration = PaymentConfiguration::findOrFail($id);
        $configuration->value_DZD = $request->value_dzd;
        $configuration->value_USD = $request->value_usd;
        $configuration->value_Euro = $request->value_euro;
        $result = $configuration->Update();

        if($result) {
            return redirect('admin/manage-payment-configuration')->with('success', 'Configuration updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request,$id)
    {
        $sector= Sector::with('localeAll')->find($id);
        $sector->localeAll()->delete();
        $sector->delete();
        $request->session()->flash('success', 'Sector deleted successfully.');
        return redirect()->route('manage-sector.index');
    }
}
