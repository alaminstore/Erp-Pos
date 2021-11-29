<div class="yarn_test">
  <div class="col-md-12 table-responsive">
    <table class="reportTable">
      <tbody>
      <tr>
        <th colspan="4" style="text-align: left;">Test Sample General Information</th>
      </tr>
      <tr>
        <th class="width-25p">Submitted By</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->submitted_by }}
        </td>
        <th class="width-25p">Lab. No.</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->lab_no }}
        </td>
      </tr>
      <tr>
        <th class="width-25p">Lot No</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->lot_no }}
        </td>
        <th class="width-25p">Date In</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->date_in }}
        </td>
      </tr>
      <tr>
        <th class="width-25p">Brand</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->brand }}
        </td>
        <th class="width-25p">Date Out</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->date_out }}
        </td>
      </tr>
      <tr>
        <th class="width-25p">Count</th>
        <td class="width-25p">
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->count }}
        </td>
        <th class="width-25p">&nbsp;</th>
        <th class="width-25p">&nbsp;</th>
      </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-12 table-responsive">
    <table class="reportTable">
      <thead>
      <tr>
        <th>Test Result</th>
        <th>Sample-&#8544;</th>
        <th>Sample-&#8544;&#8544;</th>
        <th>Sample-&#8544;&#8544;&#8544;</th>
        <th>Average</th>
        <th>CV &#37;</th>
        <th>Remarks</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <th>Sample weight in gm</th>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['sample_weight_sample_1'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['sample_weight_sample_2'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['sample_weight_sample_3'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['sample_weight_average'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['sample_weight_cv'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['sample_weight_remarks'] }}
        </td>
      </tr>
      <tr>
        <th>Count(Ne)</th>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['count_sample_1'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['count_sample_2'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['count_sample_3'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['count_average'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['count_cv'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['count_remarks'] }}
        </td>
      </tr>
      <tr>
        <th>Strength(lbf)</th>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['strength_sample_1'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['strength_sample_2'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['strength_sample_3'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['strength_average'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['strength_cv'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['strength_remarks'] }}
        </td>
      </tr>
      <tr>
        <th>CSP</th>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['csp_sample_1'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['csp_sample_2'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['csp_sample_3'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['csp_average'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['csp_cv'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['csp_remarks'] }}
        </td>
      </tr>
      <tr>
        <th>Twist(TPI)</th>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['twist_sample_1'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['twist_sample_2'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['twist_sample_3'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['twist_average'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['twist_cv'] }}
        </td>
        <td>
          {{ $fabric_test_work_sheet->yarnTestWorkSheet->yarn_test_results['twist_remarks'] }}
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>