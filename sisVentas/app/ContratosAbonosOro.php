<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ContratosAbonosOro extends Model
{
  /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contratos_abonosoro';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'contratos_codigo',
			'fecha_renovacion',
			'fecha_mes',
			'fecha_final',
			'dias',
			'total_interes',
			'total_mora',
			'total_pagado',
	];
	
	public function getAbonosCapitalxContratooro($codigo) {
		$consulta = ContratosAbonosoro::where('contratos_codigo', $codigo)
		->get();
	
		return $consulta;
	}
}
