<?php

namespace App\Http\Controllers;

use App\Recipient;
use App\SpecialOffer;
use App\VoucherCode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = VoucherCode::paginate(10);
        return view('home', ['vouchers' => $vouchers]);
    }

    public function generateCode(Request $request)
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
            return redirect('/home');
        }
    }


}
