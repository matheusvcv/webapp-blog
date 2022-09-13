<?php

	namespace App\Alura;

	class Contato
	{
		private $email;

		private $endereco;

		private $cep;

		private $telefone;


		public function __construct(string $email, string $endereco, string $cep, string $telefone)
		{
			$this->email = $email;

			if($this->validaEmail($email) !== false){

				$this->setEmail($email);

			} else{

				$this->setEmail("E-mail inválido!");
			}


			$this->endereco = $endereco;

			$this->cep = $cep;

			if($this->validaTelefone($telefone)){

				$this-> setTelefone($telefone);

			} else{

				$this-> setTelefone("Telefone inválido!");
			}
		}

		public function getUsuario()
		{

			$arroba = strpos($this->email, '@');

				if($arroba === false){

					return "E-mail inválido.";

				}else{

					return $usuario = substr($this->email, 0, $arroba);
				}
		}

		public function getEmail(): string
		{
			return $this->email;
		}

		public function validaEmail(string $email): string
		{
			return filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		public function setEmail(string $email): void
		{
			$this->email = $email;
		}

		public function getEnderecoCep(): string
		{
			$enderecoCep = [$this->endereco, $this->cep];

			return implode(' - ', $enderecoCep);
		}

		public function getTelefone(): string
		{
			return $this->telefone;
		}

		private function validaTelefone(string $telefone): int
		{
			return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrados);
		}

		private function setTelefone(string $telefone): void
		{
			$this->telefone = $telefone;
		}

	}