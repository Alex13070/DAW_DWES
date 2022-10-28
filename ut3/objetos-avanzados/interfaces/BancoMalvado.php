<?php 

// Haz una implementación del pago con BancoMalvado. Simplemente escribe:

// conexión BancoMalvado
// conexión segura BancoMalvado
// Pago realizado BancoMalvado
// Realiza un página que cree una conexión con BancoMalvado y realice las 3 acciones.

class BancoMalvado implements PlataformaPago {

    public function estableceConexión():bool {
        echo "<p>Conexión BancoMalvado</p>";
        return true;
    }

    public function compruebaSeguridad():bool {
        echo "<p>Conexion segura BancoMalvado</p>";
        return true;
    }

    public function pagar(string $cuenta, int $cantidad) {
        echo "<p>Pago realizado BancoMalvado</p>";
    }
}


?>