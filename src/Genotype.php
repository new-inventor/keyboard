<?php
namespace KeyboardAnalytics;
/**
 * Created by Ionov George (new-inventor).
 * Date: 11.08.2018
 */
class Genotype
{
    /**
     * @var string[]
     */
    private $gens;
    /** @var float */
    private $mutationPossibility;

    /**
     * Genotype constructor.
     * @param string[] $gens
     * @param float $mutationPossibility
     */
    public function __construct(array $gens, float $mutationPossibility)
    {
        $this->gens = $gens;
        $this->mutationPossibility = $mutationPossibility;
    }

    /**
     * @return float
     */
    public function getMutationPossibility(): float
    {
        return $this->mutationPossibility;
    }

    /**
     * @return \string[]
     */
    public function getGens(): array
    {
        return $this->gens;
    }

    /**
     * @return int[]
     */
    public function getCrossDots(): array
    {
        $genotypeMaxIndex = mb_strlen($this->gens) - 1;
        $dots = [
            random_int(0, $genotypeMaxIndex),
            random_int(0, $genotypeMaxIndex),
        ];
        sort($dots);
        return $dots;
    }

    /**
     * @param array $dots
     * @return string[]
     */
    public function getCrossRegion(array $dots)
    {
        return array_slice($this->gens, $dots[0], $dots[1] - $dots[0]);
    }

    /**
     * @param Genotype $first
     * @param Genotype $second
     * @return Genotype
     */
    public static function cross(Genotype $first, Genotype $second)
    {
        $dots = $first->getCrossDots();
        $resGens = [];
        $copiedRegion = $first->getCrossRegion($dots);
        foreach ($copiedRegion as $key => $value) {
            $resGens[$dots[0] + $key] = $value;
        }
        $i = 0;
        foreach ($second->getGens() as $index => $gen) {
            if (!in_array($gen, $resGens, true)) {
                if ($i === $dots[0]) {
                    $i = $dots[1] + 1;
                }
                $resGens[$i++] = $gen;
            }
        }
        return new Genotype($resGens, $first->getMutationPossibility());
    }

    public function mutate()
    {
        if (random_int(0, 1 / $this->mutationPossibility) === 1) {
            $dots = $this->getCrossDots();
            $this->gens[$dots[0]] ^= $this->gens[$dots[1]] ^= $this->gens[$dots[0]] ^= $this->gens[$dots[1]];
        }
    }
}