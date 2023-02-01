<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nuevos extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("nuevo");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("nuevos/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosNuevo = array(
            "nombre_nue_fry" => $this->input->post("nombre_nue_fry"),
            "descripcion_nue_fry" => $this->input->post("descripcion_nue_fry"),
           
        );

        if ($this->nuevo->insertar($datosNuevo)) {
            $resultado1 = array("estado" => "ok","mensaje" => "nuevo ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "nuevo ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar nuevos en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["nuevos"] = $this->nuevo->obtenerTodos(); //va al modelo a consultar los nuevos
        $this->load->view("nuevos/listado", $data); //<-archivo 'listado'

    }
}//cierre de la clase
