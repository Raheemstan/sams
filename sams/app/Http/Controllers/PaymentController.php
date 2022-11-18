<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        return response()->json([
            "status" => "200",
            "message" => $payment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $payment = new Payment();
            $payment->trans_no = $request->trans_no;
            $payment->desc = $request->desc;
            $payment->trans_date = $request->trans_date;
            $payment->payment_type = $request->payment_type;
            $payment->save();

            return response()->json([
                "status" => 200,
                "message" => "Payment Successful",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 403,
                "message" => $th
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find_payment = Payment::findorfail($id);
        return response()->json($find_payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $update_payment = Payment::update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
