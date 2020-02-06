<?php
namespace App;

use App\Flag;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'latitude', 'longitude', 'creator_id',
	];
	/**
	* The accessors to append to the model's array form.
	*
	* @var array
	*/
	public $appends = [
		'coordinate', 'map_popup_content',
	];
	/**
	* Get Flag name_link attribute.
	*
	* @return string
	*/
	public function getNameLinkAttribute()
	{
		$title = __('En savoir plus', [
			'name' => $this->name, 'type' => __('flag.flag'),
		]);
		$link = '<a href="'.route('flags.show', $this).'"';
		$link .= ' title="'.$title.'">';
		$link .= $this->name;
		$link .= '</a>';
		return $link;
	}
	/**
	* Flag belongs to User model relation.
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function creator()
	{
		return $this->belongsTo(User::class);
	}
	/**
	* Get Flag coordinate attribute.
	*
	* @return string|null
	*/
	public function getCoordinateAttribute()
	{
		if ($this->latitude && $this->longitude) {
			return $this->latitude.', '.$this->longitude;
		}
	}
	/**
	* Get Flag map_popup_content attribute.
	*
	* @return string
	*/
	public function getMapPopupContentAttribute()
	{
		$mapPopupContent = '';
		$mapPopupContent .= "<p><strong>".$this->name_link."</strong></p>";
		if ($this->name == "Travaux") {
			$mapPopupContent .= "<p>Risque de travaux sur la voie publique, soyez prudent.</p>";
		}
		if ($this->name == "Voie endommagée") {
			$mapPopupContent .= "<p>Route dégradée, nid-de-poule, dégats.<br>Roulez avec prudence.</p>";
		}
		if ($this->name == "Autre perturbation") {
			$mapPopupContent .= "<p>Attention, on nous signale une perturbation sur votre parcours.<br>Soyez prudent.</p>";
		}

		return $mapPopupContent;
	}
}
