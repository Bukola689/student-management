<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\MyClass;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        $myclasses = MyClass::all();

        return view('payments.index')->with('payments', $payments)
                                     ->with('myclasses', $myclasses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($reference)
    {
        $sec = "sk_test_9ab11671f5814d5f84f691d2737eb11735566f92";
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $sec",
            "Cache-Control: no-cache",
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            echo $response;
          }
        return $reference;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      /*  $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'ref_no' => 'required',
            'method' => 'required',
            'my_class_id' => 'required',
            'description' => 'required',
            'year' => 'required',
        ]); */

        $payment = new Payment;
        $payment->title = $request->input('title');
        $payment->amount = $request->input('amount');
        $payment->ref_no = $request->input('ref_no');
        $payment->method = $request->input('method');
        $payment->my_class_id = $request->input('my_class_id');
        $payment->description = $request->input('description');
        $payment->year = $request->input('year');
        $payment->save();

        return redirect(route('payments.index'))->with('success', 'Notice Board Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);

        $myclasses = MyClass::all();


        return view('payments.edit')->with('payment', $payment)
                                        ->with('myclasses', $myclasses);
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
     /*   $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'ref_no' => 'required',
            'method' => 'required',
            'my_class_id' => 'required',
            'description' => 'required',
            'year' => 'required',
        ]); */

        $payment = Payment::find($id);
        $payment->title = $request->input('title');
        $payment->amount = $request->input('amount');
        $payment->ref_no = $request->input('ref_no');
        $payment->method = $request->input('method');
        $payment->my_class_id = $request->input('my_class_id');
        $payment->description = $request->input('description');
        $payment->year = $request->input('year');
        $payment->save();

        return redirect(route('payments.index'))->with('success', 'Notice Board Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);

        $payment->delete();

        return redirect(route('payments.index'))->with('error', 'Notice Board Updated Successfully');
    }
}
