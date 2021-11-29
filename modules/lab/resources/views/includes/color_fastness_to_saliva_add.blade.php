<div class="color_fastness_to_saliva">
    <h6><u>11. Colour Fastness to Saliva:</u></h6>
    <p>Method Followed: {!! Form::text('color_fastness_to_saliva["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Enter test method...']) !!}
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
                    {!! Form::text('color_fastness_to_saliva["color_change"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
                <td>
                    {!! Form::text('color_fastness_to_saliva["acetate"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
                <td>
                    {!! Form::text('color_fastness_to_saliva["cotton"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
                <td>
                    {!! Form::text('color_fastness_to_saliva["nylon"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
                <td>
                    {!! Form::text('color_fastness_to_saliva["polyester"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
                <td>
                    {!! Form::text('color_fastness_to_saliva["acrylic"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
                <td>
                    {!! Form::text('color_fastness_to_saliva["wool"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
