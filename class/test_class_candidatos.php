<?php
    include('class_candidatos_dal.php');
    $obj_candidato =  new candidatos_dal;
    $resultado = $obj_candidato->datos_por_rfc('A');

    if ($resultado == null){
        echo "No se encontró rfc";
    }
    else{
        echo '<pre>';
        echo print_r($resultado);
        echo '</pre>';
    }


    $listado=$obj_candidato->lista_candidatos();
    if ($listado==null){
        echo "error no hay lista de candidatos";
    }
    else{
        echo '<pre>';
        echo print_r($listado);
        echo '</pre>';
    }

/*existe candidato*/
echo '<br>';
$result_exis=$obj_candidato->existe_candidato('A');
if ($result_exis==1){
    echo "candidato si existe";
}
else{
    echo "candidato no existe";
}


/*insertado*/
 echo '<br>';
$obj_ins= new candidatos("PEPe121212","RUBY","PEREZ","ABC","M","/uploads/x.doc","2","S",NULL);
$result_ins=$obj_candidato->insertar_candidato($obj_ins);
if ($result_ins==1){
    echo "candidato insertado correctamente";
}
else{
    echo "no se inserto candidato, vuela intentar";
}


echo '<br>';
/*borrado*/
$result_del=$obj_candidato->borra_candidato('B');
if ($result_del==1){
    echo "candidato borrado correctamente";
}
else{
    echo "no se borro candidato, vuela intentar 200 veces";
}


echo '<br>';
/*update*/
$obj_upd= new candidatos("A","RUBYss","PEREZss","ABCs","M","/uploads/x.docss","2","S",NULL);
$result_upd=$obj_candidato->actualiza_candidato($obj_upd);
if ($result_upd==1){
    echo "candidato actualizado correctamente";
}
else{
    echo "no se actualizo candidato, vuela intentar 200 veces";
}
?>