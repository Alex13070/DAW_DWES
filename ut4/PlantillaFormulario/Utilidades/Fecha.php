<?php 

namespace ut4\PlantillaFormulario\Utilidades;

use Exception;

class Fecha {

    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year) {
        $this->setYear($year);
        $this->setMonth($month);
        $this->setDay($day);
    }

    //Getters de los atributos
    public function getDay() : int {
        return $this->day;
    }

    public function getMonth() : int {
        return $this->month;
    }

    public function getYear() : int {
        return $this->year;
    }

    // Setters de los atributos

    /**
     * Setter de dia 
     * @param int Dia. Sus limites se calculan en base al mes y al año
     * @throws Exception En caso de que el valor no sea correcto
     */
    public function setDay(int $day) : void {
        if ($day < 0 || $day > cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year)) {
            throw new Exception("El dia debe estar comprendido entre 0 y ". cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year), 1);
        }

        $this->day = $day;
    } 

    /**
     * Setter de month
     * @param int Month. Debe de estar entre 1 y 12
     * @throws Exception En caso de que el valor no sea correcto
     */
    private function setMonth(int $month) : void{
        if ($month < 0 || $month > 12) {
            throw new Exception("El mes debe estar comprendido entre 1 y 12");
        }
        $this->month = $month;
    }

    /**
     * Setter de year
     * @param int Year. Debe ser mayor que 0
     * @throws Exception En caso de que el valor no sea correcto
     */
    public function setYear(int $year) : void{
        if ($year < 0) {
            throw new Exception("El año no puede ser negativo.");
        }
        $this->year = $year;
    }
    
    /**
     * Nos compara la fecha con la fecha actual.
     * @return bool true si esta fecha es posterior a la actual
     */
    public function despuesDeHoy(): bool {
        return $this->posteriorA (self::hoy());
    }

    /**
     * Nos compara la fecha con la fecha actual.
     * @return bool true si esta fecha es anterior a la actual
     */
    public function antesDeHoy(): bool {
        return $this->anteriorA(self::hoy());
    }
    
    /**
     * Nos compara la fecha con la fecha actual.
     * @return bool true si esta fecha es igual a la actual
     */
    public function esHoy(): bool {
        return $this->igualA(self::hoy());
    }

    /**
     * Comprueba si esta fecha es posterior a la introducida
     * @param Fecha fecha con la que comparar
     * @return bool true si es posterior false si no
     */
    public function posteriorA(Fecha $fecha) : bool {
        return $this->year > $fecha->year || 
            $this->year == $fecha->year && $this->month > $fecha->month || 
            $this->year == $fecha->year && $this->month == $fecha->month && $this->day > $fecha->day
        ;
    }

    /**
     * Comprueba si esta fecha es igual a la introducida
     * @param Fecha fecha con la que comparar
     * @return bool true si es igual false si no
     */
    public function igualA(Fecha $fecha) : bool {
        return $this->year == $fecha->year && $this->month == $fecha->month && $this->day == $fecha->day;
    }

    /**
     * Comprueba si esta fecha es anterior a la introducida
     * @param Fecha fecha con la que comparar
     * @return bool true si es anterior false si no
     */
    public function anteriorA(Fecha $fecha) : bool {
        return $this->year < $fecha->year || 
            $this->year == $fecha->year && $this->month < $fecha->month || 
            $this->year == $fecha->year && $this->month == $fecha->month && $this->day < $fecha->day
        ;
    }
    
    public static function hoy() : Fecha{
        return new Fecha (intval(date("j")), intval(date('m')), intval(date('Y')));
    }
    
    public function toDDMMYYYY() : string {
        return $this->ponerCeros($this->day) . "-" . $this->ponerCeros($this->month) . "-" . $this->year;
    }

    public function toYYYYMMDD() : string {
        return $this->year . "-" . $this->ponerCeros($this->month) . "-" . $this->ponerCeros($this->day);
    }

    private function ponerCeros(int $i) : string {
        return ($i < 10) ? "0".$i : $i;
    }

    public static function fromDDMMYYYY(string $str, string $separator) {
        $array = explode($separator, $str);
        return new Fecha (intval($array[0]), intval($array[1]), intval($array[2]));
    }

    public static function fromYYYYMMDD(string $str, string $separator) {
        $array = explode($separator, $str);
        return new Fecha (intval($array[2]), intval($array[1]), intval($array[0]));
    }
    
}

?>