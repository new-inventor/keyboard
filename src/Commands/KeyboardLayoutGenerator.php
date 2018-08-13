<?php
/**
 * Created by Ionov George (new-inventor).
 * Date: 12.08.2018
 */

namespace KeyboardAnalytics\Commands;


use KeyboardAnalytics\GeneticAlgorithm;
use KeyboardAnalytics\Language\Parameters\En;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class KeyboardLayoutGenerator extends Command
{
    protected function configure()
    {
        $this->setName('genetic:get-layout')
            ->addOption('max-generations', 'g', InputOption::VALUE_OPTIONAL, 'Maximum generations in genetic algorithm', 10000)
            ->addOption('population-size', 's', InputOption::VALUE_OPTIONAL, 'Population size at the start of generation', 10000);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $algorithm = new GeneticAlgorithm(new En(), $input->getOption('population-size'));
        $generations = $input->getOption('max-generations');
        for ($i = 0; $i < $generations; $i++) {
            $algorithm->runStep();
        }
    }

}