<?php

namespace App\Factory;

use App\Entity\Rights;
use App\Repository\RightsRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Rights>
 *
 * @method static Rights|Proxy createOne(array $attributes = [])
 * @method static Rights[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Rights[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Rights|Proxy find(object|array|mixed $criteria)
 * @method static Rights|Proxy findOrCreate(array $attributes)
 * @method static Rights|Proxy first(string $sortedField = 'id')
 * @method static Rights|Proxy last(string $sortedField = 'id')
 * @method static Rights|Proxy random(array $attributes = [])
 * @method static Rights|Proxy randomOrCreate(array $attributes = [])
 * @method static Rights[]|Proxy[] all()
 * @method static Rights[]|Proxy[] findBy(array $attributes)
 * @method static Rights[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Rights[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static RightsRepository|RepositoryProxy repository()
 * @method Rights|Proxy create(array|callable $attributes = [])
 */
final class RightsFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'type' => self::faker()->numberBetween(1, 2),
            'beschreibung' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Rights $rights): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Rights::class;
    }
}
