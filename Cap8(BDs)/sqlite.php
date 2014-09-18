<head>
	<meta charset="UTF-8">
</head>

<?php
### CRIANDO TABELAS ###

function executarComando($db, $comando, $nomeComando) {
	if (!$db->exec($comando)) {
		echo "Não foi possível executar o comando {$nomeComando} </br>";
	} else {
		echo "Comando {$nomeComando} executado com sucesso </br>";
	}
}

function popularTabelaAutores($db) {
	//Dropando tabela autores
	$sql = "DROP TABLE 'autores';";
	executarComando($db, $sql, "Apagando Tabela Autores");
	
	//Criando tabelas
	$sql = "CREATE TABLE 'autores' ('id' INTEGER PRIMARY KEY, 'nome' TEXT)";
	executarComando($db, $sql, "Criar Tabela Autores");
	
	//Inserindo autores
$sql = <<<SQL
	INSERT INTO 'autores' (nome) values ('J.R.R. Tolkien');
	INSERT INTO 'autores' (nome) values ('R.R Martin');
	INSERT INTO 'autores' (nome) values ('Isaac Asimov');
	INSERT INTO 'autores' (nome) values ('Robert Kiyosaki');
SQL;
	
	executarComando($db, $sql, "Inserir autores");
}

function popularTabelaLivros($db) {
	//Dropando tabela livros
	$sql = "DROP TABLE 'livros';";
	executarComando($db, $sql, "Apagando Tabela Livros");
	
	//Criando livros
	$sql = "CREATE TABLE 'livros' ('id' INTEGER PRIMARY KEY, 
								  'idAutor' INTEGER,
								  'titulo' TEXT,
								  'ISBN' TEXT,
								  'anoPublicacao' INTEGER,
								  'disponivel' INTEGER)";
	executarComando($db, $sql, "Criar Tabela Livros");
	
//Inserindo livros
$sql = <<<SQL
	INSERT INTO livros ('idAutor', 'titulo', 'ISBN', 'anoPublicacao', 'disponivel') VALUES (1, 'As Duas Torres', '0-261-10236-2', 1954, 1);
	INSERT INTO livros ('idAutor', 'titulo', 'ISBN', 'anoPublicacao', 'disponivel') VALUES (1, 'O Retorno do Rei', '0-261-10237-0', 1955, 1);
	INSERT INTO livros ('idAutor', 'titulo', 'ISBN', 'anoPublicacao', 'disponivel') VALUES (4, 'Pai Rico, Pai Pobre', '0-440-17464-3', 1974, 1);
	INSERT INTO livros ('idAutor', 'titulo', 'ISBN', 'anoPublicacao', 'disponivel') VALUES (3, 'Eu, Robô', '0-553-29438-5', 1950, 1);
	INSERT INTO livros ('idAutor', 'titulo', 'ISBN', 'anoPublicacao', 'disponivel') VALUES (3, 'Foundation', '0-553-80371-9', 1951, 1);
SQL;
	executarComando($db, $sql, "Inserir Livros");
}

/*
 * Ferramenta de banco de dados leve.
 * Armazenamento é bazeado em arquivo.
 */
$db = new SQLite3("C:/Rafael/biblioteca.sqlite");
popularTabelaAutores($db);
popularTabelaLivros($db);
?>

<?php 
/*
 * SQLite faz qualquer coluna definida como INTEGER e PK como AUTO_INCREMENT, já que não existe.
 * 
 * Tipos do SQLite:
 * 	
 * 	Text -> Armazena NULL, TEXT ou BLOB. Se número for informado, é convertido para texto.
 * 	Numeric -> Armazena integer ou real, se informado texto, é convertido para número.
 * 	Integer -> Igual ao numérico, só que se for fornecido real é convertido para inteiro.
 * 	Real -> Força inteiro a virar ponto flutuante
 * 	None -> Dado é armazenado como é fornecido
 */

function imprimirLivros(SQLite3 $db) {
	$sql = "SELECT a.nome, l.titulo FROM livros l, autores a WHERE l.idAutor=a.id";
	$resultado = $db->query($sql);
	while ($linha = $resultado->fetchArray(SQLITE3_ASSOC)) {
		echo "O Autor do livro {$linha['titulo']} é {$linha['nome']} <br/>"; 
	}
}

imprimirLivros($db);
?>