<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Configuraciones extends CI_Controller
{

    // definiendo el constructor de la clase 
    public function __construct()
    {
        parent::__construct();
        $this->load->model("configuracion"); //llamamos al modeelo 
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('configuraciones/index');
        $this->load->view('footer');
    }

    //?Insercion Asincrona
    public function guardar()
    {
        $datosConfiguracion = array(
            "nombre_empresa_fry" => $this->input->post("nombre_empresa_fry"),
            "ruc_fry" => $this->input->post("ruc_fry"),
            "telefono_fry" => $this->input->post("telefono_fry"),
            "direcion_fry" => $this->input->post("direcion_fry"),
            "representante_fry" => $this->input->post("representante_fry"),

        );
        if ($this->configuracion->insertar($datosConfiguracion)) {
            $resultado = array(
                "estado" => "ok",
                "mensaje" => "Categoria insertado exitosamente"
            );
        } else {
            $resultado = array(
                "estado" => "error"
            );
        }
        echo json_encode($resultado);
    }

    //eliminar con ajax
    public function borrar()
    {

        $id_fry = $this->input->post("id_fry");
        if ($this->configuracion->eliminarPorId($id_fry)) {
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
    public function listado()
    {
        $data["Configuraciones"] = $this->configuracion->obtenerTodos();
        $this->load->view("configuraciones/listado", $data);
    }

    //?funcion para consultar profesores en formato json
    /* public function borrar($id_fry)
    {
        if ($this->configuracion->eliminarPorId($id_fry)) {
            $this->session->set_flashdata('confirmacion', 'Estudiante eliminado exitosamente'); 
           // enviarEmail($id_fry["direccion_est"], "Notificacion_Retiro", "<h1>El usuario: ".$id_fry["nombre_fry"]."</h1> Acabas de ser eliminado del sistema");
            //date("Y-m-d H:i:s");
        } else {
            $this->session->set_flashdata('error', 'Error al insertar, verifique e intente de nuevo');//? set_fñashdata crear una variable de sesion
        }
        redirect('configuraciones/index');
    } */
}
