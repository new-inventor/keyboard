<?php
namespace KeyboardAnalytics;

use KeyboardAnalytics\Keyboard\KeyboardInterface;
use KeyboardAnalytics\Language\Parameters\ParametersInterface;

/**
 * Created by Ionov George (new-inventor).
 * Date: 11.08.2018
 */
class Phenotype
{
    private $pressedByOneHandWeight = 0.4;
    private $pressedInOrderWeight = 0.3;
    private $pressedInNearLinesWeight = 0.2;
    private $gensLevenshteinWeight = 0.1;
    /** @var ParametersInterface */
    private $parameters;
    /**
     * @var KeyboardInterface
     */
    private $keyboard;

    public function __construct(ParametersInterface $parameters, KeyboardInterface $keyboard)
    {
        $this->parameters = $parameters;
        $this->keyboard = $keyboard;
    }

    public function getFitnessIndex(Genotype $genotype)
    {
        $this->keyboard->loadSigns($genotype);
        $pressedByOneHandValue = 0;
        $pressedInOrderValue = 0;
        $pressedInNearLinesValue = 0;
        foreach ($this->parameters->getDoubleSeries() as $series) {
            $signs = preg_split('//u', $series, null, PREG_SPLIT_NO_EMPTY);
            $key1 = $this->keyboard->getKeyBySign($signs[0]);
            $key1Hand = $key1->getHand();
            $key1Finger = $key1->getFinger();
            $key1Line = $key1->getLine();
            $key2 = $this->keyboard->getKeyBySign($signs[1]);
            $key2Hand = $key2->getHand();
            $key2Finger = $key2->getFinger();
            $key2Line = $key2->getLine();
            if ($key1Hand === $key2Hand) {
                $pressedByOneHandValue += $this->parameters->getWeight($series);
                if ($key1Finger !== $key2Finger) {
                    $pressedInOrderValue += $this->parameters->getWeight($series);
                }
                if ($key1Line === $key2Line - 1 || $key1Line === $key2Line + 1) {
                    $pressedInNearLinesValue += $this->parameters->getWeight($series);
                }
            }
        }
        foreach ($this->parameters->getTripleSeries() as $series) {
            $signs = preg_split('//u', $series, null, PREG_SPLIT_NO_EMPTY);
            $key1 = $this->keyboard->getKeyBySign($signs[0]);
            $key1Hand = $key1->getHand();
            $key1Finger = $key1->getFinger();
            $key1Line = $key1->getLine();
            $key2 = $this->keyboard->getKeyBySign($signs[1]);
            $key2Hand = $key2->getHand();
            $key2Finger = $key2->getFinger();
            $key2Line = $key2->getLine();
            $key3 = $this->keyboard->getKeyBySign($signs[2]);
            $key3Hand = $key3->getHand();
            $key3Finger = $key3->getFinger();
            $key3Line = $key3->getLine();
            if ($key1Hand === $key2Hand && $key1Hand === $key3Hand) {
                $pressedByOneHandValue += $this->parameters->getWeight($series);
                if (
                    ($key1Finger < $key2Finger && $key2Finger < $key3Finger)
                    ||
                    ($key1Finger > $key2Finger && $key2Finger > $key3Finger)
                ) {
                    $pressedInOrderValue += $this->parameters->getWeight($series);
                }
                if (($key1Line === $key2Line + 1 || $key1Line === $key2Line - 1) && ($key2Line === $key3Line + 1 || $key2Line === $key3Line - 1)) {
                    $pressedInNearLinesValue += $this->parameters->getWeight($series);
                }
            }
        }
        return $pressedByOneHandValue * $this->pressedByOneHandWeight
            + $pressedInOrderValue * $this->pressedInOrderWeight
            + $pressedInNearLinesValue * $this->pressedInNearLinesWeight
            + $this->getGensLevenshtein($genotype) * $this->gensLevenshteinWeight;
    }

    private function getGensLevenshtein(Genotype $genotype)
    {
        return levenshtein(implode('', $this->parameters->getSigns()), implode('', $genotype->getGens()));
    }
}