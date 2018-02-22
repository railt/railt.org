<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\GraphQL\ImportExtension;

use Railt\Foundation\ServiceProviders\BaseServiceProvider;
use Railt\Io\File;
use Railt\Reflection\Contracts\Definitions\TypeDefinition;
use Railt\SDL\Reflection\Builder\Process\Compilable;
use Railt\SDL\Schema\CompilerInterface;

/**
 * Class ImportServiceProvider
 */
class ImportServiceProvider extends BaseServiceProvider
{
    /**
     * @param CompilerInterface $compiler
     */
    public function boot(CompilerInterface $compiler): void
    {
        $compiler->compile(File::fromPathname(__DIR__ . '/import.graphqls'));

        $compiler->autoload(function (string $type, TypeDefinition $from) {
            $document = $from->getDocument();
            $root     = \dirname($document->getFileName());

            foreach ($document->getDirectives('import') as $import) {
                if ($import instanceof Compilable) {
                    $import->compile();
                }

                $module = $import->getPassedArgument('from');
                $types  = (array)$import->getPassedArgument('types');

                if (! \count($types) && ($result = $this->search($type, $root . '/' . $module))) {
                    return $result;
                }

                if (\in_array($type, $types, true) && ($result = $this->search($module, $root))) {
                    return $result;
                }
            }

            if ($result = $this->search($type, $root)) {
                return $result;
            }

            return null;
        });

    }

    /**
     * @param string $type
     * @param string $from
     * @return null|string
     */
    private function search(string $type, string $from): ?string
    {
        foreach (['.graphqls', '.graphql', '.gql'] as $ext) {
            $path = $from . '/' . $type . $ext;

            if (\is_file($path)) {
                return $path;
            }
        }

        return null;
    }
}
