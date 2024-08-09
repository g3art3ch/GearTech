<?php

namespace DeividFortuna\Fipe;

abstract class IFipe
{
    const URL = 'https://parallelum.com.br/fipe/api/v1/';
    const apiKEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOiI0YzQ4NDgyYy1hNDc2LTQ4MWUtYTEyZS02NDBiYWJiNzhkMTUiLCJlbWFpbCI6ImczYXJ0M2NoQGdtYWlsLmNvbSIsImlhdCI6MTcyMzIwOTUzNH0.93V6jlGEo4KFQ8Dd-PWUzN_orAU6tsos_u2eupRb6eQ';

    /**
     * @var string
     */
    protected static $tipo;

    /**
     * @var array
     */
    private static $defaultCurlOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_SSL_VERIFYPEER => 0,
    ];

    /**
     * @param string $uri
     *
     * @return mixed|false
     */
    protected static function request($uri, $queryParams = [])
{
    // Adiciona os parâmetros de consulta (query parameters) à URL, se existirem
    if (!empty($queryParams)) {
        $uri .= '?' . http_build_query($queryParams);
    }

    $ch = curl_init($uri);
    curl_setopt_array($ch, self::$defaultCurlOptions);

    // Adicionar o cabeçalho X-Subscription-Token com a apiKEY
    $headers = [
        'X-Subscription-Token: ' . self::apiKEY,
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $html = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($httpCode >= 200 && $httpCode < 300) ? json_decode($html, true) : false;
}

    public static function getMarcas()
    {
        $uri = self::URL . static::$tipo . '/marcas';

        return self::request($uri);
    }

    public static function getModelos($codMarca)
    {
        $uri = self::URL . static::$tipo . '/marcas/' . $codMarca . '/modelos';

        return static::request($uri);
    }

    public static function getAnos($codMarca, $codModelo)
    {
        $uri = self::URL . static::$tipo . '/marcas/' . $codMarca . '/modelos/' . $codModelo . '/anos';

        return static::request($uri);
    }

    public static function getVeiculo($codMarca, $codModelo, $codAno)
    {
        $uri = self::URL . static::$tipo . '/marcas/' . $codMarca . '/modelos/' . $codModelo . '/anos/' . $codAno;

        return static::request($uri);
    }

    /**
     * Update the cURL Default Options.
     *
     * @param array $config
     */
    public static function setCurlOptions(array $config = [])
    {
        self::$defaultCurlOptions = array_replace(self::$defaultCurlOptions, $config);
    }
}
