<?php
	
	include ('tabela.php');

	function maior($array)
	{
		rsort($array);
		echo $array[0];
	}
	function menor($array)
	{
		array_multisort($array);
		echo $array[0];	
	}
	function qtde($array)
	{
		echo count($array);
		
	}
	function media($array)
	{
		echo array_sum($array)/count($array);
	}
	function ordernar($array)
	{
		sort($array);
	}
	function buscar($array, $a)
	{
		return in_array($a, $array);
	}

	function checaResultado($array, $a)
	{
		$cont = 0;
		for ($i = 0; $i < count($array); $i++)
			if($array[$i] == $a)
				$cont++;

		return $cont;
	}

	function familia($familia, $nomes, $animal)
	{
		$var = array('Family' => $familia, 'Pet' => $animal, 'Membros' => $nomes);
		foreach($var  as $varChave => $varValor)
		{
			if($varChave == 'Family')
				echo '<h1>'.$varChave.': '.$varValor.'</h1>';
			else if($varChave == 'Pet')
				echo '<strong>'.$varChave.':</strong> '.$varValor.'<br />';
			else if($varChave == 'Membros')
				{
					echo '<strong>'.$varChave.'</strong> <br /> <ol>';
					foreach ($nomes as $nomesValor)
					{
						echo '<li> '.$nomesValor.'</li><br />';
					}
					echo '</ul>';
				}
		}
	}

	function matriz()
	{
		$matriz = array(array(1, 2, 3),
					array(4, 5, 6),
					array(7, 8, 9));

		for($i = 0; $i <= 2; $i++)
		{
			for ($j=0; $j <= 2 ; $j++)
				echo $matriz[$i][$j].'   ';

			echo "<br />";
		}

		echo "<br />";

		for($i = 0; $i <= 2; $i++)
		{
			for ($j=0; $j <= 2 ; $j++)
				echo $matriz[$j][$i].'   ';
			
			echo "<br />";
		}
	}

	function matriz2()
	{
		$matriz = array(array(1, 2, 3),
					array(4, 5, 6),
					array(7, 8, 9));

		for($i = 0; $i <= 2; $i++)
		{
			for ($j=0; $j <= 2 ; $j++)
			{
				if($matriz[$i][$j] % 2 == 0)
					echo $matriz[$i][$j].'   ';
				else
					echo '*   ';
			}
		}
	}

	function loja()
	{
		$vendedores = array(
			'Vendedor 1' => array(100, 200, 300, 400),
			'Vendedor 2' =>	array(400, 500, 600, 700),
			'Vendedor 3' => array(700, 800, 900, 1000),
			'Vendedor 4' => array(700, 800, 900, 1000),
			'Vendedor 5' => array(700, 800, 900, 1000));
		
		$semana = array(0, 0, 0, 0);
		$total = 0;

		foreach($vendedores  as $Chave => $Valor)
		{
			$vend = 0;
			for($i=0; $i<=3; $i++)
			{
				$vend = $vend+$Valor[$i];
				$total = $total+$Valor[$i];

				$semana[$i] = $semana[$i]+$Valor[$i];
			}
			echo $Chave.' '.$vend.'<br />';
		}

		echo '<br />';

		for($i=0; $i<=3; $i++)
		{
			$j = $i+1;
			echo 'Semana'.$j.' '.$semana[$i].' <br />';
		}

		echo '<br />Total: '.$total.'<br />';
	}

	function tabela()
	{
		include ('tabela.php');

		for($i=0; $i<5; $i++)
		{
			echo '<tr> <td><h1>', $classificacao[$i]['posicao'],
				'</h1></td> <td><h1><img src="',$equipes[$classificacao[$i]['time_id']]["brasao"], 
				'" height=30px width=30px />   ',
				$equipes[$classificacao[$i]['time_id']]["nome-comum"], '</h1></td> <td><h1>',
				$classificacao[$i]['pontos'], '</td> <td><h1>',
				$classificacao[$i]['jogos'], '</td> <td><h1>',
				$classificacao[$i]['vitorias'], '</td> <td><h1>',
				$classificacao[$i]['derrotas'], '</td> <td><h1>',
				$classificacao[$i]['empates'], '</td></tr></h1>';
		}
	}
?>