<?php

namespace app\controllers;

use app\models\dto\GdeSlonXMLDTO;
use app\services\ParseXML\ParseXMLService;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index', ['text' => '']);
    }

    public function actionParse(): string
    {
        $xml = simplexml_load_file('https://drive.google.com/u/0/uc?id=14dMuiQb05DLSgyCb5gLgGbmsi_1GSWvs&export=download&confirm=t');
        $xmlDTO = new GdeSlonXMLDTO($xml);
        $parseService = new ParseXMLService($xmlDTO);
        $parseService->perform();

        return $this->render('index', ['text' => 'Parsing begin']);
    }
}
