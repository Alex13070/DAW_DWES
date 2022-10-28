<?php

class BancoMaloMalisimo implements PlataformaPago {

    public function estableceConexión():bool {
        echo "<p>Conexión BancoMaloMalisimo</p>";
        return true;
    }

    public function compruebaSeguridad():bool {
        echo "<p>Conexion segura BancoMaloMalisimo</p>";
        return true;
    }

    public function pagar(string $cuenta, int $cantidad) {
        echo "<p>Pago realizado BancoMaloMalisimo</p>";
    }
}


?>