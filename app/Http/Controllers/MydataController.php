<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstNumber;
use App\Models\second_numbers;

class MydataController extends Controller
{
    public function index()
    {
        return view('myform');
    }
    public function generate(Request $request)
    {
        $request->validate([
            'number' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);
        $number = $request->number;
        $quantity = $request->quantity;

        for ($i = 1; $i <= $quantity; $i++) {
            $firstnumber = $number + $i;
            $secondnumber = substr($firstnumber, 0, 4) + $i;
            FirstNumber::create(['number' => $firstnumber]);
            second_numbers::create(['number' => $secondnumber]);
        }
        return response()->json(['message' => "Number Generated Succefully"]);
    }
    public function show()
    {
        $first = FirstNumber::pluck('number');
        $second = second_numbers::pluck('number');

        $data = [];
        foreach ($first as $firstnumvalue) {
            $data[] = [
                'number' => $firstnumvalue,
                'verified' => $second->contains($firstnumvalue) ? 'Verified' : 'Not Verified',
            ];
        }
        return response()->json($data);
    }
}
