<?php

namespace Converter\Codecs;

function codecsInit()
{
    return [
        \Converter\Codecs\Json\getSupportedFormat() => [
            'encode' => '\Converter\Codecs\Json\encode',
            'decode' => '\Converter\Codecs\Json\decode'
        ],
        \Converter\Codecs\Yaml\getSupportedFormat() => [
            'encode' => '\Converter\Codecs\Yaml\encode',
            'decode' => '\Converter\Codecs\Yaml\decode'
        ],
        \Converter\Codecs\Ini\getSupportedFormat() => [
            'encode' => '\Converter\Codecs\Yaml\encode',
            'decode' => '\Converter\Codecs\Ini\decode'
        ]
    ];
}
