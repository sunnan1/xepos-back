<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HelperTrait;
use App\Http\Requests\CompanyRequest;
use App\Jobs\CompanyNotificationJob;
use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Image;

class CompanyController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->get_pagination(companies::paginate(10));
    }


    public function allCompany()
    {
        return companies::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new companies();
        if ($request->file('picture') != null)
        {
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs("/public/",$filename);
            $company->logo = $filename;
        }
        $company->name = $request->name;
        $company->email = isset($request->email) ? $request->email : '';
        $company->website = isset($request->website) ? $request->website : '';
        $company->save();

        /* sending email by registering job*/
        dispatch(new CompanyNotificationJob($company->email));

        return response()->json(['message' => 'Company saved successfully'] , 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        companies::find($id)->delete();
    }
}
