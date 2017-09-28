<?php
    // Não mexer neste código
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'http://jsuol.com.br/c/monaco/utils/gestor/commons.js?file=commons.uol.com.br/sistemas/esporte/modalidades/futebol/campeonatos/dados/2017/30/dados.json');
    $tabela = curl_exec($ch);
    curl_close($ch);

    $tabela = json_decode($tabela);

    $equipes = [];
    foreach($tabela->equipes as $id => $equipe) {
        $time = (array) $equipe;
        $equipes[$time['id']]["id"] = $time['id'];
        $equipes[$time['id']]["nome"] = $time['nome'];
        $equipes[$time['id']]["nome-comum"] = $time['nome-comum'];
        $equipes[$time['id']]["brasao"] = $time['brasao'];
        $equipes[$time['id']]["sigla"] = $time['sigla'];
    }
    $classificacao = [];
    foreach($tabela->fases as $table) {
        foreach($table->classificacao->equipe as $id => $equipe) {
            $time = (array) $equipe;
            $classificacao[$id]["time_id"] = $time["id"];
            $classificacao[$id]["posicao"] = $time["pos"];
            $classificacao[$id]["pontos"] = $time["pg"]->total;
            $classificacao[$id]["jogos"] = $time["j"]->total;
            $classificacao[$id]["vitorias"] = $time["v"]->total;
            $classificacao[$id]["empates"] = $time["e"]->total;
            $classificacao[$id]["derrotas"] = $time["d"]->total;
            $classificacao[$id]["saldo"] = $time["sg"]->total;
        }
    }
    usort($classificacao, function($a, $b){
        return ($a['posicao'] < $b['posicao']) ? -1 : 1;
    });

    /*This code DON'T belongs to me. My teacher gave to me for an exercise*/
?>
