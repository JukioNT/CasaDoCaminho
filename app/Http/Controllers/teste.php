<?php
    function teste($path){
        $origem = "../../../storage/app/public/".$path;
        echo $origem;

        $destino = "../../../public/images/teste";
        echo $destino;

        if(!copy($origem, $destino)){
            echo "Falha ao copiar a imagem";
        }
    }
?>