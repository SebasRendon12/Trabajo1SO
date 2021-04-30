<?php

function full_copy( $source, $target ) {
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }
}


$directorio = $_POST["directorio"];
$raiz = $_POST["raiz"];
$destino= $_POST["destino"];
$nombre=$_POST["nombre"]


if(!is_dir('carpeta_copia')){
    full_copy($directorio, $destino);
}else{
    echo "<h1>Ya existe</h1>";
    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
}
    



/*
if (is_file($directorio)){
    if($directorio == $destino){
        if(copy($directorio,$destino.))
    }else{
        if(copy($directorio,$destino)){
            header("Location: ../explorador.php?ruta=$raiz");
        }
        else{
            echo "<h1>No se pudo copiar</h1>";
            echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
        }
    }
}
elseif(!is_dir($directorio)){

}
