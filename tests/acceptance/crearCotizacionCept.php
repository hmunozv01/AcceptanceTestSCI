<?php 

use Codeception\Util\Locator;

$I = new AcceptanceTester($scenario);
$I->wantTo('Crear una cotizacion en sistema SCI');
$I->amOnPage("/sys/int/log.aspx");
$timeout = 20;

$I->fillField("#usr", "hmunozv@socovesa.cl");
$I->fillField("#psw", "Soco2810");
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

$I->selectOption("cmbComoLlego1", "Portal Externo");
$I->selectOption("cmbSoporteMedio1", "El Inmobiliario");
$I->selectOption("cmbObjetoCompra1", "Habitacional");
$I->click("#btnSig1");

$I->waitForElement("#cmbProyecto", $timeout);
$I->selectOption("#cmbProyecto", "EDIFICIO DIECIOCHO");
$I->selectOption("#cmbEtapa", "EDIFICIO DIECIOCHO");
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

$I->waitForElement("#btnReservar");
$I->wait(5);
// $I->click('//*[@id="pag6"]/fieldset/table/tbody/tr[19]/td/div');
// $I->clickWithLeftButton('//*[@id="pag6"]/fieldset/table/tbody/tr[19]/td/div/table/tbody/tr/td/img');
$I->click('//*[@id="btnReservar"]');
// $I->wait(3);
$I->seeInPopup("Se dispone a generar la Reserva");
$I->acceptPopup();
$I->wait(2);
$I->seeInPopup("Creando Negocio");
$I->acceptPopup();
$I->wait(2);
$I->waitForElementVisible("#plandepago", $timeout);

$I->fillField('//*[@id="blk203931"]/tbody/tr/td/table/tbody/tr/td[1]/input', "20/12/2018");
$I->fillField('//*[@id="blk211785"]/tbody/tr/td/table/tbody/tr/td[1]/input', "20/01/2019");
$I->wait(2);

$I->click(["class"=>"itmErr"]);
$I->switchToWindow("detFrmPag");
$I->fillField("#cntU", "27");
$I->click("listo");
$I->switchToWindow("");
// $I->switchToIFrame();
// $I->waitForElement("frame[name='bod']", $timeout);
$I->switchToIFrame("bod");


// $I->click('//*[@id="_tools"]/td/div[1]/table/tbody/tr/td[1]/img[alt="Guardar"]');
$I->click('#_tools > td > div:nth-child(1) > table > tbody > tr > td[nowrap="nowrap"]');
$I->wait(3);



// $I->switchToIFrame();
// $I->switchToIFrame("bod");
// $id = $I->grabTextFrom("#man56778");



// //ir al modulo de creacion de recaudacion.
// $I->waitForElementVisible("#btt427", $timeout);
// $I->click('#btt427');
// $I->waitForElementVisible("#btt407", $timeout);
// $I->click('#btt407');
// $I->switchToWindow("exetool");
// $I->waitForElement("#frm",$timeout);





// //crear recaudacion
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[1]/input');
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[7]/select/option[2]');
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[8]/img');
// $I->checkOption("td.day.today");
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[10]/select/option[5]');

// // //Ingreso de N°documento o codigo de autorizacion
// $I->fillField("//*[@id='itmlst']/div/table/tbody/tr[2]/td[11]/input","testt");
// // //Ingreso de Titular Cta. Cte. 
// $I->fillField("//*[@id='itmlst']/div/table/tbody/tr[2]/td[12]/input","testt");
// // //Numero Serie
// $I->fillField("//*[@id='itmlst']/div/table/tbody/tr[2]/td[13]/input","testt");



// $I->attachFile('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[20]/input', 'ttt.pptx');

// //confirmar recaudacion
// $I->click('//*[@id="_tools"]/td/div[1]');
// $I->switchToWindow("Confirmar Recaudación");
// $I->click("/html/body/div/div/div[2]/button");
// $I->wait(10);
// $I->switchToWindow("");

// //ir a revisar las recaudaciones creadas
// $I->waitForElement("frame[name='bod']",$timeout);
// $I->switchToIFrame("bod");
// $I->click(["id"=>"pes_2_1_b"]);
// $I->wait(10);




// $I->click('//*[@id="itmlst"]/table/tbody/tr[3]/td[7]/div[@class="itmErr"]');







