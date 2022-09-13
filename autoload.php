<?php

	spl_autoload_register(function($classe){

		$caminhoArquivo = str_replace('App\\Alura', 'src', $classe);

		$caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);

		$caminhoArquivo .= ".php";


			if(file_exists($caminhoArquivo)){

				require_once "$caminhoArquivo";

			}

	});