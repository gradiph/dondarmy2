<?php
$golDarah = [];
foreach($golDarahs as $data)
{
    $golDarah += [$data->id => $data->nama];
}
?>
{{ Form::label('gol_darah_id','Gol. Darah',['class'=>'col-sm-4 control-label']) }}
<div class="col-sm-8">
    {{ Form::select('gol_darah_id',$golDarah,old('gol_darah_id'),['class'=>'form-control']) }}
</div>
