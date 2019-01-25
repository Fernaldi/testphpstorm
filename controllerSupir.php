<?php
  ob_start();
  include_once 'model/Model.php';
  /**
   *
   */
  class controllerSupir{
    var $model;
    function __construct(){
      $this->model = new Model();
    }

    public function daftarSupir(){
      $data = $this->model->selectAll("supir");
      include_once 'view/header.php';
      include_once 'view/listSupir.php';
    }

    public function tambahSupir(){
      $idsupir = $_POST['idsupir'];
      $nama = $_POST['nama'];
      $noktp = $_POST['noktp'];
      $alamat = $_POST['alamat'];
      $nohp = $_POST['nohp'];
      $status = $_POST['status'];

      $data = array($idsupir,$nama,$noktp,$alamat,$nohp,$status);
      $this->model->input("supir",$data);
      header("Location:index.php?supir=list");
    }

    public function viewInput(){
      include_once 'view/header.php';
      include_once 'view/inputSupir.php';
    }

    public function viewEdit($id){
      $result = $this->model->selectWhere("supir","ID_Supir",$id);
      $row = $this->model->fetch($result);
      print_r($row);
      include_once 'view/header.php';
      include_once 'view/editSupir.php';
    }

    public function editSupir(){
      $idsupir = $_POST['idsupir'];
      $nama = $_POST['nama'];
      $noktp = $_POST['noktp'];
      $alamat = $_POST['alamat'];
      $nohp = $_POST['nohp'];
      $status = $_POST['status'];

      $data = array($idsupir,$nama,$noktp,$alamat,$nohp,$status);
      $this->model->update("supir",$data);
      header("Location:index.php?supir=list");
    }

    public function hapusSupir($id){
      $this->model->delete("supir","ID_Supir",$id);
      $this->daftarSupir();
    }


  }


?>
