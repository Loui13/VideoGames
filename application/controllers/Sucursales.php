<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sucursales extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sucursal");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("sucursales/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosSucursal = array(
            "provincia_suc_fry" => $this->input->post("provincia_suc_fry"),
            "ciudad_suc_fry" => $this->input->post("ciudad_suc_fry"),
            "estado_suc_fry" => $this->input->post("estado_suc_fry"),
            "direccion_suc_fry" => $this->input->post("direccion_suc_fry"),
            "email_suc_fry" => $this->input->post("email_suc_fry"),
        );

        if ($this->sucursal->insertar($datosSucursal)) {
            $resultado1 = array("estado" => "ok","mensaje" => "sucursal ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "sucursal ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar sucursales en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["sucursales"] = $this->sucursal->obtenerTodos(); //va al modelo a consultar los sucursales
        $this->load->view("sucursales/listado", $data); //<-archivo 'listado'

    }
}//cierre de la clase
