<?php

function getPrice($priceInDecimals)
{
    $price = floatval($priceInDecimals);

    return number_format($price, 2, ',', ' ') . ' DH';
}
