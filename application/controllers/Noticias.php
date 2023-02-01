<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Noticias extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("noticia");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("noticias/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosNoticia = array(
            "nombre_not_fry" => $this->input->post("nombre_not_fry"),
            "descripcion_not_fry" => $this->input->post("descripcion_not_fry"),
        
        );

        if ($this->noticia->insertar($datosNoticia)) {
            $resultado1 = array("estado" => "ok","mensaje" => "noticia ingresado correctamente");
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "noticia ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar noticias en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["noticias"] = $this->noticia->obtenerTodos(); //va al modelo a consultar los noticias
        $this->load->view("noticias/listado", $data); //<-archivo 'listado'

    }
}//cierre de la clase
