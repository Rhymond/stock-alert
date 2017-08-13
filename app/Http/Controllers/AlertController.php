<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = Alert::all();
        return response()->json($alerts);
    }

//    /**
//     * Get the specified resource from storage.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//        $book = Alert::where('id', $id)->get();
//        if (!empty($book['items'])) {
//            return response()->json($book);
//        } else {
//            return response()->json(['status' => 'fail']);
//        }
//    }
//
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'symbol' => ['required'],
            'action' => ['required'],
            'operator' => ['required', Rule::in(['>', 'second-zone']),],
            'value' => ['required', 'numeric']
        ]);

        $alert = new Alert();
        $alert->fill($request->all());
        $alert->save();

        return response()->json(['success' => 200]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'published_on' => 'required'
        ]);

        $book = Books::find($id);
        $book->name = $request->name;
        $book->description = $request->description;
        $book->category = $request->category;
        $date = new \DateTime($request->published_on);
        $dd = $date->format('Y-m-d');
        $book->published_on = $dd;
        $book->save();
        return response()->json(['status' => 'success']);
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//        if (Books::destroy($id)) {
//            return response()->json(['status' => 'success']);
//        }
//    }
}
