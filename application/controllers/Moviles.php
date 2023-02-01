<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moviles extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("movil");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("moviles/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosMovil = array(
            "nombre_mov_fry" => $this->input->post("nombre_mov_fry"),
            "descripcion_mov_fry" => $this->input->post("descripcion_mov_fry"),
        
        );

        if ($this->movil->insertar($datosMovil)) {
            $resultado1 = array("estado" => "ok","mensaje" => "movil ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "movil ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar moviles en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["moviles"] = $this->movil->obtenerTodos(); //va al modelo a consultar los moviles
        $this->load->view("moviles/listado", $data); //<-archivo 'listado'

    }
}//cierre de la clase
