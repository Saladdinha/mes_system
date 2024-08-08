@extends("layouts.mes")
@section('title', 'Mes Entrada de Estoque')
@section('content')

<div class="stock_insert_preview w-full">
    <div class="scan-step current flex flex-col gap-2" step="0">
        <x-input-group w="full" type="text" name="scan_readers" id="scan_readers" required="true" inputType="select"
            label="Tipo de código" readonly="false" :items="['code_128' => 'code_128_reader', 'ean' => 'ean_reader', 'ean_8' => 'ean_8_reader', 'code_39' => 'code_39_reader', 'code_39_vin' => 'code_39_vin_reader', 'codabar' => 'codabar_reader', 'upc' => 'upc_reader', 'upc_e' => 'upc_e_reader', 'i2of5' => 'i2of5_reader', '2of5' => '2of5_reader', 'code_93' => 'code_93_reader']">

        </x-input-group>
        <x-cam>

        </x-cam>
        <button id="start_scan"
            class="w-full border-2 py-2 border-primarydar rounded-lg font-semibold font-title bg-neutralblack text-neutralwhite hover:bg-primarydark"
            type='button'>
            Scanear
        </button>
    </div>
    <div class="confirm-step flex flex-col gap-2" step="1">
        <form class="justify-start flex flex-col gap-2 py-4">
            <div class="inputs flex gap-1 flex-wrap justify-between">
                <x-input-group w="full" type="text" name="bar_code" id="bar_code" required="true" inputType="input"
                    label="Código de barras" readonly="true">

                </x-input-group>

                <x-input-group w="1.8/4" type="text" name="product_code" id="product_code" required="true"
                    inputType="input" label="Código do produto" readonly="true">

                </x-input-group>

                <x-input-group w="1.8/4" type="text" name="liquid_weight" id="liquid_weight" required="true"
                    inputType="input" label="Peso liquido" readonly="true">

                </x-input-group>

                <x-input-group w="full" type="text" name="description" id="description" required="false"
                    inputType="textarea" label="Descrição" readonly="false">

                </x-input-group>

                <x-input-group w="1.8/4" type="text" name="allotment" id="allotment" required="true" inputType="input"
                    label="Lote" readonly="true">

                </x-input-group>

                <x-input-group w="1.8/4" type="text" name="validity" id="validity" required="true" inputType="input"
                    label="Validade" readonly="true">

                </x-input-group>
            </div>
            <div class="buttons">
                <x-submit-button>

                </x-submit-button>
            </div>
        </form>
    </div>
</div>
@endsection