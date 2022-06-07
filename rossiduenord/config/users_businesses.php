<?php
	//	return [
	//		// Lista dei ruoli a cui viene automaticamente associato un utente creato
	//		'from' => [
	//			'business',
	//		],
	//		// Lista dei ruoli selezionabili per far vedere la lista delle imprese a cui associarli
	//		'to' => [
	//			'technical_asseverator',
	//			'fiscal_asseverator',
	//			'collaborator',
	//			'consultant'
	//		],
	//	];
	return [
		'collaborator'          => [
			'business' => 'Impresa'
		],
		'consultant'            => [
			'business' => 'Impresa'
		],
		'technical_asseverator' => [
			'business' => 'Impresa'
		],
		'fiscal_asseverator'    => [
			'business' => 'Impresa'
		],
		'financial'             => [],
		'business'              => [
			'bank'      => 'Banca',
			'financial' => 'Soc. Finanziaria',
		],
	];