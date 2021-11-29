<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, DB, Exception, PDF;
use SkylarkSoft\GoRMG\Lab\Models\Company;
use SkylarkSoft\GoRMG\Lab\Models\FabricTestWorkSheet;
use SkylarkSoft\GoRMG\Lab\Models\Requisition;
use SkylarkSoft\GoRMG\Lab\Models\TestProperty;
use SkylarkSoft\GoRMG\Skeleton\Traits\CustomPdfHeaderFooter;
use Illuminate\Support\Facades\Storage;

class RequisitionController extends Controller
{
    use CustomPdfHeaderFooter;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::orderBy('id', 'DESC')->paginate();

        return view('lab::requisition.requisition_list', ['requisitions' => $requisitions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $ldate = date('Ymd');

        $getLastReceiveNo = Requisition::select('receive_no')->whereDate('created_at',  date('Y-m-d'))->orderBy('created_at', 'desc' )->first();
        $receive_no = str_pad(1, 4, "0", STR_PAD_LEFT);
        if ($getLastReceiveNo) {
            $last_receive_no = $getLastReceiveNo->receive_no;
            $explode_receive_no = explode('-', $last_receive_no);
            $last_receive_no_count = $explode_receive_no[1];
            $receive_no = str_pad(($last_receive_no_count + 1), 4, "0", STR_PAD_LEFT);
        }

        $data['companies'] = $companies->pluck('name', 'id');
        $data['receive_no'] = $ldate.'-'.$receive_no;
        $data['company_addresses'] = $companies->mapWithKeys(function ($company) {
            return [$company->id => ['data-address' => $company->address]];
        })->all();

        $data['responsible_person'] = $companies->mapWithKeys(function ($company) {
            return [$company->id => ['data-responsible_person' => $company->responsible_person]];
        })->all();

        $data['phone_no'] = $companies->mapWithKeys(function ($company) {
            return [$company->id => ['data-phone' => $company->phone_no]];
        })->all();


        $date['requisition'] = null;

        return view('lab::requisition.requisition_send', $data, [
            'requisition' => null,
            'companies' => $companies,
            ''
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'buyer_id' => 'required',
            'booking_no' => 'required',
            'service_type' => 'required',
            'company_name' => 'required',
          ]);

        try {
            $userId = Auth::user()->id;
            $requisition = new Requisition();
            $requisition->color = $request->color;
            $requisition->created_by = $userId;
            $requisition->receive_no = $request->receive_no;
            $requisition->size = $request->size;
            $requisition->gsm = $request->gsm;
            $requisition->fabric = $request->fabric;
            $requisition->pre_report = $request->pre_report;
            $requisition->other_info = $request->other_info;
            $requisition->buyer_id = $request->buyer_id;
            $requisition->booking_no = $request->booking_no;
            $requisition->batch_no = $request->batch_no;
            $requisition->qty = $request->qty;
            $requisition->style_no = $request->style_no;
            $requisition->po_no = $request->po_no;
            $requisition->service_type = $request->service_type;
            $requisition->company_name = $request->company_name;
            $requisition->mobile_no = $request->mobile_no;
            $requisition->email = $request->email;
            $requisition->contact_person = $request->contact_person;
            $requisition->test_method = implode(',',$request->test_method ?? []);
            $requisition->color_fastness = implode(',',$request->color_fastness ?? []);
            $requisition->yarn = implode(',',$request->yarn ?? []);
            $requisition->dimentional_stability = implode(',',$request->dimentional_stability ?? []);
            $requisition->physical_test = implode(',',$request->physical_test ?? []);
            $requisition->chemical_test = implode(',',$request->chemical_test ?? []);

        if ($request->hasFile('care')) {
            $time = time();
            $file = $request->care;
            $file->storeAs('requisition_images', $time . $file->getClientOriginalName());
            $requisition->care = $time . $file->getClientOriginalName();
        }

        $requisition->save();
        DB::commit();
        Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('/requisitions');
        } catch (\Exception $e) {
            Session::flash('error', 'Something wrong!!. Please try again');
            return redirect()->back();
        }
    }


    public function show(Requisition $receive)
    {
        $colorfastness= TestProperty::where('type', 'COLOR FASTNESS TEST')->pluck('name');
        $dimensional = TestProperty::where('type', 'DIMENSIONAL STABILITY TO WASHING')->pluck('name');
        $physical = TestProperty::where('type', 'PHYSICAL TEST')->pluck('name');
        $chemical = TestProperty::where('type', 'CHEMICAL TEST')->pluck('name');
        $yarn = TestProperty::where('type', 'YARN')->pluck('name');
        $requisitions = $receive->load(array('company'));

        return view('lab::requisition.requisition_view', compact('requisitions', 'colorfastness', 'dimensional', 'physical', 'chemical', 'yarn'));
    }



    public function edit(Requisition $receive)
    {
        $company = Company::all();
        $companies = $company->pluck('name', 'id');
        $data['company_addresses'] = $company->mapWithKeys(function ($company) {
            return [$company->id => ['data-address' => $company->address]];
        })->all();

        $data['responsible_person'] = $company->mapWithKeys(function ($company) {
            return [$company->id => ['data-responsible_person' => $company->responsible_person]];
        })->all();

        $data['phone_no'] = $company->mapWithKeys(function ($company) {
            return [$company->id => ['data-phone' => $company->phone_no]];
        })->all();

        $colorfastness= TestProperty::where('type', 'COLOR FASTNESS TEST')->pluck('name');
        $dimensional = TestProperty::where('type', 'DIMENSIONAL STABILITY TO WASHING')->pluck('name');
        $physical = TestProperty::where('type', 'PHYSICAL TEST')->pluck('name');
        $chemical = TestProperty::where('type', 'CHEMICAL TEST')->pluck('name');
        $yarn = TestProperty::where('type', 'YARN')->pluck('name');

        $requisition = $receive->load('company');

        return view('lab::requisition.requisition_edit', compact('requisition', 'companies', 'colorfastness', 'dimensional', 'physical','yarn', 'chemical'));
    }


    public function update($receive, Request $request)
    {
        $userId = Auth::user()->id;

        try {
            $requisition = Requisition::findOrFail($receive);
            $requisition->color = $request->color;
            $requisition->updated_by = $userId;
            $requisition->size = $request->size;
            $requisition->gsm = $request->gsm ;
            $requisition->fabric = $request->fabric;
            $requisition->pre_report = $request->pre_report;
            $requisition->other_info = $request->other_info;
            $requisition->buyer_id = $request->buyer_id;
            $requisition->booking_no = $request->booking_no;
            $requisition->batch_no = $request->batch_no;
            $requisition->qty = $request->qty;
            $requisition->style_no = $request->style_no;
            $requisition->po_no = $request->po_no;
            $requisition->service_type = $request->service_type;
            $requisition->company_name = $request->company_name;
            $requisition->mobile_no = $request->mobile_no;
            $requisition->email = $request->email;
            $requisition->contact_person = $request->contact_person;
            $requisition->test_method = implode(',',$request->test_method ?? []);
            $requisition->color_fastness = implode(',',$request->color_fastness ?? []);
            $requisition->yarn = implode(',',$request->yarn ?? []);
            $requisition->dimentional_stability = implode(',',$request->dimentional_stability ?? []);
            $requisition->physical_test = implode(',',$request->physical_test ?? []);
            $requisition->chemical_test = implode(',',$request->chemical_test ?? []);
            if ($request->hasFile('care')) {
                $requisition_data = Requisition::where('id', $receive)->first();
                if(isset($requisition_data->care)){
                    $file_name_to_delete = $requisition_data->care;
                    if (Storage::disk('public')->exists('/requisition_images/' . $file_name_to_delete )) {
                        if ($file_name_to_delete != NULL) {
                            Storage::delete('requisition_images/' . $file_name_to_delete);
                        }
                    }
                }
                $time = time();
                $file = $request->care;
                $file->storeAs('requisition_images', $time . $file->getClientOriginalName());
                $requisition->care = $time . $file->getClientOriginalName();
            }
            $requisition->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('/requisitions');
        } catch (\Exception $e) {
            Session::flash('error', 'Something wrong!!. Please try again');
            return redirect()->back();
        }

    }


    public function delete(Requisition $receive)
    {
        try {
            DB::beginTransaction();
            $receive->delete();
            DB::commit();
            Session::flash('alert-danger', 'Successfully Deleted');
            return redirect('/requisitions');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Went Wrong');
            return redirect('/requisitions');
        }
    }
    public function pdfDownload($id)
    {
        return redirect()->back();
        $colorfastness= TestProperty::where('type', 'COLOR FASTNESS TEST')->pluck('name');
        $dimensional = TestProperty::where('type', 'DIMENSIONAL STABILITY TO WASHING')->pluck('name');
        $physical = TestProperty::where('type', 'PHYSICAL TEST')->pluck('name');
        $chemical = TestProperty::where('type', 'CHEMICAL TEST')->pluck('name');
        $requisitions = Requisition::with('company')->findOrFail($id);
        $data = [
            'requisitions' => $requisitions,
            'colorfastness' => $colorfastness,
            'dimensional' => $dimensional,
            'physical'=> $physical,
            'chemical' => $chemical
        ];
        $view = view('lab::requisition.pdf_download', $data);
        $html_content = $view->render();
        // Custom Header
        PDF::setHeaderCallback(function ($pdf){
            // Set font
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(0, 9, "Testing Laboratory", 0, false, 'C', 0, '', 0, false, 'T', 'M');
            // Add Line Break
            $pdf->Ln(5);
            $pdf->SetFont('times', 'B', 10);
            $pdf->Cell(0, 9, 'Tropical Knitex Ltd.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        });
        // Custom Footer
        $this->PdfFooter();

        PDF::SetMargins(7, 22, 7);
        PDF::SetFontSubsetting(false);
        PDF::SetFont('times', '', 7);
        PDF::SetAutoPageBreak(TRUE, 11);
        PDF::AddPage('P', 'A4');
        PDF::writeHTML($html_content, true, true, true, true, 'C');

        PDF::Output('requisition_'.date('d_m_Y').'.pdf');
        return true;
    }

    public function getRequisitionDataForLogBookEntry(Request $request)
    {
        if (!$request->ajax()) {
            return abort('404');
        }
        try {
            $id = $request->requisition_id;
            $requisition = Requisition::findOrFail($id);
            $html = view('lab::includes.requisition_data_for_log_book_entry', ['requisition' => $requisition])->render();
            return response()->json([
                'status' => 'success',
                'html' => $html
            ]);
        } catch (\Exception $e) {
            $message = 'Something worng!!. Please try again';
            return response()->json([
                'status' => 'failure',
                'message' => $message,
                'html' => null
            ]);
        }
    }

    public function getRequisitionDataForWorkSheetEntry(Request $request)
    {
        if (!$request->ajax()) {
            return abort('404');
        }
        try {
            $id = $request->requisition_id;
            $requisition = Requisition::findOrFail($id);
            $fabric_test_work_sheet = FabricTestWorkSheet::where('requisition_id', $id)->first();
            $html = view('lab::includes.requisition_data_for_work_sheet_entry', [
                'requisition' => $requisition,
                'fabric_test_work_sheet' => $fabric_test_work_sheet
            ])->render();
            return response()->json([
                'status' => 'success',
                'html' => $html
            ]);
        } catch (\Exception $e) {
            $message = 'Something worng!!. Please try again';
            return response()->json([
                'status' => 'failure',
                'message' => $message,
                'html' => null
            ]);
        }
    }
}