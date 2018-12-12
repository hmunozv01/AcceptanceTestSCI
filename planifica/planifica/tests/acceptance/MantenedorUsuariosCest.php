<?php


class MantenedorUsuariosCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $nombre = "Codeception Temp User";
        $nombre_update = "Codeception Temp User 2";
        $cuenta = "codeceptiontemp";

        $I->amOnPage("/Usuarios/Editar");
        $I->fillField("Nombre", $nombre);
        $I->fillField("Cuenta", $cuenta);
        $I->selectOption("Rol", "Bodeguero");
        $I->checkOption("#Activo");
        $I->click("Guardar");
        $I->see("Usuario guardado correctamente.");
        $I->see($cuenta);

        $I->seeInDatabase('Usuario', ['Usuario' => $cuenta, "Nombre" => $nombre]);

        $I->amOnPage("/Usuarios");
        $I->see($cuenta);
        $I->click("//text()[. = '{$cuenta}']/../../td[5]/div/a[@title='Editar usuario']");
        $I->fillField("Nombre", $nombre_update);
        $I->click("Guardar");
        $I->see("Usuario guardado correctamente.");
        $I->see($cuenta);
        $I->see($nombre_update);

        $I->seeInDatabase('Usuario', ['Usuario' => $cuenta, "Nombre" => $nombre_update]);

        $I->amOnPage("/Usuarios");
        $I->see($cuenta);
        $I->click("//text()[. = '{$cuenta}']/../../td[5]/div/a[@title='Eliminar usuario']");
        $I->acceptPopup();
        $I->see("Usuario eliminado correctamente.");
        $I->dontSee($cuenta);

        $I->seeInDatabase('Usuario', ['Usuario' => $cuenta, "Eliminado" => 1]);
    }
}
