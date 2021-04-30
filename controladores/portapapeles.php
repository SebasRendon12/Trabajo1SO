<?php

class CopiarPegar
{
  public static $raiz = "";
  public static $nombre = "";

  public function __construct()
  {
  }

  public static function setPortapapeles($nomdir, $name)
  {
    CopiarPegar::$raiz = $nomdir;
    CopiarPegar::$nombre = $name;
  }

  public static function getNombre()
  {
    $res = CopiarPegar::$nombre;
    return $res;
  }

  public static function getDirectorio()
  {
    return CopiarPegar::$raiz . CopiarPegar::$nombre;
  }

  public static function portapapelesExist()
  {
    if (empty(CopiarPegar::$raiz) || empty(CopiarPegar::$nombre)) {
      return false;
    } else {
      return true;
    }
  }
}
