<?php
  include_once 'model/Model.php';
  /**
   *
   */
  class controllerMobil{
    var $model;
    function __construct(){
      $this->model = new Model();
    }

    public function daftarMobil(){
      $data = $this->model->selectAll("mobil");
      include_once 'view/header.php';
      include_once 'view/listMobil.php';
    }

    public function tambahMobil(){
      $plat = $_POST['plat'];
      $tipe = $_POST['tipe'];
      $jenis = $_POST['merk'];
      $harga = $_POST['harga'];
      $tahun = $_POST['tahun'];

      $data = array($plat,$tipe,$jenis,$harga,$tahun);
      $this->model->input("mobil",$data);
      header("Location:index.php");
    }

    public function viewInput(){
      include_once 'view/header.php';
      include_once 'view/inputMobil.php';
    }

    public function viewEdit($id){
      $result = $this->model->selectWhere("mobil","Plat_Nomor",$id);
      $row = $this->model->fetch($result);
      print_r($row);
      include_once 'view/header.php';
      include_once 'view/editMobil.php';
    }

    public function editMobil(){
      $plat = $_POST['plat'];
      $tipe = $_POST['tipe'];
      $jenis = $_POST['merk'];
      $harga = $_POST['harga'];
      $tahun = $_POST['tahun'];

      $data = array($plat,$tipe,$jenis,$harga,$tahun);
      $this->model->update("mobil",$data);
    }

    public function hapusMobil($id){
      $this->model->delete("mobil","Plat_Nomor",$id);
      $this->daftarMobil();
    }


  }


?>
