<?php

require_once __DIR__ . "/vendor/autoload.php";


use \Softwarewisdom\Diem\DiemTestNet;

/** use hash sha256 to generate a new key */
$key = '68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483';
$testnet = new DiemTestNet('http://faucet.testnet.diem.com/', $key);
$coin = $testnet->account()->create()->mint(300);
var_dump($coin);