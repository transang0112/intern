<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoronavirusCase;

class CoronavirusCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cases = CoronavirusCase::all();
      return view('coronavirus_cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coronavirus_cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $case = new CoronavirusCase([
         'country' => $request->get('country'),
         'total_cases' => $request->get('total_cases'),
         'new_cases' => $request->get('new_cases'),
         'total_deaths' => $request->get('total_deaths'),
         'new_deaths' => $request->get('new_deaths'),
         'total_recovered' => $request->get('total_recovered'),
         'active_cases' => $request->get('active_cases'),
         'critical' => $request->get('critical'),
         'tot_cases' => $request->get('tot_cases'),
         'deaths' => $request->get('deaths'),
         'total_tests' => $request->get('total_tests'),
         'tests' => $request->get('tests'),
         'population' => $request->get('population')
      ]);
      $case->save();
      return redirect('/coronavirus_cases')->with('success', 'Case saved!');
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

    public function showAll()
    {
        return CoronavirusCase::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $case = CoronavirusCase::find($id);
      return view('coronavirus_cases.edit', compact('case'));
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
      $case = CoronavirusCase::find($id);
        $case->country =  $request->get('country');
        $case->total_cases = $request->get('total_cases');
        $case->new_cases = $request->get('new_cases');
        $case->total_deaths = $request->get('total_deaths');
        $case->new_deaths = $request->get('new_deaths');
        $case->total_recovered = $request->get('total_recovered');
        $case->active_cases =  $request->get('active_cases');
        $case->critical = $request->get('critical');
        $case->tot_cases = $request->get('tot_cases');
        $case->deaths = $request->get('deaths');
        $case->total_tests = $request->get('total_tests');
        $case->tests = $request->get('tests');
        $case->population = $request->get('population');
        $case->save();

        return redirect('/coronavirus_cases')->with('success', 'Case updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $case = CoronavirusCase::find($id);
      $case->delete();

      return redirect('/coronavirus_cases')->with('success', 'Case deleted!');
    }

    public function remove($id)
    {
      return CoronavirusCase::find($id)->delete();
    }
}
