<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactos extends CI_Controller
{
    //definiendo el constructor de la clase
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contacto");
    }

    public function index()
    {
        $this->load->view("header");
        $this->load->view("contactos/index");
        $this->load->view("footer");
    }

    public function guardar()
    {
        $datosContacto = array(
            "sucursal_con_fry" => $this->input->post("sucursal_con_fry"),
            "telefono_con_fry" => $this->input->post("telefono_con_fry"),
            "email_con_fry" => $this->input->post("email_con_fry"),
        );

        if ($this->contacto->insertar($datosContacto)) {
            $resultado1 = array("estado" => "ok",
            "mensaje" => "contacto ingresado correctamente",
            $apiToken = "5823675139:AAFmWE7XeGoJlqjq1eVQsKhvc0J6SrOjZJM",
                $data = [
                    'chat_id' => '-1001858896066', //-1001858896066   @Zirctech
                    'text' => 'Bienvenid@ somos Zirctech una empresa dedicada a la distribucion y desarrollo de videojuegos'
                ],
                $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ),
            );
        } else {
            $resultado1  = array(
                "estado" => "error"
            );
        }
        echo json_encode( array("estado" => "ok","mensaje" => "contacto ingresado correctamente") ); //json es entendido en todos los lenhuajes y la linea nos ayuda a recargar solo lo que necesitamos y no toda la app
    }


    //funcion para consultar contactos en formato Json
    public function listado() //funcion consultar debe ser la misma que el archivo
    {
        $data["contactos"] = $this->contacto->obtenerTodos(); //va al modelo a consultar los contactos
        $this->load->view("contactos/listado", $data); //<-archivo 'listado'

    }


    public function editar($id_con_fry){
        $data["contacto"]=$this->contacto->obtenerPorId($id_con_fry);
        $this->load->view("contactos/editar",$data);
    }


    
public function procesarEditar(){
	$datosContactoEditado=array(
        "sucursal_con_fry" => $this->input->post("sucursal_con_fry"),
        "telefono_con_fry" => $this->input->post("telefono_con_fry"),
        "email_con_fry" => $this->input->post("email_con_fry"),
	);
	$id=$this->input->post("id_con_fry");

	if($this->contacto->editar($id_con_fry,$datosContactoEditado)){
		redirect("contactos/listado");
	}else{
		echo "<h1>ERROR</h1>";
	}
}

}//cierre de la clase
;