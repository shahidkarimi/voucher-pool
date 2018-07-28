<?php

namespace App\Http\Controllers;

use App\Traits\Voucherable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * This controller handles all voucher code related operations like
 * listing voucher codes for a particular recipient, voucher redemtion and validation etc
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * This trait contain actual implementation of getting voucher codes quering and relating the database.
     * It can be used anywhere. Thi is done for re-usability purposes
     */
    use Voucherable;

    /**
     * This method reedems a valid voucher code. It expects two parameters via post.
     * Email and Code.
     * @param Request $request
     * @return array
     */
    public function redeem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|valid_recipeint',
            'code' => 'required'
        ]);

        if (!$validator->passes()) {
            return [
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ];
        }

        $recipient = \App\Recipient::where('mail', $request->email)->first();

        if (!$recipient) {
            return ['status' => 'error', 'message' => 'Invalid User'];
        }

        return $this->redeemVoucherCode($request->email, $request->code);

    }

    /**
     * Get all vouchers for a particular reciepeint. THe Recipient emial address is feded to this method.
     * @param Request $request
     * @return array
     */
    public function getAllVouchers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|valid_recipeint'
        ]);

        if (!$validator->passes()) {
            return [
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ];
        }

        return $this->getAllVoucherCodes($request->email);
    }
}
