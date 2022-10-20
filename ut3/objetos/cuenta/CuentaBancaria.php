<?php

class CuentaBancaria {

    private static int $globalNumber = 100_000; 

    private int $numeroCuenta; 
    private string $nombre;
    private float $saldo;

    private function invalidarCuenta(){
        $this->numeroCuenta = -1;
        $this->saldo = 0;
    }

    public function __construct(string $nombre = 'Anonimo', int $saldo = 0) {
        $this->numeroCuenta = ++self::$globalNumber;
        $this->nombre = $nombre;
        $this->saldo = $saldo;
    }

    public function ingresar (float $ingreso) {
        if ($ingreso > 0)
            $this->saldo += $ingreso;
        else 
            throw new Exception('No puedes introducir un número negativo.');
    }

    public function retirar (float $ingreso) {
        if ($ingreso > 0)
            $this->saldo -= $ingreso;
        else 
            throw new Exception('No puedes introducir un número negativo.');
    }

    public function saldo() {
        return $this->saldo;
    }

    public function transferirA(CuentaBancaria $cuenta, float $cantidad) {
        $cuenta->ingresar($cantidad);
        $this->retirar($cantidad);
    }

    public function unirCon(CuentaBancaria $cuenta) {
        $this->saldo += ($cuenta->saldo()); //Aqui no usamos la funcion ingresar, pues la otra cuenta puede tener saldo negativo
        $cuenta->invalidarCuenta();
    }

    public function bancarrota() {
        $this->salado = 0;
    }

    public function mostrar() {
        return "
        <div class='cuenta'>
            <span class='campo_cuenta'>Numero de cuenta: $this->numeroCuenta</span>
            <span class='campo_cuenta'>Nombre del propietario: $this->nombre</span>
            <span class='campo_cuenta'>Salario del usuario: $this->saldo</span>
        </div>";
    }

}
?>