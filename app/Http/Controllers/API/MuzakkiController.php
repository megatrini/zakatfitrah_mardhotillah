<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Muzakki;
use Exception;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Muzakki::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Succes', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
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
        try {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jml_tanggungan' => 'required',
            ]);

            $muzakki = Muzakki::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jml_tanggungan' => $request->jml_tanggungan
            ]);

            $data = Muzakki::where('id', '=', $muzakki->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
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
        $data = Muzakki::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Succes', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jml_tanggungan' => 'required',
            ]);

            $muzakki = Muzakki::findOrFail($id);

            $muzakki->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jml_tanggungan' => $request->jml_tanggungan
            ]);

            $data = Muzakki::where('id', '=', $muzakki->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $muzakki = Muzakki::findOrFail($id);

            $data = $muzakki->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes Destroy Data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
