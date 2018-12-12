<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Ingreso Sitio Boleta');
$I->amOnPage('/');
// $I->click(['link'=> 'Usuarios']);
$I->click("Usuarios");
// $I->click(['class'=> 'btn-primary']);
$I->click("Nuevo Usuario");
$I->fillField('Nombre','testCodeception3');
$I->fillField('Cuenta','TestCodeception3');
$I->selectOption('Rol','Comun');
$I->checkOption('Inmobiliarias[0].Checked');
// $I->click(['submit']);
$I->click("Guardar");




// $I->click('select','Administrador');


// $I->fillField('#password','akuma12347865');
// $I->click('input#signIn');
// $I->canSee('inbox');

?>
