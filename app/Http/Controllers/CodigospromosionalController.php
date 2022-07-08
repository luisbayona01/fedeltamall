<?php

namespace App\Http\Controllers;

use App\Models\Codigospromosional;
use Illuminate\Http\Request;

/**
 * Class CodigospromosionalController
 * @package App\Http\Controllers
 */
class CodigospromosionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codigospromosionals = Codigospromosional::paginate();

        return view('codigospromosional.index', compact('codigospromosionals'))
            ->with('i', (request()->input('page', 1) - 1) * $codigospromosionals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigospromosional = new Codigospromosional();
        return view('codigospromosional.create', compact('codigospromosional'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Codigospromosional::$rules);

        $codigospromosional = Codigospromosional::create($request->all());

        return redirect()->route('codigospromosionals.index')
            ->with('success', 'Codigospromosional created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codigospromosional = Codigospromosional::find($id);

        return view('codigospromosional.show', compact('codigospromosional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codigospromosional = Codigospromosional::find($id);

        return view('codigospromosional.edit', compact('codigospromosional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Codigospromosional $codigospromosional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigospromosional $codigospromosional)
    {
        request()->validate(Codigospromosional::$rules);

        $codigospromosional->update($request->all());

        return redirect()->route('codigospromosionals.index')
            ->with('success', 'Codigospromosional updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $codigospromosional = Codigospromosional::find($id)->delete();

        return redirect()->route('codigospromosionals.index')
            ->with('success', 'Codigospromosional deleted successfully');
    }


    public function all(){
       $codigospromosional= codigospromosional::all();
       return $codigospromosional;
    }
}
