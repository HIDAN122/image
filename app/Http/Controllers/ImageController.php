<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @param string $number
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function convertImage(string $number)
    {
        $licensePlate = new \Intrepidity\LicensePlate\DutchLicensePlate($number);

        if ($licensePlate->isValid()) {

            $validNumber = $licensePlate->format();

            $client = new \GuzzleHttp\Client([
                'headers' => [
                    'Content-Type' => 'image/png',
                    'user-id' => '98765',
                    'api-key' => 'ntBG509E782oWfYLPWOqTbOZ7tyXIehSkfRgwRHvopI5wvHr',
                ]
            ]);
            $response = $client->post(
                'https://neutrinoapi.net/html-render', [
                    'json' => [
                        "content" => `<div class="form-control">
    <div class="car-license">
        <abbr title="Netherlands" class="car-license__country-code">
            <svg class="svg" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20"
                 aria-labelledby="euSymbol" role="img">
                <title id="euSymbol">EU symbol</title>
                <g id="s" transform="translate(150,30)" fill="#fc0">
                    <g id="c">
                        <path id="t" d="M 0,-20 V 0 H 10" transform="rotate(18 0,-20)"/>
                        <use xlink:href="#t" transform="scale(-1,1)"/>
                    </g>
                    <use xlink:href="#c" transform="rotate(72)"/>
                    <use xlink:href="#c" transform="rotate(144)"/>
                    <use xlink:href="#c" transform="rotate(216)"/>
                    <use xlink:href="#c" transform="rotate(288)"/>
                </g>
                <use xlink:href="#s" transform="rotate(30 150,150) rotate(330 150,30)"/>
                <use xlink:href="#s" transform="rotate(60 150,150) rotate(300 150,30)"/>
                <use xlink:href="#s" transform="rotate(90 150,150) rotate(270 150,30)"/>
                <use xlink:href="#s" transform="rotate(120 150,150) rotate(240 150,30)"/>
                <use xlink:href="#s" transform="rotate(150 150,150) rotate(210 150,30)"/>
                <use xlink:href="#s" transform="rotate(180 150,150) rotate(180 150,30)"/>
                <use xlink:href="#s" transform="rotate(210 150,150) rotate(150 150,30)"/>
                <use xlink:href="#s" transform="rotate(240 150,150) rotate(120 150,30)"/>
                <use xlink:href="#s" transform="rotate(270 150,150) rotate(90 150,30)"/>
                <use xlink:href="#s" transform="rotate(300 150,150) rotate(60 150,30)"/>
                <use xlink:href="#s" transform="rotate(330 150,150) rotate(30 150,30)"/>
            </svg>
            <span>NL</span>


        </abbr>
        <div class="car-license__form-control">
            <input type="text"
                   class="car-license__input"
                   maxlength="8"
                   value="$validNumber"
                   autocomplete="off"
            >
        </div>
    </div>
</div>`,
                        "format" => 'PNG',
                        "css" => `@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
                                  @font-face {
                                      font-family: kenteken;
                                      src: url('https://frontend-developer.eu/fonts/kenteken.ttf');
                                    /*   this can give a CORS error because of the domain  */
                                    /* LeFly Fonts
                                       https://www.dafont.com/kenteken.font    */
                                    }

                                    html {
                                      box-sizing: border-box;

                                    }

                                    *, *:before, *:after {
                                      box-sizing: inherit;
                                    }

                                    body {
                                      font-family: 'Roboto Condensed';
                                    }

                                    input:focus {
                                      outline: none;
                                    }

                                    input:required {
                                      border: 3px solid grey;
                                    }

                                    label{
                                      display: block;
                                    }

                                    .car-license {
                                      position: relative;
                                      max-width: 210px;
                                      background-color: #faca30;
                                      border-radius: 3px;
                                      border: 1px solid #faca30;
                                      z-index: 1;
                                      white-space: nowrap;
                                    }

                                    .car-license__country-code {
                                      position: absolute;
                                      display: flex;
                                      flex-direction: column;
                                      align-items: center;
                                      justify-content: center;
                                      top: -1px;
                                      left: -1px;
                                      z-index: 2;
                                      border-top-left-radius: 3px;
                                      border-bottom-left-radius: 3px;
                                      height: 52px;
                                      width: 30px;
                                      background-color: #011c95;
                                      color: white;
                                      text-transform: uppercase;
                                    }

                                    .car-license__form-control,
                                    .car-license__output{
                                      display: flex;
                                      justify-content: center;
                                      align-items: center;
                                      text-align: center;
                                      background-color: #faca30;
                                      padding: 5px 10px 5px 30px;
                                      width: 100%;
                                      height: 50px;
                                      font-family: kenteken, 'Roboto Condensed';
                                      font-size: 1.9rem;

                                    }
                                    .car-license__form-control{
                                      padding: 0 0 0 22px;

                                    }
                                    .car-license__input{
                                      width: 100%;
                                      padding: 0;
                                      border: none;
                                      background-color: #faca30;
                                      text-align: center;
                                      text-transform: uppercase;
                                      font-family: inherit;
                                      font-size: inherit;
                                      margin:0;

                                    }

                                    .html5-input {
                                      display: inline-block;
                                      font-size: 1.9rem;
                                      max-width: 210px;
                                      padding: 5px;
                                      text-transform: uppercase;
                                    }

                                    .html5-input:valid {
                                      border: 3px solid green;
                                    }

                                    .html5-input:focus:invalid {
                                      border: red solid 3px;
                                    }

                                    .valid-message{
                                      position: relative;
                                      display: none;

                                    }
                                    .valid-message::before{
                                      content: '';
                                    }

                                    .html5-input:valid + .valid-message,
                                    .valid + .valid-message{
                                      display: inline-block;
                                    }

                                    .html5-input:valid + .valid-message::before,
                                    .valid + .valid-message::before{
                                      /*  some css  */
                                      position: absolute;
                                      top: -25px;
                                      content:'\2713';
                                      color: green;
                                      margin-left: 0.5rem;
                                      font-size: 2rem;

                                    }

                                    .html5-input:valid + .valid-message::before {
                                      position: static;
                                      top: auto;
                                      margin-left: auto;
                                    }`,
                        'output-format' => 'JSON'
                    ],
                ]
            );

            $body = $response->getBody()->getContents();

            $base64 = base64_encode($body);
            $mime = "image/png";

            $img = ('data:' . $mime . ';base64,' . $base64);

            return response()->json([
               'img' => $img
            ]);
        }
    }
}


