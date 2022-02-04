<?php

namespace App\Http\Livewire;

use App\Models\marca;
use Livewire\Component;
use Illuminate\Support\Str;

class Showmarcas extends Component
{
    public $marca;
    public $referencia;
    public $searchRef; 

    //REGLAS  CAMPOS
    protected $rules = [
        'marca' => 'required',
        'referencia' => 'required',
    ];

    public function render()
    {
        //CONSULTA MARCAS GUARDADAS
        return view('livewire.showmarcas',[
            'marcas' => marca ::where('nombre','LIKE', "%$this->searchRef%")->get()
        ]);
    }

    //CREACIÓN MARCA
    public function crearMarca(){   

        //VALIDAR CAMPOS
        $this->validate();

        //GUARDAR DB
        $guardarMarca = new marca;
        $guardarMarca->nombre = $this->marca;
        $guardarMarca->referencia = $this->referencia;
        $guardarMarca->save();

        if ($guardarMarca) {
            session()->flash('guardarMarca', 'Marca guardada correctamente');
        }
                    
        //RESTABLECIENDO VALORES
        $this->marca = null;
        $this->referencia = null;

    }

    //ACTUALIZAR MARCA
    public function actualizarMarca($marca_id){

        //VALIDAR CAMPOS
        $this->validate();

        //ACTUALIZAR DB
        $actualizarMarca = marca :: where('id',$marca_id)->update(['nombre' => $this->marca, 'referencia' => $this->referencia]);

        //MENSAJE DE EXITO
        if ($actualizarMarca) {
            session()->flash('actualizarMarca', 'Marca actualizada correctamente');
            $this->marca = null;
            $this->referencia = null;
        }
    }

    //ELIMINAR MARCA
    public function eliminarMarca($marca_id){
    
        //ELIMINAR MARCA DB
        $eliminarMarca = marca :: where('id',$marca_id)->delete();

        //MENSAJE DE EXITO
        if ($eliminarMarca) {
            session()->flash('eliminarMarca', 'Marca eliminada correctamente');
            $this->marca = null;
            $this->referencia = null;
        }

    }

    //GENERAR REFERENCIA 
    public function generarReferencia(){

        $referencia = Str::random(10);
        $this->referencia = $referencia;
    }
}
