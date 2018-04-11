<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ContratosVitrinas extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contratos_vitrinas';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'contratos_codigo',
			'fecha_inicial_vitrina',
			'fecha_final_vitrina',
			'dias',
			'tazacion',
			'total_valor'
	];
}
