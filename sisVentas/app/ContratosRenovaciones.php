<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ContratosRenovaciones extends Model
{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contratos_renovaciones';
	
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
			'tiendas_id',
			'dias',
			'total_interes',
			'total_mora',
			'total_pagado',
	];
	
	public function getRenovacionesxContrato($codigo) {
		$consulta = ContratosRenovaciones::where('contratos_codigo', $codigo)
		->get()->last();
		
		return $consulta;
	}
	
}
