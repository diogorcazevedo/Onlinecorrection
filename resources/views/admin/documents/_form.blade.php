<div class="form-group">
    {!! Form::label('project','Projeto:') !!}
    {!! Form::select('project_id',$projects,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Name','Nome:') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status','status:') !!}
    {!! Form::text('status',null,['class'=>'form-control']) !!}
</div>
