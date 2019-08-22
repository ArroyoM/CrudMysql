<h1>NewOrEdit</h1>


<form action="?c=cliente&a=NewOrEdit" method="POST">

    <input type="hidden" name="idpersona" value="<?php echo $cliente->getIdPersona() ?>">

    <div>
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $cliente->getNombre() ?>" placeholder="Ingre su nombre">
    </div>
    <div>
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $cliente->getApellido() ?>" placeholder="Ingre su apellido">
    </div>    
    <div>
        <label for="">Nombre</label>
        <input type="date" name="nacimiento" value="<?php echo $cliente->getNacimiento() ?>" >
    </div>

    <input type="submit" name="envar">
</form>