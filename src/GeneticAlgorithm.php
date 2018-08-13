<?php
namespace KeyboardAnalytics;

use KeyboardAnalytics\Keyboard\Anatomic;
use KeyboardAnalytics\Language\Parameters\ParametersInterface;

/**
 * Created by Ionov George (new-inventor).
 * Date: 11.08.2018
 */
class GeneticAlgorithm
{
    private $mutationPossibility = 0.0001;
    private $population = [];
    /** @var int */
    private $populationSize;
    /** @var ParametersInterface */
    private $lengthParameters;
    /**
     * @var Phenotype
     */
    private $phenotype;

    public function __construct(ParametersInterface $lengthParameters, int $populationSize = 10000)
    {

        $this->populationSize = $populationSize;
        $this->lengthParameters = $lengthParameters;
        $this->phenotype = new Phenotype($this->lengthParameters, new Anatomic());
    }

    public function runStep()
    {
        $populationFitnessIndexes = $this->calculateFitnessIndexes();
        $rangedPopulation = $this->getRangedPopulation($populationFitnessIndexes);
        $pairs = $this->getCrossPairs($populationFitnessIndexes);
        $this->cross($pairs);
        $this->mutate();
        $this->kill();
        $this->calculatePopulationIndex();
    }

    private function getPopulation()
    {
        if (count($this->population) === 0) {
            $this->generatePopulation();
        }
        return $this->population;
    }

    private function generatePopulation()
    {
        $signs = $this->lengthParameters->getSigns();
        for ($i = 0; $i < $this->populationSize; $i++) {
            $newGens = array_slice($signs, 0);
            shuffle($newGens);
            $this->population[] = new Genotype($newGens, $this->mutationPossibility);
        }
    }

    /**
     * @return float[]
     */
    private function calculateFitnessIndexes()
    {
        $fitnessIndexes = [];
        foreach ($this->population as $index => $individual) {
            $fitnessIndexes[$index] = $this->phenotype->getFitnessIndex($individual);
        }
        return $fitnessIndexes;
    }

    private function getRangedPopulation()
    {
        $this->phenotypes = [];
        foreach ($this->population as $index => $genotype) {
            $this->phenotypes = new Phenotype($genotype);
        }
        usort($this->phenotypes, function ($a, $b) {

        });
    }

    private function getCrossPairs(array $fitnessIndexes)
    {

        $top = $this->getRandomTop($fitnessIndexes);
    }

    private function getRandomTop(array $fitnessIndexes)
    {
        $top = array_slice($fitnessIndexes, round(count($fitnessIndexes) * 0.7));
        foreach ($)
    }
}