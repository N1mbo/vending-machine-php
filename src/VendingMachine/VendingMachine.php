<?php

declare(strict_types=1);

namespace VendingMachine;

final class VendingMachine {
    function __construct() {}

    const $coin_values = [
      "NICKEL" -> 0.05,
      "DIME" -> 0.1,
      "QUARTER" -> 0.25,
      "DOLLAR" -> 1.0
    ]

    const $item_values = [
      "A" -> 0.65,
      "B" -> 1.0,
      "C" -> 1.5
    ];

    public $available_items = [
      "A" -> 0,
      "B" -> 0,
      "C" -> 0
    ];
    public $currently_inserted_money = 0.0; #pocket
    public $available_change = [
      "NICKEL" -> 0,
      "DIME" -> 0,
      "QUARTER" -> 0,
      "DOLLAR" -> 0
    ]

    public function insert_coin($coin_type)
    {
      if (in_array($coin_type, $coin_values)) {
        $available_change[$coin_type] += 1;
        $currently_inserted_money += $coin_values[$coin_type];
      }
    }

    public function get_inserted_money()
    {
      return $currently_inserted_money;
    }

    public function get_coin_count($coin_type)
    {
      if (in_array($coin_type, $coin_values))
        return $available_change[$coin_type];
      else return 0;
    }

    public function get_available_items($item_type)
    {
      if(in_array($item_type, $available_items))
        return $available_items[item_type];
      else return 0;
    }

    public function service(): string
    {
        $available_items["A"] = 1;
        $available_items["B"] = 1;
        $available_items["C"] = 1;

        return;
    }
}
