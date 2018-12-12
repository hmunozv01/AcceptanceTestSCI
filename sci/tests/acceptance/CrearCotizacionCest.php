<?php

use Codeception\Util\Locator;

class CrearCotizacionCest
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
        $timeout = 20;

        $I->amOnPage("/sys/int/log.aspx");

        $I->fillField("#usr", "tisocovesa@socovesa.cl");
        $I->fillField("#psw", "tisocovesa");
        $I->click("Entrar");

        $I->waitForElement("frame[name='adm']", $timeout);
        $I->switchToIFrame("adm");
        $I->selectOption("#rol", "Jefe de Proyecto");

        $I->switchToIFrame();
        $I->waitForElement("frame[name='mnu']", $timeout);
        $I->switchToIFrame("mnu");
        $I->click("Crear Cotización");

        $I->switchToIFrame();
        $I->waitForElement("frame[name='bod']", $timeout);
        $I->switchToIFrame("bod");
        $I->fillField("#txtRut1", "1-9");
        
        $I->selectOption("cmbComoLlego1", "Ferias");
        $I->selectOption("cmbSoporteMedio1", "Expo Vivienda");
        $I->selectOption("cmbObjetoCompra1", "Habitacional");
        $I->click("#btnSig1");

        $I->waitForElement("#cmbProyecto", $timeout);
        $I->selectOption("#cmbProyecto", "ARTIGAS");
        $I->selectOption("#cmbEtapa", "ARTIGAS");
        $I->click("#btnSig2");

        $I->waitForElement("#MainProdList", 30);
        $I->click("#MainProdList > li > div");
        #MainProdList > li > table > tbody > tr:nth-child(2) > td:nth-child(1) > input[type="radio"]
        $I->click('#MainProdList > li > table > tbody > tr:nth-child(2) > td:nth-child(1) > input[type="radio"]');
        $I->click("#btnSig3_1");

        $I->waitForElementVisible("#btnSig3_2", $timeout);
        $I->click("#btnSig3_2");

        $I->waitForElementVisible("#btnSig3_3", $timeout);
        $I->click("#btnSig3_3");

        $I->waitForElementVisible("#btnSig4", $timeout);
        $I->click("#btnSig4");
        
        $I->waitForElementVisible("#txtPorcentajePie", $timeout);
        $I->fillField("#txtPorcentajePie", "20");

        $I->click("#btnSig5");

        $I->waitForElement("#btnTerminar");
        // $I->switchToIFrame();

        $I->waitForElement("#ifrVistaPrevia", $timeout);
        $I->executeJS("var _att = document.createAttribute('name'); _att.value = 'ifrVistaPrevia'; document.getElementById('ifrVistaPrevia').setAttributeNode(_att);");
        $I->switchToIFrame("ifrVistaPrevia");
        
        $I->waitForElementVisible("/html/body/div[1]/p[2]/b");
        $id = $I->grabTextFrom("/html/body/div[1]/p[2]/b");

        $id = explode("SANTIAGO", $id)[0];
        $id = preg_replace("/\s+/", "", $id);
        $id = str_replace("N°:", "", $id);

        $I->switchToIFrame();
        $I->switchToIFrame("bod");
        $I->click("#btnTerminar");
        
        $I->waitForElementVisible("#cmbTipoGestion", $timeout);
        $I->fillField("#txtFecha", date("d/m/Y"));
        $I->click('//*[@id="pag6"]/fieldset/table/tbody/tr[7]/td[1]/input');
        // $I->selectOption("Percepcion", "Muy Interesado");
        $I->fillField("#txtComentario", "Comentario de prueba");
        $I->selectOption("#cmbTipoGestion", "Llamar");
        $I->selectOption("#cmbHora", "16:00");
        $I->click("#btnGuardarGestion");
        $I->wait(3);
        $I->seeInPopup("Su cotización ha sido creada con éxito con el N°{$id}");
        $I->acceptPopup();

        $I->switchToIFrame();
        $I->switchToIFrame("mnu");
        $I->click("#jd3");
        $I->waitForElement("#sd5", $timeout);
        $I->click("#sd5");

        $I->switchToIFrame();
        $I->waitForElement("frame[name='bod']", $timeout);
        $I->switchToIFrame("bod");
        $I->waitForElementVisible("#tabla", $timeout);
        $I->see($id);
    }
}
