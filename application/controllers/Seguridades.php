<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridades extends CI_Controller {
  // definiendo el constructor de la clase
  public function __construct(){
    parent::__construct();
    //llamando al modelo
    $this->load->model("usuario");
  }

  public function index(){
    $this->load->view("seguridades/login");

  }

  public function validarUsuario(){
      $email=$this->input->post("email_usu_fry");
      $password=$this->input->post("password_usu_fry");
      $usuarioEncontrado=$this->usuario->obtenerPorEmailPassword($email,$password);
      if($usuarioEncontrado){
        //Cuando el email y password estan BIEN
        //Se debe crear la sesion
        $this->session->set_userdata('conectad0',$usuarioEncontrado);
        $this->session->set_flashdata("confirmacion",
        "Bienvenido al Sistema");
        redirect("welcome/index");
      }else{
        //Cuando el email y/o password estan MAL
        $this->session->set_flashdata("error",
        "Email o contraseña incorrectos");
        redirect("seguridades/login");
      }
    }
} //cierre de la clase
