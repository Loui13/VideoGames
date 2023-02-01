<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Descuentos extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("descuento");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("descuentos/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosDescuento = array(
            "juego_des_fry" => $this->input->post("juego_des_fry"),
            "porcentaje_des_fry" => $this->input->post("porcentaje_des_fry"),

        );

        if ($this->descuento->insertar($datosDescuento)) {
            $resultado1 = array("estado" => "ok","mensaje" => "descuento ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "descuento ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar descuentos en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["descuentos"] = $this->descuento->obtenerTodos(); //va al modelo a consultar los descuentos
        $this->load->view("descuentos/listado", $data); //<-archivo 'listado'

    }

    //eliminar con ajax
    public function borrar()
    {

        $id_des_fry = $this->input->post("id_des_fry");
        if ($this->descuento->eliminarPorId($id_des_fry)) {
            echo json_encode(
                array(
                    "estado" => "ok",
                    "mensaje" => "Congifuracion eliminada existosamente"
                )
            );
        } else {

            echo json_encode(array("estado" => "error"));
        }
    }

}//cierre de la clase
