<?php

class BitCoinConan implements PlataformaPago {

    public function estableceConexión():bool {
        echo "<p>Conexión BitCoinConan</p>";
        return true;
    }

    public function compruebaSeguridad():bool {
        echo "<p>Conexion segura BitCoinConan</p>";
        return true;
    }

    public function pagar(string $cuenta, int $cantidad) {
        echo "<p>Pago realizado BitCoinConan</p>";
    }
}


?>