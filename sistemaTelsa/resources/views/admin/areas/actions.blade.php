<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.areas.edit',$area)}}" sm label="Editar" right-icon="pencil" green hover="green" focus:solid.green>

    </x-wire-button>
    <form action="{{route('admin.areas.destroy', $area)}}" method="POST"
    class="form-delete"
    >

        @csrf
        @method('DELETE')
         <x-wire-button type="submit" label="Eliminar" sm right-icon="trash" red hover="red" focus:solid.red>

    </x-wire-button>
    </form>
</div>
