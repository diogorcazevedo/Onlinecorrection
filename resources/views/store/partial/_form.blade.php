<div class="form-group form-inline">
    <label style="clear: both;">
        <span>Tipo :</span>
    </label>

    <div class="form-control">
        <label>
            0
            <input type="radio" name="tipo" value="0">
        </label>
        <label style="margin-left: 6%;">
            0.5
            <input type="radio" name="tipo" value="0.5">
        </label>
        <label style="margin-left: 6%;">
            1
            <input type="radio" name="tipo" value="1">
        </label>
        <label style="margin-left: 6%;">
            1.5
            <input type="radio" name="tipo" value="1.5">
        </label>
        <label style="margin-left: 6%;">
            2
            <input type="radio" name="tipo" value="2">
        </label>
    </div>
</div>


<div class="form-group form-inline">
    <label style="clear: both;">
        <span>Tema :</span>
    </label>

    <div class="form-control">
        <label>
            0
            <input type="radio" name="tema" value="0">
        </label>
        <label style="margin-left: 6%;">
            0.5
            <input type="radio" name="tema" value="0.5">
        </label>
        <label style="margin-left: 6%;">
            1
            <input type="radio" name="tema" value="1">
        </label>
        <label style="margin-left: 6%;">
            1.5
            <input type="radio" name="tema" value="1.5">
        </label>
        <label style="margin-left: 6%;">
            2
            <input type="radio" name="tema" value="2">
        </label>
    </div>
</div>


<div class="form-group form-inline">
    <label style="clear: both;">
        <span>Coesão :</span>
    </label>

    <div class="form-control">
        <label>
            0
            <input type="radio" name="coesao" value="0">
        </label>
        <label style="margin-left: 6%;">
            0.5
            <input type="radio" name="coesao" value="0.5">
        </label>
        <label style="margin-left: 6%;">
            1
            <input type="radio" name="coesao" value="1">
        </label>
        <label style="margin-left: 6%;">
            1.5
            <input type="radio" name="coesao" value="1.5">
        </label>
        <label style="margin-left: 6%;">
            2
            <input type="radio" name="coesao" value="2">
        </label>
    </div>
</div>


<div class="form-group form-inline">
    <label style="clear: both;">
        <span>Coerência:</span>
    </label>

    <div class="form-control">
        <label>
            0
            <input type="radio" name="coerencia" value="0">
        </label>
        <label style="margin-left: 6%;">
            0.5
            <input type="radio" name="coerencia" value="0.5">
        </label>
        <label style="margin-left: 6%;">
            1
            <input type="radio" name="coerencia" value="1">
        </label>
        <label style="margin-left: 6%;">
            1.5
            <input type="radio" name="coerencia" value="1.5">
        </label>
        <label style="margin-left: 6%;">
            2
            <input type="radio" name="coerencia" value="2">
        </label>
    </div>
</div>


<div class="form-group form-inline">
    <label style="clear: both;">
        <span>Aspectos Gramaticais:</span>
    </label>

    <div class="form-control">
        <label>
            0
            <input type="radio" name="gramatica" value="0">
        </label>
        <label style="margin-left: 6%;">
            0.5
            <input type="radio" name="gramatica" value="0.5">
        </label>
        <label style="margin-left: 6%;">
            1
            <input type="radio" name="gramatica" value="1">
        </label>
        <label style="margin-left: 6%;">
            1.5
            <input type="radio" name="gramatica" value="1.5">
        </label>
        <label style="margin-left: 6%;">
            2
            <input type="radio" name="gramatica" value="2">
        </label>
    </div>
</div>

<div class="form-group">
    <label style="clear: both;">
        <span>As redações serão zeradas de acordo com as seguintes situações :</span>
    </label>

    <div class="form-control">
        <label>
            Fuga ao tema
            <input type="radio" name="zero" value="Fuga ao tema">
        </label>
    </div>
    <div class="form-control">
        <label style="margin-left: 6%;">
            Fuga ao tipo
            <input type="radio" name="zero" value="Fuga ao tipo">
        </label>
    </div>
    <div class="form-control">
        <label style="margin-left: 6%;">
            Letra ilegível
            <input type="radio" name="zero" value="Letra ilegível">
        </label>
    </div>
    <div class="form-control">
        <label style="margin-left: 6%;">
            Em branco
            <input type="radio" name="zero" value="Em branco">
        </label>
    </div>
    <div class="form-control">
        <label style="margin-left: 6%;">
            Menos de 8 linhas
            <input type="radio" name="zero" value="8 linhas">
        </label>
    </div>
    <div class="form-control">
        <label style="margin-left: 6%;">
            Cópia
            <input type="radio" name="zero" value="copia">
        </label>
    </div>
</div>

{!! Form::hidden('user_id', auth()->user()->id) !!}
{!! Form::hidden('document_id', $document->id) !!}
{!! Form::hidden('status', $document->status) !!}
{!! Form::hidden('package_id', $document->package_id) !!}