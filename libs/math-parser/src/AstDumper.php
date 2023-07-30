<?php

declare(strict_types=1);

namespace App\MathParser;

use Highlight\Highlighter;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class AstDumper
{
    /**
     * @var CliDumper
     */
    private CliDumper $dumper;

    public function __construct()
    {
        $this->dumper = $this->createCliDumper();
    }

    /**
     * @return CliDumper
     */
    private function createCliDumper(): CliDumper
    {
        $dumper = new CliDumper();
        $dumper->setColors(false);
        $dumper->setCharset('utf-8');
        $dumper->setDisplayOptions([]);
        $dumper->setStyles([]);

        return $dumper;
    }

    /**
     * @param mixed $value
     * @param string $namespace
     * @return string
     * @throws \ErrorException
     */
    public function dump($value, string $namespace = ''): string
    {
        if (\is_array($value)) {
            return $this->dump($value[0], $namespace);
        }

        $data = (new VarCloner())
            ->cloneVar($value)
            ->withRefHandles(false);

        return $this->replace($this->dumper->dump($data, true), $namespace);
    }

    /**
     * @param Highlighter $hl
     * @param $value
     * @param string $namespace
     * @return string
     * @throws \ErrorException
     */
    public function highlight(Highlighter $hl, $value, string $namespace = ''): string
    {
        $result = $this->dump($value, $namespace);

        return $hl->highlight('ast', $result)->value;
    }

    /**
     * @param string $output
     * @param string $namespace
     * @return string
     */
    private function replace(string $output, string $namespace): string
    {
        $replacements = [
            \trim($namespace, '\\') . '\\' => '',

            '"integer"' => 'integer',
            '"float"'   => 'float',
        ];

        return \str_replace(\array_keys($replacements), \array_values($replacements), $output);
    }
}
