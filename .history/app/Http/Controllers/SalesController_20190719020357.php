<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
  /**
     * Store a newly created purchase data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate user input
        $request->validate([
            'item' => 'required|string',
            'amount' => 'required|number',
        ]);

        $sales = new Sales();
        $sales->item = $request->item;
        $sales->amount = $sales->amount;
        $sales->save();
        return response()->json([
            'message' => 'Item created successfully!'
        ], 201);
    }


    public function allRecords() {
        // validate user input
       
        $records = Sales()::findAll();
        return response()->json([
            'message' => $records
        ], 201);
    }

}
