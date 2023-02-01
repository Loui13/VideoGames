<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editoriales extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("editorial");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("editoriales/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosEditorial = array(
            "nombre_edi_fry" => $this->input->post("nombre_edi_fry"),
            "direccion_edi_fry" => $this->input->post("direccion_edi_fry"),
            "email_edi_fry" => $this->input->post("email_edi_fry"),
        );

        print_r($datosNuevaEditorial);
        if ($this->editorial->insertar($datosNuevaEditorial)) {
            $this->session->set_flashdata('confirmacion', 'Editorial insertado exitosamente');
            enviarEmail($datosNuevaEditorial["email_edi_fry"], "Notificacion_Registro", "<h1>Felicitaciones" . $datosNuevaEditorial["nombre_edi_fry"] . "</h1> Acabas de ser registrado en el sistema");
            date("Y-m-d H:i:s");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode(array("estado" => "ok", "mensaje" => "editorial ingresado correctamente")); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar editorial en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["editoriales"] = $this->editorial->obtenerTodos(); //va al modelo a consultar los editorial
        $this->load->view("editoriales/listado", $data); //<-archivo 'listado'

    }
}//cierre de la clase
