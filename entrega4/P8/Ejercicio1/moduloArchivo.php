<?php

class ArchivoTexto
{
    protected $nombreDelFichero;

    public function __construct($nombreDelFichero){
        $this->nombreDelFichero = $nombreDelFichero;
    }

    public function crearArchivo(){
        return file_put_contents($this->nombreDelFichero, "");
    }

    public function visualizarContenido() {
        return file_get_contents($this->nombreDelFichero);
    }

    public function añadirInformacion($informacion){
        return file_put_contents($this->nombreDelFichero, $informacion, FILE_APPEND | LOCK_EX);
    }

    public function modificarArchivo($informacion){
        $this->crearArchivo();
        $this->añadirInformacion($informacion);
    }

    /*
      Método ridículo, tal y como está planteado el Ejercicio,
      para eliminar la información, solo tengo que a la hora de modificar el contenido del archivo,
      puedo hacerlo directamente desde el textarea.
    */
    public function eliminarInformacion(){
        $this->crearArchivo();
    }

    public function eliminarFichero(){
        return unlink($this->nombreDelFichero);
    }

}

?>
