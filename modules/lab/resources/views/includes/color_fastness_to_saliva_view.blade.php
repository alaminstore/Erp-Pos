<div class="color_fastness_to_saliva">
    <h6><u>11. Colour Fastness to Saliva:</u></h6>
    <p>Method Followed: {{ array_key_exists('test_method', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['test_method'] : '' }}
    </p>
    <div class="col-md-12">
        <table class="reportTable">
            <thead>
            <tr>
                <th rowspan="2" class="width-25p">Colour Change</th>
                <th colspan="6">Staining On</th>
            </tr>
            <tr>
                <th>Acetate</th>
                <th>Cotton</th>
                <th>Nylon</th>
                <th>Polyester</th>
                <th>Acrylic</th>
                <th>Wool</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{ array_key_exists('color_change', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['color_change'] : '' }}
                </td>
                <td>
                    {{ array_key_exists('acetate', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['acetate'] : '' }}
                </td>
                <td>
                    {{ array_key_exists('cotton', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['cotton'] : '' }}
                </td>
                <td>
                    {{ array_key_exists('nylon', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['nylon'] : '' }}
                </td>
                <td>
                    {{ array_key_exists('polyester', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['polyester'] : '' }}
                </td>
                <td>
                    {{ array_key_exists('acrylic', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['acrylic'] : '' }}
                </td>
                <td>
                    {{ array_key_exists('wool', $fabric_test_work_sheet->color_fastness_to_saliva) ? $fabric_test_work_sheet->color_fastness_to_saliva['wool'] : '' }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
