<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\marca;
use App\Models\producto;

class Showproductos extends Component
{
    public $nombre;
    public $talla;
    public $observaciones;
    public $cantidad;
    public $fecha;
    public $marca;
    public $searchRef; 

    //REGLAS  CAMPOS
    protected $rules = [
        'nombre' => 'required',
        'talla' => 'required',
        'observaciones' => 'required',
        'cantidad' => 'required',
        'fecha' => 'required',
        'marca' => 'required',
    ];

    public function render()

    {   $this->marcas = marca :: get();

        return view('livewire.showproductos',[
            'productos' => producto :: where('nombre','LIKE', "%$this->searchRef%")->get()
        ]);
    }

    //CREACIÓN PRODUCTO
    public function crearProducto(){   

        //VALIDAR CAMPOS
        $this->validate();

        //GUARDAR DB
        $guardarProducto = new producto;
        $guardarProducto->nombre = $this->nombre;
        $guardarProducto->talla = $this->talla;
        $guardarProducto->observaciones = $this->observaciones;
        $guardarProducto->cantidad = $this->cantidad;
        $guardarProducto->fecha = $this->fecha;
        $guardarProducto->marca_id = $this->marca;
        $guardarProducto->save();

        if ($guardarProducto) {
            session()->flash('guardarProducto', 'Producto creado correctamente');
        }
                    
        //RESTABLECIENDO VALORES
        $this->nombre=null;
        $this->talla=null;
        $this->observaciones=null;
        $this->cantidad=null;
        $this->fecha=null;
        $this->marca=null;

    }


    //ELIMINAR PRODUCTO
    public function eliminarProducto($producto_id){
    
        //ELIMINAR MARCA DB
        $eliminarproducto = producto :: where('id',$producto_id)->delete();

        //MENSAJE DE EXITO
        if ($eliminarproducto) {
            session()->flash('eliminarProducto', 'Producto eliminado correctamente');
            $this->nombre=null;
            $this->talla=null;
            $this->observaciones=null;
            $this->cantidad=null;
            $this->fecha=null;
            $this->marca=null;
        }

    }

    //ASIGNAR VALORES TEMPORALES
    public function editarProducto($producto_id){
        $producto = producto :: with('marcas')->where('id',$producto_id)->first();

        $this->nombre=$producto->nombre;
        $this->talla=$producto->talla;
        $this->observaciones=$producto->observaciones;
        $this->cantidad=$producto->cantidad;
        $this->fecha=$producto->fecha;
        $this->marca=$producto->marcas->id;
    }

    //ACTUALIZAR PRODUCTO
    public function actualizarProducto($producto_id){

        //VALIDAR CAMPOS
        $this->validate();

        //ACTUALIZAR DB
        $actualizarProducto = producto :: where('id',$producto_id)->update([
            'nombre' => $this->nombre,
            'talla' => $this->talla,
            'observaciones' => $this->observaciones,
            'cantidad' => $this->cantidad,
            'fecha' => $this->fecha,
            'marca_id' => $this->marca,
        
        ]);

        //MENSAJE DE EXITO
        if ($actualizarProducto) {
            session()->flash('actualizarProducto', 'Producto actualizado correctamente');

            $this->nombre=null;
            $this->talla=null;
            $this->observaciones=null;
            $this->cantidad=null;
            $this->fecha=null;
            $this->marca=null;
        }
    }

    
}
