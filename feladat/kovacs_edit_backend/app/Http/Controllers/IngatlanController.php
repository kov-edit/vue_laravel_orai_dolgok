<?php

namespace App\Http\Controllers;

use App\Models\ingatlan;
use App\Models\kategoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    public function index()
    {
        $ingatlanok = ingatlan::with('kategoria')->get();
        return response()->json($ingatlanok);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategoria' => 'required',
            'tehermentes' => 'required',
            'ar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Hiányos adatok'], 400);
        }

        $ingatlan = ingatlan::create($request->all());
        return response()->json(['id' => $ingatlan->id], 201);
    }

    public function destroy($id)
    {
        $ingatlan = ingatlan::where('id', '=', $id);
        if ($ingatlan->exists()) {
            $ingatlan->delete();
            return (response('', 204));
        }
        return response('Ingatlan nem létezik', 404);
    }
}
