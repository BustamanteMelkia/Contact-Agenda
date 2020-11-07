<?php include 'includes/layout/header.php' ?> <!--Importar la cabecera de la página-->
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
            <tbody>
                <tr class="table-row">
                    <td class="cell" data-label="Name">Melkia</td>
                    <td class="cell" data-label="Organization">Buap</td>
                    <td class="cell" data-label="Telephone">2215953097</td>
                    <td class="cell options" data-label="Options">
                        <a href="edit.php?id=123"><i class="fas fa-user-edit"></i></a>
                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr class="table-row">
                    <td class="cell" data-label="Name">David</td>
                    <td class="cell" data-label="Organization">Buap</td>
                    <td class="cell" data-label="Telephone">2215953097</td>
                    <td class="cell options" data-label="Options">
                        <a href="edit.php?id=234"><i class="fas fa-user-edit"></i></a>
                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr class="table-row">
                    <td class="cell" data-label="Name">Enrique</td>
                    <td class="cell" data-label="Organization">Buap</td>
                    <td class="cell" data-label="Telephone">123456789</td>
                    <td class="cell options" data-label="Options">
                        <a href="edit.php?id=234"><i class="fas fa-user-edit"></i></a>
                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>


<?php include 'includes/layout/footer.php' ?> <!--Importar el footer-->