<?php
namespace App\Models;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';
 
    public $timestamps = false;

    protected $primaryKey = 'id_agendamento';

    protected $guarded = ["id_agendamento"];

    protected $fillable = [
        "data",
        "hora",
        "id_barbeiro",//foreign key
        "id_cliente",//foreign key
        "id_servico",//foreign key
        "status",
         "id_agenda"
    ];

    public function cliente()
    {
        return $this->belongTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function usuario()
    {
        return $this->hasMany(User::class, 'id_grupo', 'id_grupo');
    }

    public function gruposMenus() : BelongsToMany
    {
        return $this->belongsToMany(GrupoMenu::class);
    }
}
