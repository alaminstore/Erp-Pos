<div class="phenolic_yellowing">
  <h6><u>12. Phenolic Yellowing:</u></h6>
  <p> Method
    Followed: {{ array_key_exists('test_method', $fabric_test_work_sheet->phenolic_yellowing) ? $fabric_test_work_sheet->phenolic_yellowing['test_method'] : '' }}
  </p>
  <div class="col-md-12">
    <table class="reportTable">
      <thead>
        <tr>
          <th class="width-25p"></th>
          <th class="width-25p">Grade</th>
          <th class="width-25p">Requirements</th>
          <th class="width-25p">Result</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Grade</td>
          <td>
            {{ array_key_exists('grade', $fabric_test_work_sheet->phenolic_yellowing) ? $fabric_test_work_sheet->phenolic_yellowing['grade'] : '' }}
          </td>
          <td>
            {{ array_key_exists('requirements', $fabric_test_work_sheet->phenolic_yellowing) ? $fabric_test_work_sheet->phenolic_yellowing['requirements'] : '' }}
          </td>
          <td>
            {{ array_key_exists('result', $fabric_test_work_sheet->phenolic_yellowing) ? $fabric_test_work_sheet->phenolic_yellowing['result'] : '' }}
          </td>

        </tr>
      </tbody>
    </table>
  </div>
</div>