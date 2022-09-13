<?php

	namespace App\Alura;

	class Usuario
	{
		private $nome;

		private $sobrenome;

		private $senha;

		private $tratamento;

		public function __construct(string $nome, string $senha, string $genero)
		{
			$nomeSobrenome = explode(' ', $nome, 2);

			if($nomeSobrenome[0] !== ''){

				$this->nome = $nomeSobrenome[0];
			} else{

				$this->nome = "Nome inválido!";
			}

			if($nomeSobrenome[1] === null) {

				$this->sobrenome = "Sobrenome inválido";

			}else{

				$this->sobrenome = $nomeSobrenome[1];
			}


			$this->validaSenha($senha);

			$this->adicionaTratamentoAoSobrenome($nome, $genero);

		}

		public function getNome(): string
		{
			return $this->nome;
		}

		public function getSobrenome(): string
		{
			return $this->sobrenome;
		}

		public function getSenha(): string
		{
			return $this->senha;
		}

		public function validaSenha(string $senha): void
		{
			$tamanhoSenha = strlen(trim($senha));

			if($tamanhoSenha > 6){

				$this->senha = $senha;

			}else{

				$this->senha = "Senha inválida.";

			}
		}

		public function adicionaTratamentoAoSobrenome(string $nome, string $genero): void
		{
			if($genero === "M"){

				$this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);

			}

			if($genero === "F"){

				$this->tratamento = preg_replace('/^(\w+)\b/', 'Sra.', $nome, 1);

			}
		}

		public function getTratamento(): string
		{
			return $this->tratamento;
		}

		
	}		