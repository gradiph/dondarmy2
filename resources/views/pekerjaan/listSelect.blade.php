<?php
$pekerjaan = [];
foreach($pekerjaans as $data)
{
    $pekerjaan += [$data->id => $data->nama];
}
?>
{{ Form::label('pekerjaan_id','* Pekerjaan',['class'=>'col-sm-4 control-label']) }}
<div class="col-sm-8">
    {{ Form::select('pekerjaan_id',$pekerjaan,old('pekerjaan_id'),['class'=>'form-control']) }}
</div>
