<?php 

include 'includes/layout/header.php' ;
include 'includes/funciones/consultas.php';

?>
<header class="header">
    <h1>Contact Agenda <i class="far fa-address-book"></i></h1>
</header>
<section class="register">
    <div class="wrapper">
        <form id="form" class="form" action="#">
            <h2>Add contact <span>*All fields are required</span></h2>
            
            <?php include "includes/layout/form.php" ?>
        </form>
    </div>
</section>
<div class="wrapper">
    <section class="contactos">
        <h2>Contacts</h2>
        <div class="form-field">
            <input type="text" id="search"  class="shadow" placeholder="Search contact" >
        </div>
        <h3><span>2</span> contacts</h3>
        <table id="list-contacts" class="table">
            <thead>
                <tr class="table-row head">
                    <th class="cell">Name</th>
                    <th class="cell">Organizaction</th>
                    <th class="cell">Telephone</th>
                    <th class="cell">Options</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                    $contactos = obtenerContactos();
                    if($contactos->num_rows){
                        foreach ($contactos as $contacto) { ?>
                            <tr class="table-row">
                                <td class="cell" data-label="Name"><?php echo $contacto['nombre'] ?></td>
                                <td class="cell" data-label="Organization"><?php echo $contacto['empresa'] ?></td>
                                <td class="cell" data-label="Telephone"><?php echo $contacto['telefono'] ?></td>
                                <td class="cell options" data-label="Options">
                                    <a href="edit.php?id=<?php echo $contacto['id'] ?>"><i class="fas fa-user-edit"></i></a>
                                    <button data-id="<?php echo $contacto['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        
                <?php   }
                    }
                ?>
            </tbody>
        </table>
    </section>
</div>


<?php include 'includes/layout/footer.php' ?> <!--Importar el footer-->