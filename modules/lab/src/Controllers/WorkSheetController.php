<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DB, Exception;
use SkylarkSoft\GoRMG\Lab\Models\FabricTestWorkSheet;
use SkylarkSoft\GoRMG\Lab\Models\Requisition;
use SkylarkSoft\GoRMG\Lab\Models\YarnTestWorkSheet;
use SkylarkSoft\GoRMG\Lab\Requests\WorkSheetRequest;

class WorkSheetController extends Controller
{
    public function index()
    {
        $work_sheets = FabricTestWorkSheet::orderBy('id', 'DESC')->paginate();
        return view('lab::pages.work_sheets', ['work_sheets' => $work_sheets]);
    }

    public function create()
    {
        $requisitions = Requisition::orderBy('id', 'desc')->pluck('receive_no', 'id');
        $test_properties = FabricTestWorkSheet::TEST_PROPERTIES;
        return view('lab::forms.work_sheet', [
            'requisitions' => $requisitions,
            'test_properties' => $test_properties,
            'work_sheet' => null
        ]);
    }

    public function store(WorkSheetRequest $request)
    {
        try {
            DB::beginTransaction();
            $requisition_id = $request->requisition_id;
            $fabric_test_work_sheet = FabricTestWorkSheet::firstOrNew(['requisition_id' => $requisition_id]);
            $fabric_test_work_sheet->requisition_id = $requisition_id;
            $fabric_test_work_sheet->report_no = $request->report_no ?? null;
            $fabric_test_work_sheet->roll = $request->roll ?? null;
            $fabric_test_work_sheet->type = $request->type ?? null;
            $fabric_test_work_sheet->color_fastness_to_rubbing = $this->processRequestedArray($request->color_fastness_to_rubbing);
            $fabric_test_work_sheet->fabric_weight = $this->processRequestedArray($request->fabric_weight);
            $fabric_test_work_sheet->bursting_strength = $this->processRequestedArray($request->bursting_strength);
            $fabric_test_work_sheet->pilling_resistance = $this->processRequestedArray($request->pilling_resistance);
            $fabric_test_work_sheet->abrasion_resistance = $this->processRequestedArray($request->abrasion_resistance);
            $fabric_test_work_sheet->pull_test = $this->processRequestedArray($request->pull_test);
            $fabric_test_work_sheet->stitch_recovery = $this->processRequestedArray($request->stitch_recovery);
            $fabric_test_work_sheet->color_fastness_to_washing = $this->processRequestedArray($request->color_fastness_to_washing);
            $fabric_test_work_sheet->color_fastness_to_water = $this->processRequestedArray($request->color_fastness_to_water);
            $fabric_test_work_sheet->color_fastness_to_perspiration = $this->processRequestedArray($request->color_fastness_to_perspiration);
            $fabric_test_work_sheet->color_fastness_to_saliva = $this->processRequestedArray($request->color_fastness_to_saliva);
            $fabric_test_work_sheet->phenolic_yellowing = $this->processRequestedArray($request->phenolic_yellowing);
            $fabric_test_work_sheet->color_fastness_to_light = $this->processRequestedArray($request->color_fastness_to_light);
            $fabric_test_work_sheet->ph_value = $this->processRequestedArray($request->ph_value);
            $fabric_test_work_sheet->dimensional_stability_to_washing = $this->processRequestedArray($request->dimensional_stability_to_washing);
            $fabric_test_work_sheet->twisting = $this->processRequestedArray($request->twisting);
            $fabric_test_work_sheet->appearance_after_wash = $this->processRequestedArray($request->appearance_after_wash);
            $fabric_test_work_sheet->print_durability = $this->processRequestedArray($request->print_durability);
            $fabric_test_work_sheet->cross_staining = $this->processRequestedArray($request->cross_staining);
            $fabric_test_work_sheet->best_in_class = $this->processRequestedArray($request->best_in_class);
            $fabric_test_work_sheet->fiber_composition = $this->processRequestedArray($request->fiber_composition);
            $fabric_test_work_sheet->nickel_test = $this->processRequestedArray($request->nickel_test);
            $fabric_test_work_sheet->save();

            $yarn_test_work_sheet = YarnTestWorkSheet::firstOrNew(['requisition_id' => $requisition_id]);
            $yarn_test_work_sheet->requisition_id = $requisition_id;
            $yarn_test_work_sheet->submitted_by = $request->submitted_by ?? null;
            $yarn_test_work_sheet->lot_no = $request->lot_no ?? null;
            $yarn_test_work_sheet->brand = $request->brand ?? null;
            $yarn_test_work_sheet->count = $request->count ?? null;
            $yarn_test_work_sheet->lab_no = $request->lab_no ?? null;
            $yarn_test_work_sheet->date_in = $request->date_in ?? null;
            $yarn_test_work_sheet->date_out = $request->date_out ?? null;
            $yarn_test_work_sheet->yarn_test_results = $this->processRequestedArray($request->yarn_test_results);
            $yarn_test_work_sheet->save();
            DB::commit();
            $html = view('skeleton::partials.flash_message', [
                'message_class' => "success",
                'message' => "Data Stored Successfully!!"
            ])->render();
            return response()->json([
                'status' => 'success',
                'errors' => null,
                'message' => $html
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            $html = view('skeleton::partials.flash_message', [
                'message_class' => "danger",
                'message' => "Something went wrong!!"
            ])->render();

            return response()->json([
                'status' => 'danger',
                'errors' => null,
                'message' => $html
            ]);
        }
    }

    public function show($requisition_id)
    {
        $fabric_test_work_sheet = FabricTestWorkSheet::where('requisition_id', $requisition_id)->first();

        return view('lab::pages.work_sheet_show', [
            'fabric_test_work_sheet' => $fabric_test_work_sheet,
        ]);
    }

    public function edit($requisition_id)
    {
        $requisition = Requisition::findOrFail($requisition_id);
        $requisitions = Requisition::orderBy('id', 'desc')->pluck('receive_no', 'id');
        $test_properties = FabricTestWorkSheet::TEST_PROPERTIES;
        $work_sheet = FabricTestWorkSheet::where('requisition_id', $requisition_id)->first();

        return view('lab::forms.work_sheet', [
            'requisitions' => $requisitions,
            'test_properties' => $test_properties,
            'work_sheet' => $work_sheet,
            'requisition' => $requisition,
        ]);
    }

    public function update($requisition_id, WorkSheetRequest $request)
    {
        try {
            DB::beginTransaction();
            $requisition_id = $request->requisition_id;
            $fabric_test_work_sheet = FabricTestWorkSheet::firstOrNew(['requisition_id' => $requisition_id]);
            $fabric_test_work_sheet->requisition_id = $requisition_id;
            $fabric_test_work_sheet->report_no = $request->report_no ?? null;
            $fabric_test_work_sheet->roll = $request->roll ?? null;
            $fabric_test_work_sheet->type = $request->type ?? null;
            $fabric_test_work_sheet->color_fastness_to_rubbing = $this->processRequestedArray($request->color_fastness_to_rubbing);
            $fabric_test_work_sheet->fabric_weight = $this->processRequestedArray($request->fabric_weight);
            $fabric_test_work_sheet->bursting_strength = $this->processRequestedArray($request->bursting_strength);
            $fabric_test_work_sheet->pilling_resistance = $this->processRequestedArray($request->pilling_resistance);
            $fabric_test_work_sheet->abrasion_resistance = $this->processRequestedArray($request->abrasion_resistance);
            $fabric_test_work_sheet->pull_test = $this->processRequestedArray($request->pull_test);
            $fabric_test_work_sheet->stitch_recovery = $this->processRequestedArray($request->stitch_recovery);
            $fabric_test_work_sheet->color_fastness_to_washing = $this->processRequestedArray($request->color_fastness_to_washing);
            $fabric_test_work_sheet->color_fastness_to_water = $this->processRequestedArray($request->color_fastness_to_water);
            $fabric_test_work_sheet->color_fastness_to_perspiration = $this->processRequestedArray($request->color_fastness_to_perspiration);
            $fabric_test_work_sheet->color_fastness_to_saliva = $this->processRequestedArray($request->color_fastness_to_saliva);
            $fabric_test_work_sheet->phenolic_yellowing = $this->processRequestedArray($request->phenolic_yellowing);
            $fabric_test_work_sheet->color_fastness_to_light = $this->processRequestedArray($request->color_fastness_to_light);
            $fabric_test_work_sheet->ph_value = $this->processRequestedArray($request->ph_value);
            $fabric_test_work_sheet->dimensional_stability_to_washing = $this->processRequestedArray($request->dimensional_stability_to_washing);
            $fabric_test_work_sheet->twisting = $this->processRequestedArray($request->twisting);
            $fabric_test_work_sheet->appearance_after_wash = $this->processRequestedArray($request->appearance_after_wash);
            $fabric_test_work_sheet->print_durability = $this->processRequestedArray($request->print_durability);
            $fabric_test_work_sheet->cross_staining = $this->processRequestedArray($request->cross_staining);
            $fabric_test_work_sheet->best_in_class = $this->processRequestedArray($request->best_in_class);
            $fabric_test_work_sheet->fiber_composition = $this->processRequestedArray($request->fiber_composition);
            $fabric_test_work_sheet->nickel_test = $this->processRequestedArray($request->nickel_test);
            $fabric_test_work_sheet->save();

            $yarn_test_work_sheet = YarnTestWorkSheet::firstOrNew(['requisition_id' => $requisition_id]);
            $yarn_test_work_sheet->requisition_id = $requisition_id;
            $yarn_test_work_sheet->submitted_by = $request->submitted_by ?? null;
            $yarn_test_work_sheet->lot_no = $request->lot_no ?? null;
            $yarn_test_work_sheet->brand = $request->brand ?? null;
            $yarn_test_work_sheet->count = $request->count ?? null;
            $yarn_test_work_sheet->lab_no = $request->lab_no ?? null;
            $yarn_test_work_sheet->date_in = $request->date_in ?? null;
            $yarn_test_work_sheet->date_out = $request->date_out ?? null;
            $yarn_test_work_sheet->yarn_test_results = $this->processRequestedArray($request->yarn_test_results);
            $yarn_test_work_sheet->save();
            DB::commit();
            $html = view('skeleton::partials.flash_message', [
                'message_class' => "success",
                'message' => "Data Updated Successfully!!"
            ])->render();
            return response()->json([
                'status' => 'success',
                'errors' => null,
                'message' => $html
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            $html = view('skeleton::partials.flash_message', [
                'message_class' => "danger",
                'message' => "Something went wrong!!"
            ])->render();

            return response()->json([
                'status' => 'danger',
                'errors' => null,
                'message' => $html
            ]);
        }
    }

    public function destroy($requisition_id)
    {
        try {
            DB::beginTransaction();
            $fabric_test_work_sheet = FabricTestWorkSheet::where('requisition_id', $requisition_id)->first();
            FabricTestWorkSheet::findOrfail($fabric_test_work_sheet->id)->delete();
            $yarn_test_work_sheet = YarnTestWorkSheet::where('requisition_id', $requisition_id)->first();
            YarnTestWorkSheet::findOrfail($yarn_test_work_sheet->id)->delete();
            DB::commit();
            Session::flash('alert-danger', 'Data Deleted Successfully!!');
            return redirect('work-sheets');
        } catch(Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!!');
            return redirect()->back();
        }
    }

    public function getWorkSheetData(Request $request)
    {
        if(!$request->ajax()) {
            return abort(404);
        }
        $requisition_id = $request->requisition_id;
        $fabric_test_work_sheet = FabricTestWorkSheet::select([
            'report_no',
            'roll',
            'type',
            'color_fastness_to_rubbing',
            'fabric_weight',
            'bursting_strength',
            'pilling_resistance',
            'abrasion_resistance',
            'pull_test',
            'stitch_recovery',
            'color_fastness_to_washing',
            'color_fastness_to_water',
            'color_fastness_to_perspiration',
            'color_fastness_to_saliva',
            'phenolic_yellowing',
            'color_fastness_to_light',
            'ph_value',
            'dimensional_stability_to_washing',
            'twisting',
            'appearance_after_wash',
            'print_durability',
            'cross_staining',
            'best_in_class',
            'fiber_composition',
            'nickel_test'
        ])->where('requisition_id', $requisition_id)->first();

        $yarn_test_work_sheet = YarnTestWorkSheet::select([
            'submitted_by',
            'lot_no',
            'brand',
            'count',
            'lab_no',
            'date_in',
            'date_out',
            'yarn_test_results'
        ])->where('requisition_id', $requisition_id)->first();
        return response()->json([
            'fabric_test_work_sheet' => $fabric_test_work_sheet,
            'yarn_test_work_sheet' => $yarn_test_work_sheet,
        ]);
    }

    private function processRequestedArray($array = [])
    {
        $data = [];
        foreach ($array as $key => $val) {
            $data[$this->removeQuotationChar($key)] = $val;
        }
        return $data;
    }

    private function removeQuotationChar($str)
    {
        // Using str_replace() function
        // to replace the word
        $res = str_ireplace(array('"'), '', $str);
        return $res;
    }
}