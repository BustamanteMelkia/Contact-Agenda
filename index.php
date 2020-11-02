<?php include 'includes/layout/header.php'; ?> <!--Importar la cabecera de la página-->
<header class="header">
    <h1>Contact Agenda</h1>
</header>
<section class="register">
    <form id="form" class="form" action="#">
        <legend>Add contact <span>All fields are required</span></legend>
        <div class="fields-container">
            <div class="field">
                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Contact name">
            </div>
            <div class="field">
                <label for="organization">Organization:</label>
                <input type="text" id="organization" placeholder="Organization name" >
            </div>
            <div class="field">
                <label for="telephone">Telephone number:</label>
                <input type="tel" id="telephone" placeholder="Telephone number">
            </div>
        </div>
        <button id="btn-add" class="btn">Add</button>
    </form>
</section>
<section class="contacto"></section>

<?php include 'includes/layout/footer.php' ?> <!--Importar el footer-->