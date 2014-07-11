<?php
	##Casting##

	/*
	 * Integer e Ponto Flutuante: Integer transformado em ponto flutuante
	 * Integer e String: String transformado em número, se for ponto flutuante, integer é convertido para ponto flutuante
	 * Ponto Flutuante e String: String para ponto flutuante
	 * 
	 * ## Cast de String para número: Se não começar com número, ou tiver outra letra que não "e", tem valor zero. 
	 * Se tiver "e" é ponto flutuante.
	 */

	echo "9 Lives" - 1 . "<br/>"; // 8 (int)
	echo "3.14 Pies" * 2 . "<br/>"; // 6.28 (float)
	echo "9 Lives." - 1 . "<br/>"; // 8 (float)
	echo "1E3 Points of Light" + 1 . "<br/>"; // 1001 (float)
?>