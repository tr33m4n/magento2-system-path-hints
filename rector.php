<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\MemoryCacheStorage;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;
use Rector\Php80\Rector\FunctionLike\MixedTypeRector;
use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(SetList::DEAD_CODE);
    $rectorConfig->import(SetList::NAMING);
    $rectorConfig->import(SetList::EARLY_RETURN);
    $rectorConfig->import(SetList::CODE_QUALITY);
    $rectorConfig->import(SetList::PRIVATIZATION);
    $rectorConfig->import(SetList::TYPE_DECLARATION);
    $rectorConfig->import(LevelSetList::UP_TO_PHP_81);

    $rectorConfig->cacheClass(MemoryCacheStorage::class);

    $rectorConfig->paths([__DIR__ . '/src']);
    $rectorConfig->skip([
        __DIR__ . '/src/Test',
        FinalizeClassesWithoutChildrenRector::class
    ]);
};
