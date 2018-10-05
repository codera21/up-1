<table id="materials" class="table table-hover">
    <thead>
        <tr>
            <th>{{ trans('Sr #') }}</th>
            <th>&nbsp;</th>
            <th>{{ trans('offline_payment.material_title') }}</th>
            <th class="text-right">{{ trans('offine_payment.price') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materials as $material)
            <tr>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                {{ $loop->iteration }} 
                </td>
                <td class="col-sm-1 col-md-1">
                    @if($disabled)
                        <input type="checkbox" name="material[]" value="{{ $material->id }}" onclick = 'return false;' checked/>
                    @else
                        {!! Form::checkbox('material[]', $material->id) !!}
                    @endif
                </td>
                <td class="col-sm-8 col-md-2">
                    
                    {{ $material->title }}
                </td>
                <td class="col-sm-1 col-md-1 text-right"><strong>${{ Helper::moneyFormat($material->price) }}</strong></td>
            </tr>
        @endforeach
    </tbody>
</table>

