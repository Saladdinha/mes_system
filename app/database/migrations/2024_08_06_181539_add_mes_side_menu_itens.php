<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('side_menus')) {
            $mes_itens = [
                [
                    "name" => "Entrada de estoque",
                    "icon" => "fa-solid fa-file-import",
                    "route" => "mes_stock_insert",
                    "group" => "mes"
                ],
                [
                    "name" => "Consultar estoque",
                    "icon" => "fa-solid fa-magnifying-glass",
                    "route" => "mes_stock_query",
                    "group" => "mes"
                ],
                [
                    "name" => "Conferência de pedido",
                    "icon" => "fa-solid fa-magnifying-glass",
                    "route" => "mes_order_query",
                    "group" => "mes"
                ],
                [
                    "name" => "Atualizar etiquetas",
                    "icon" => "fa-regular fa-pen-to-square",
                    "route" => "mes_stock_update",
                    "group" => "mes"
                ],
                [
                    "name" => "Conferência de inventário",
                    "icon" => "fa-solid fa-magnifying-glass",
                    "route" => "mes_inventory_query",
                    "group" => "mes"
                ],
                [
                    "name" => "Relatório de estoque",
                    "icon" => "fa-regular fa-file-pdf",
                    "route" => "mes_report_stock",
                    "group" => "mes"
                ],
                [
                    "name" => "Endereçamento",
                    "icon" => "fa-solid fa-location-pin",
                    "route" => "mes_addressing",
                    "group" => "mes"
                ]
            ];

            foreach ($mes_itens as $k => $item) {
                DB::table('side_menus')->insert(
                    array(
                        "name" => $item["name"],
                        "icon" => $item["icon"],
                        "route" => $item["route"],
                        "group" => $item["group"]
                    )
                );
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
