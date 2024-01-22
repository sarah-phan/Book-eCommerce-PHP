<?php

namespace App\Http\Controllers;

use App\Models\PublishingCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminPublishingInformationController extends Controller
{
    public function addShippingInformation(Request $request)
    {
        $validatedData = $request->validate(
            [
                'company_name' => ['required', 'regex: /^[a-zA-Z\s&.]+$/'],
                'company_address' => ['required', 'string', 'max:255'],
                'company_phone' => ['required'],
            ],
            [
                'company_name.regex' => 'Wrong company name format'
            ]
        );

        $data = new PublishingCompany;
        $data->company_id = (string) Str::uuid();
        $data->company_name = $validatedData['company_name'];
        $data->company_address = $validatedData['company_address'];
        $data->company_phone = $validatedData['company_phone'];
        $data->save();

        return redirect('/admin-publishing-company-main')
            ->with('message', 'Add successfully');
    }

    public function showPublishingCompanyList()
    {
        $data = PublishingCompany::all();
        return view('admin.admin-list', compact('data'));
    }

    public function getPublishingCompanyWithIdInfor($company_id)
    {
        $company_with_id = PublishingCompany::find($company_id);
        return view('admin.editFunction.admin-edit-publishing-company', compact('company_with_id'));
    }

    public function updatePublishingCompanyWithIdInfor(Request $request, $company_id)
    {
        $validatedData = $request->validate(
            [
                'company_name' => ['required', 'regex: /^[a-zA-Z\s&.]+$/'],
                'company_address' => ['required', 'string', 'max:255'],
                'company_phone' => ['required'],
            ],
            [
                'company_name.regex' => 'Wrong company name format'
            ]
        );

        $company_with_id = PublishingCompany::find($company_id);
        $company_with_id->company_name = $validatedData['company_name'];
        $company_with_id->company_address = $validatedData['company_address'];
        $company_with_id->company_phone = $validatedData['company_phone'];

        $company_with_id->save();

        return redirect('/admin-publishing-company-main')->with('message', "Edit successfully");
    }

    public function deletePublishingCompany($company_id)
    {
        $company_with_id = PublishingCompany::find($company_id);
        $company_with_id->delete();
        return redirect('/admin-publishing-company-main')->with('message', "Delete successfully");
    }
}
