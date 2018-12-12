<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Realizar procedimiento de busqueda de negocio');
$I->amOnPage('/');
$I->fillField('Usuario','hmunozv@socovesa.cl');
$I->fillField('Clave','Soco2810');
$I->click("Entrar");
$I->wait(10);


$timeout = 20;
$I->waitForElement("frame[name='adm']",$timeout);
$I->switchToIFrame("adm");
$I->selectOption("#rol", "Jefe de Proyecto");

$I->switchToIFrame();
$I->waitForElement("frame[name='mnu']",$timeout);
$I->switchToIFrame("mnu");
$I->click("BUSCADORES");
$I->click("Buscar Negocios");

$I->switchToIFrame();
$I->waitForElement("frame[name='bod']",$timeout);
$I->switchToIFrame("bod");
$I->waitForElementVisible("#NtBotFilAuto", $timeout);
$I->click("#NtBotFilAuto");
$I->selectOption("#NtFiltros_Box", "Estado Carta Oferta");
$I->selectOption("#filman56793","Pre-reserva");
$I->click(["class" =>"list_filtrobotontxt"]);

//Obtener ID del primer negocio encontrado con los filtros aplicados
$id = $I->grabTextFrom('//*[@id="tabla"]/tbody/tr[2]/td[2]');

//ingresar al negocio encontrado
$I->click("$id");

//ir al modulo de creacion de recaudacion.
$I->waitForElementVisible("#btt427", $timeout);
$I->click('#btt427');
$I->waitForElementVisible("#btt407", $timeout);
$I->click('#btt407');
$I->switchToWindow("exetool");
$I->waitForElement("#frm",$timeout);





//crear recaudacion
$I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[1]/input');
$I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[7]/select/option[2]');
$I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[8]/img');
$I->checkOption("td.day.today");
$I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[10]/select/option[5]');

// //Ingreso de N°documento o codigo de autorizacion
$I->fillField("//*[@id='itmlst']/div/table/tbody/tr[2]/td[11]/input","testt");
// //Ingreso de Titular Cta. Cte. 
$I->fillField("//*[@id='itmlst']/div/table/tbody/tr[2]/td[12]/input","testt");
// //Numero Serie
$I->fillField("//*[@id='itmlst']/div/table/tbody/tr[2]/td[13]/input","testt");



$I->attachFile('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[20]/input', 'ttt.pptx');


$I->click('//*[@id="_tools"]/td/div[1]');
$I->switchToWindow("Confirmar Recaudación");
$I->click("/html/body/div/div/div[2]/button");
$I->wait(10);
$I->switchToWindow("");
$I->waitForElement("frame[name='bod']",$timeout);
$I->switchToIFrame("bod");

//Ver recaudaciones
$I->click(["id"=>"pes_2_1_b"]);
$I->wait(6);






// $I->waitForElement('//*[@id="contenedor"]',$timeout);

// $I->wait(3);

// $I->switchToWindow("");
// $I->waitForElement("#row",$timeout);

// $I->wait(5);

// $I->selectOption("select","Cheque",$timeout);
// $I->click('/html/body/div/table/thead/tr[1]/td[3]');
// $I->wait(2);
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[20]/input');
// $guardar = $I->grabTextFrom('//*[@id="_tools"]/td/div[1]/table/tbody');

// use \Codeception\Util\Locator;

// $ndocu = $I->grabValueFrom('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[11]/input');
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[11]');

// $I->fillField(Locator::combine('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[11]/input'), 'qwerty');
// $I->fillField("$ndocu","testt");


// $modp = $I->grabTextFrom('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[7]');
// $I->click('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[1]/input');
// $I->selectOption("$modp",'Cheque',$timeout);
// $I->selectOption("#mod7168",'Cheque',$timeout);
// $I->waitForElementVisible("#img7168", $timeout);
// $I->click("#img7168");
// $I->checkOption("td.day.today");
// $I->selectOption("#ban7168",'Banco BBVA',$timeout);
// $I->fillField('num7168','test');
// $I->fillField('tcc7168','testt');
// $I->fillField('ser7168','testtt');

// $I->attachFile('input[@type="file"]', 'ttt.pptx');

// $I->click("div","x");
// $I->click("#fil7168");
// $I->wait(10);
// $I->fillField('rea7168','06-12-2018');
// $I->checkOption('14');
// $I->moveMouseOver('#day-11');
// $I->selectOption("#calendar",'9',$timeout);
// $I->wait(5);
// $I->click('#btt407');
// $I->selectOption("#mod7168",'Cheque',$timeout);
// $I->fillField('filman56777d','1000974');

//obtener valor de un input espeficico
// $value = $I->grabValueFrom("input[name=mps7168]");

// $I->switchToWindow("exetool");

//Verificacion de estados de valores
// $I->waitForElementVisible("#itmlst", $timeout);
// $I->waitForElementVisible(["id" => "itme_3372"], $timeout);
// $I->waitForElementVisible("#itme_3373", $timeout);
// $I->waitForElementVisible("#itme_3374", $timeout);

// $I->see("#itmlst");


// $I->waitForElement("btti");
// $I->click(["class" => "bar2_des"]);
// $I->fillField("#txtRut1", "1-9");


// $I->click("Class" , "dTreeNode");
// $I->clickJQuerySelectedElement("d.o(3);");
// $i->click("javascrpit: d.o(3);");

//Busqueda de un negocio especifico
// $I->fillField('filman56777d','1000974');
// $I->fillField('filman56777h','1000974');
// $I->click(["class" =>"list_filtrobotontxt"]);
// $I->see('1000974');
// $I->click('1000974');

// Creacion de reacudacion en base al negocio encontrado
// $I->waitForElementVisible("#btt427", $timeout);
// $I->click('#btt427');
// $I->waitForElementVisible("#btt407", $timeout);
// $I->click('#btt407');
// $I->switchToWindow("exetool");
// $I->waitForElement("#frm",$timeout);

// $idreca = $I->grabTextFrom('//*[@id="itmlst"]/div/table/tbody/tr[2]/td[1]/input');