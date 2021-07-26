<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Customer::create($request->all());
        // $validate = Validator::make($request->all(),
        // ['name'=>'required',
        // 'phone'=>'required',
        // 'email'=>'required',
        // 'address'=>'required']);
        // if ($validate-passes()){
        //     return Customers::create($request->all());
        // }

        // return response()->json([
        //     'message' => 'Data Gagal di tambahkan',
        //     'status' => $validate->errors()-all()
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        // return $customers;
        $data = Customer::where('id_customer', $customer)->first();
        if (!empty($data)){
            return $data;
        }

        return response()->json(['message' => 'Data Tidak Ditemukan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // if (Customers::where('id', $id)->exists()) {
        //     $customers = Customers::find($id);
    
        //     $customers->name = is_null($request->name) ? $customers->name : $customers->name;
        //     $customers->phone = is_null($request->phone) ? $customers->phone : $customers->phone;
        //     $customers->email = is_null($request->email) ? $customers->email: $customers->email;
        //     $customers->address = is_null($request->address) ? $customers->address: $customers->address;
        //     $customers->save();
    
        //     return response()->json([
        //       "message" => "Data Berhasil Di Update"
        //     ], 200);
        //   } else {
        //     return response()->json([
        //       "message" => "Data Tidak Diemukan"
        //     ], 404);
        //   }

        $customer->update($request->all());
        return response()->json([
                  "message" => "Data Berhasil Di Update"
                ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        $data = Customer::where('id_customer', $customer)->first();
        if (empty($data)){
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
