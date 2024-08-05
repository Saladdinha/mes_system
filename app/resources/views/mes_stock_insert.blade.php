@extends("layouts.mes")
@section('title', 'Mes Entrada de Estoque')
@section('content')

<div class="stock_insert_preview flex gap-2 w-full">
    <x-cam>

    </x-cam>
    <form class="w-1.8/4 flex gap-1 flex-wrap items-start justify-between h-max">
        <x-input-group w="full" type="text" name="bar_code" id="bar_code" required="true" inputType="input" label="Código de barras"
            readonly="true">

        </x-input-group>

        <x-input-group w="1.8/4" type="text" name="product_code" id="product_code" required="true" inputType="input"
            label="Código do produto" readonly="true">

        </x-input-group>

        <x-input-group w="1.8/4" type="text" name="liquid_weight" id="liquid_weight" required="true" inputType="input"
            label="Peso liquido" readonly="true">

        </x-input-group>

        <x-input-group w="full" type="text" name="description" id="description" required="false" inputType="textarea"
            label="Descrição" readonly="false">

        </x-input-group>

        <x-input-group w="1.8/4" type="text" name="allotment" id="allotment" required="true" inputType="input" label="Lote"
            readonly="true">

        </x-input-group>

        <x-input-group w="1.8/4" type="text" name="validity" id="validity" required="true" inputType="input" label="Validade"
            readonly="true">

        </x-input-group>
        <x-submit-button>
            
        </x-submit-button>
    </form>
</div>
@endsection