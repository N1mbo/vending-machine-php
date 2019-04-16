<?php

declare(strict_types=1);

namespace VendingMachine;

use PHPUnit\Framework\TestCase;

final class VendingMachineTest extends TestCase
{
    /**
     * @var VendingMachine
     */
    private $vendingMachine;

    public function setUp(): void
    {
        $vm = new VendingMachine();
        $this->vendingMachine = $vm;
    }

    public function testServiceReturnsNoService(): void
    {
        $this->vendingMachine->service();

        $this->assertGreaterThanOrEqual(1, $this->vendingMachine->get_available_items("A"));
        $this->assertGreaterThanOrEqual(1, $this->vendingMachine->get_available_items("B"));
        $this->assertGreaterThanOrEqual(1, $this->vendingMachine->get_available_items("C"));
    }

    public function testInsertCoin(): void
    {
      foreach($this->vendingMachine->$coin_values as $coin_type => $value) {
        $old_amount = $this->vendingMachine->get_coin_count($coin_type);
        $old_inserted = $this->vendingMachine->get_inserted_money();

        $this->vendingMachine->insert_coin($coin_type);

        $this->assertEquals($old_amount + 1, $this->vendingMachine->get_coin_count($coin_type));
        $this->assertEquals($old_inserted + $this->vendingMachine->$coin_values[$coin_type], $this->vendingMachine->get_inserted_money());
      }
    }
}
