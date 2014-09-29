<head>
	<meta charset="UTF-8"/>
</head>

<?php
/*
 * Quatro classes relacionadas para manipulação de datas e hora.
 * 
 * DateTime: Manipula datas;
 * DateTimeZone: Manipula timeZones;
 * DateTimeInterval: Manipula períodos de tempo entre duas instâncias DateTime
 * DatePeriod: Manipula "travessias?" sobre intervalos regulares de datas e horas.
 * 
 * DateTime: Recebe timeStamp e TimeZone
 */

//HardCoded
$dt = new DateTime("2014-09-29 15:52:00", new DateTimeZone("America/Halifax"));

//Pegando as configurações do servidor
$timezoneServidor = ini_get('date.timezone');
$dateTimeZone = new DateTimeZone($timezoneServidor);
$dt = new DateTime("2014-09-29 15:52:00", $dateTimeZone);

$formatoDataAntiga = $dt->format("d/m/y H:i:s");
echo "Data: " . $formatoDataAntiga . "<br/>";

//Imprime a data atual
$dtBrasil = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
echo "Data: " . $dtBrasil->format("d/m/y H:i:s") . "<br/>";

/*
 * Método Diff no DateTime retorna o DateInterval, a diferença entre duas datas.
 */
$diferenca = $dtBrasil->diff($dt);

$formatoDataAtual = $dtBrasil->format("d/m/y H:i:s");
$diffString = $diferenca->format("%y ano(s), %m mes(es), %d dia(s), %h hora(s), %i minuto(s) e %s segundo(s)");

echo "Diferença entre {$formatoDataAntiga} e {$formatoDataAtual} é {$diffString}";
?>
<br/><br/>
<h2>Dados do TimeZone do Servidor</h2>
<?php
foreach ($dateTimeZone->getLocation() as $key=>$value) {
	echo "{$key}: {$value} <br/>";
}
?>