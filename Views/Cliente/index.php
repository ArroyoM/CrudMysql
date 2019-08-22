<h1>Panel de control de Clientes</h1>

<div>
    <a href="?c=Cliente&a=ViewCreate">Crear nueva persona</a>
</div>


<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->AllClientes() as $cliente): ?>
            <tr>
                <td><?php echo $cliente->getIdPersona(); ?></td>
                <td><?php echo $cliente->getNombre(); ?> </td>
                <td><?php echo $cliente->getApellido(); ?> </td>
                <td><?php echo $cliente->getNacimiento(); ?> </td>
                <td>
                    <a href="?c=Cliente&a=ViewCreate&id=<?php echo $cliente->getIdPersona() ?>">Editar</a>
                    <a href="?c=Cliente&a=Delete&id=<?php echo $cliente->getIdPersona() ?>">Eliminar</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>