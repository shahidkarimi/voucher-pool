<?php

namespace App\Http\Controllers;

use App\Recipient;
use App\SpecialOffer;
use App\VoucherCode;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_form(Request $request)
    {
        return view('voucher.create');
    }

    public function save_form(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'discount' => 'required',
        ]);

        $offer = new SpecialOffer;
        $offer->fill([
            'name' => $request->get('name'),
            'discount' => $request->get('discount'),
            'expiry_date' => $request->get('expiry_date')
        ]);
        if ($offer->save()) {
            $recipients = Recipient::all();
            foreach ($recipients as $r) {
                VoucherCode::genNewCode($r, $offer);
            }
        }
        return redirect('/voucher/create')->with('message',
            'Vouchers have heen created and assigned to recipients successfully');
    }
}
